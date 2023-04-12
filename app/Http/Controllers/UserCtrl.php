<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Validator;
use Auth; 

class UserCtrl extends Controller
{
    public function registerView(){
        if(!Auth::check()){
            return view('register');
        }
        return redirect('/');
    }

    public function register(UserRequest $req){
        $req->validated();
        $regUser = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => \Hash::make($req->password),
            'roles' => $req->roles,
        ]);

        if(!$regUser){
            session()->flash('message','User '.$req->email.' could not be registered');
            return redirect()->to('register');
        }
        session()->flash('message','User '.$req->email.' registered');
        return redirect()->to('register');
    }

    public function loginView(){
        if(!Auth::check()){
            return view('login');
        }
        return redirect('/');

    }

    public function login(Request $req){
        // $req->validated();

        $data = \Auth::attempt($req->only(['email','password']));

        if(!$data){
            session()->flash('message','User '.$req->email.' could not be logged in');
            return redirect()->to('login');
        }
        session()->flash('message','User '.$req->email.' is logged in');
        return redirect()->to('login');

    }
}
