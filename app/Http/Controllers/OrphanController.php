<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrhpanRequest as StoreRequest;
use App\Rules\CheckUserId;
use Illuminate\Http\Request;
use App\Orphan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateOrphanRequest as UpdateRequest;
class OrphanController extends Controller
{
    private const STATUS = "success";
    public function __construct()
    {
        $this->middleware("auth")->except(['show',"index"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("main",['orphans' => Orphan::with("user")->paginate()]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orphans.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = [
            "name" => $request->name ,
            "age" => $request->age,
            "other_details" => $request->other_details,
            "user_id" => auth()->user()->id,
            "location" => $request->location,
            "image" => null
        ];
        if ($request->hasFile("image"))
        {
            $file = $request->file("image");
            $fileName = Str::random(25) . ".{$file->getClientOriginalExtension()}";
            $file->storeAs("public/images/orphans/",$fileName);
            $data['image'] = "images/orphans/{$fileName}";
        }
        Orphan::create($data);
        return $this->redirection(false,false,self::STATUS,"Done","/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->idValidate($id)->fails()) return $this->redirection(true);
        $orphan = Orphan::where("id",$id)->with("user")->firstOrFail();
        return  view("orphans.show",compact('orphan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($this->idValidate($id)->fails()) return $this->redirection(true);
        $orphan = Orphan::where("id",$id)->firstOrFail();
        if ($orphan->user_id != auth()->user()->id)
        {
            return abort(403);
        }
        return view("orphans.edit",compact('orphan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if ($this->idValidate($id)->fails()) return $this->redirection(true);
        $orphan = Orphan::findOrFail($id);
        if ($orphan->user_id != auth()->user()->id)
        {
            return abort(403);
        }
        $data = [
            "name" => $request->name ,
            "age" => $request->age,
            "other_details" => $request->other_details,
            "user_id" => auth()->user()->id,
            "location" => $request->location,
            "image" => $orphan->image
        ];
        if ($request->hasFile("image"))
        {
            Storage::delete("public/".$orphan->image);
            $file = $request->file("image");
            $fileName = Str::random(25) . ".{$file->getClientOriginalExtension()}";
            $file->storeAs("public/images/orphans/",$fileName);
            $data['image'] = "images/orphans/{$fileName}";
        }
        $orphan->update($data);
        return $this->redirection(false,true,"success","success","/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->idValidate($id)->fails()) return $this->redirection(true);
        $orphan = Orphan::findOrFail($id);
        if ($orphan->user_id != auth()->user()->id)
        {
            return abort(403);
        }
        $orphan->delete();
        return $this->redirection(false,true,self::STATUS,"done");
    }

    public function myOrphans($profileId = 1)
    {
        $validation = Validator::make([
            "profile_id" => $profileId
        ],[
            "profile_id" => ['nullable','integer',"min:1",new CheckUserId()]
        ]);
        if ($validation->fails())
        {
            return $this->redirection(false,false,"","","/",true,$validation->errors());
        }
        $orphan = $orphan = Orphan::where("user_id",1)->paginate();
        if (auth()->check()) {
            $orphan = Orphan::where("user_id",auth()->user()->id)->paginate();
        }
        if (!empty($profileId))
        {
            $orphan = Orphan::where("user_id",$profileId)->paginate();
        }
        return view("orphans.my-orphans",[
            "orphans" => $orphan
        ]);
    }
}
