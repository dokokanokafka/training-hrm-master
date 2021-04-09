<?php

namespace App\Http\Controllers;
// model????
use App\Engineer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
		// $posts = Post::latest()->get();
        // return view('posts.index')->with('posts', $posts);
        // $engineers = Engineer::all();
        $engineers = [];

        return view('index', ['engineers ' => $engineers]);
    }
}
