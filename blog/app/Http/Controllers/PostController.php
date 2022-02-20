<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Action Method
    public function index() {
        $posts = [
            ['id' => 1, 'title' => 'Learn Laravel', 'posted_by' => 'Ahmed Elshopaky', 'created_at' => '2022-02-20 14:45:00']
        ];
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
