<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\EmailChecker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("search");
    }
    public function submit(Request $request)
    {
        $request->validate([
                'name' => ['required','string'],
                'email' => ['required','email' , new EmailChecker()],
                'password' => ['nullable']
        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email
        ];
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::find(auth()->user()->id);
        $user->update($data);
        return $this->redirection(false,true,"success","Account Updated !","/");
    }

    protected function search($keyword)
    {
        $users = User::where("name","like","%$keyword%")->with(['orphan',"adoption"])->get();
        if ($users->count() <= 0)
        {
            $users = User::with(['orphan',"adoption"])->get();
        }
        return response()->json([
            "users" => $users
        ]);
    }
}
