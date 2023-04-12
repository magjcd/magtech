<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccCtrl extends Controller
{
    public function catsView(){
        return view('Accounts/Category');
    }
}
