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
            // TODO
            'posts' => $posts
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function show($post) {
        $posts = [
            ['id' => 1, 'title' => 'Learn Laravel', 'posted_by' => 'Ahmed Elshopaky', 'created_at' => '2022-02-20 14:45:00']
        ];
        return view('posts.show', [
            'posts' => $posts
        ]);
    }

    public function edit($post) {
        $posts = [
            ['id' => 1, 'title' => 'Learn Laravel', 'posted_by' => 'Ahmed Elshopaky', 'created_at' => '2022-02-20 14:45:00']
        ];
        return view('posts.edit', [
            'posts' => $posts
        ]);
    }

    public function destroy($post) {
        // return $post;
        
        return redirect()->route('posts.index');
    }

    public function store() {
        // fetch request data
        $data = request()->all();
        // store in db

        // redirect to index
        return redirect()->route('posts.index');
    }

    public function update($post) {
        //
        return redirect()->route('posts.index');
    }
}