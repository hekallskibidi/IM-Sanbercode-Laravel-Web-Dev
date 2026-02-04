<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function register()
    {
        return view('register');
    }
}
