<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('fronted.index');
        
    }

    public function loginPage(){
        return view('auth.login');
    }
}


