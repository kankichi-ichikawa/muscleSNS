<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        return \App\Post::all();  // ←自動でjsonにしてくれます

    }
}
