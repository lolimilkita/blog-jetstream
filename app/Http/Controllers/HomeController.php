<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     return $this->middleware('')->only(['index']);
    // }

    public function index()
    {
        $today = new \DateTime();
        return view('home.index', [
            'posts' => Post::where('featured', true)
                            ->whereNotNull('published_at')
                            ->where('published_at', '<=', $today)
                            ->latest()
                            ->take(3)
                            ->get(),
        ]);
    }
}
