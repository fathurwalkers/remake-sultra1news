<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        //
    }

    public function postRegister(Request $request)
    {
        //
    }
}
