<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // Action Method
    public function index() {
        // $posts = [
        //     ['id' => 1, 'title' => 'Learn Laravel', 'posted_by' => 'Ahmed Elshopaky', 'created_at' => '2022-02-20 14:45:00']
        // ];
        $posts = Post::all();
        $posts = Post::paginate(6);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create() {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function show($postID) {
        $post = Post::where('id', $postID)->first();
        $user = User::where('id', $post->user_id)->first();
        return view('posts.show', compact('post'), compact('user'));
    }

    public function edit($postID) {
        $post = Post::where('id', $postID)->first();
        $user = User::where('id', $post->user_id)->first();
        return view('posts.edit', compact('post'), compact('user'));
    }

    public function destroy($postID) {
        Post::where('id', $postID)->delete();
        return redirect()->route('posts.index');
    }

    public function store() {
        // fetch request data
        $data = request()->all();
        // store in db
        Post::create($data);
        // redirect to index
        return redirect()->route('posts.index');
    }

    public function update($postID) {
        $data = request()->all();
        Post::where('id', $postID)->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
        return redirect()->route('posts.index');
    }
}