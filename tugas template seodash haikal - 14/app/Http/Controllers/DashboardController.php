<?php
// Customized by Haikal
// Functional behavior unchanged


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('home'); 
    }
}