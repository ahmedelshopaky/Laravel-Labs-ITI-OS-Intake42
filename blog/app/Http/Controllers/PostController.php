<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
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

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();
        $user = User::where('id', $post->user_id)->first();
        return view('posts.show', compact('post'), compact('user'));
    }

    public function edit($slug) {
        $post = Post::where('slug', $slug)->first();
        $user = User::where('id', $post->user_id)->first();
        return view('posts.edit', compact('post'), compact('user'));
    }

    public function destroy($slug) {
        Post::where('slug', $slug)->delete();
        return redirect()->route('posts.index');
    }

    public function store(StorePostRequest $request) {
        // validation
        // request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:10']
        // ],[
        //     'title.required' => 'The title is a must.'
        // ]);

        // fetch request data
        // $data = request()->all();
        
        // validate the request data
        $validated = $request->validated();
        // store in db
        Post::create($validated);
        // redirect to index
        return redirect()->route('posts.index');
    }

    public function update($slug, StorePostRequest $request) {
        $validated = $request->validated();

        $post = Post::where('slug', $slug)->first();
        $user = User::where('id', $post->user_id)->first();

        if ($post) {
            $post->update($validated);
        }
        
        // $data = request()->all();
        // $post->update([
        //     'title' => $data['title'],
        //     'description' => $data['description']
        // ]);

        return view('posts.show', compact('post'), compact('user'));
    }
}