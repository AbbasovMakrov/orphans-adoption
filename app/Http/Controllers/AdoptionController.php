<?php

namespace App\Http\Controllers;

use App\Adoption;
use App\Orphan;
use App\Rules\CheckOrphanId;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    protected function adoption($orphanId)
    {
        if ($this->idValidate($orphanId)->fails() || validator(['orphan' => $orphanId],["orphan" => [new CheckOrphanId()]])->fails()) return $this->redirection(true);

        if (Adoption::where("orphan_id",$orphanId)->first() != null)
        {
            return $this->redirection(true,true,"error","this child is adoptioned");
        }
        if (Orphan::findOrFail($orphanId)->user_id == auth()->user()->id)
        {
            return abort(403);
        }
         Adoption::create([
            "user_id" => auth()->user()->id,
            "orphan_id" => $orphanId
        ]);
        return $this->redirection(false,true,"success","done","/");
    }

    protected function cancel($adoptId)
    {
        if ($this->idValidate($adoptId)->fails()) return $this->redirection(true);
        $adopt = Adoption::findOrFail($adoptId);
        if ($adopt->user_id != auth()->user()->id)
        {
            return abort(403);
        }
        try {
            $adopt->delete();
            return $this->redirection(true);
        } catch (\Exception $e) {
        }

    }

    protected function myAdoptions()
    {
        //Orphan::withTrashed()->dd();

        return view("orphans.adoptions",[
           "adoptions" =>  Adoption::where("user_id",auth()->user()->id)->with(["orphan","user"])->paginate(),
            ]);
    }
}
