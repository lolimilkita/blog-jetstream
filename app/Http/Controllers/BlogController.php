<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // public function ___construct()
    // {
    //     $this->middleware()
    // }

    public function index()
    {
        return view('pages.blog.index');
    }
}
