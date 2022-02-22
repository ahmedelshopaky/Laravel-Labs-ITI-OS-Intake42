<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        // return $posts;
        return PostResource::collection($posts);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();
        
        // transformation
        // return [
        //     'id' => $post->id,
        //     'title' => $post->title,
        //     'description' => $post->description,
        // ];
        return new PostResource($post);
    }

    public function store(StorePostRequest $request) {
        // validate the request data
        $validated = $request->validated();
        // store in db
        $post = Post::create($validated);
        // redirect to index
        // return $post;
        return new PostResource($post);
    }
}