<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     return $this->middleware('')->only(['index']);
    // }
        
    public function index()
    {
        return view('home.index');
    }
}
