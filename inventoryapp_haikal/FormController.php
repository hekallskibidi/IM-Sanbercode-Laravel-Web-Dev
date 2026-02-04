<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function welcome(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName  = $request->input('last_name');
        $email     = $request->input('email');
        $phone     = $request->input('phone');
        $address   = $request->input('address');

        return view('welcome', compact('firstName', 'lastName', 'email', 'phone', 'address'));
    }
}