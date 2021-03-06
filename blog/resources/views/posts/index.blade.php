@extends('layouts.app')
@section('title') All Posts @endsection
@section('content')
    <div class="container">
        <div class="text-center mt-4">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
                <a href="{{route('posts.show',$post['slug'])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit',$post['slug'])}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form id="myform" action="{{route('posts.destroy', $post->slug)}}" method="get" onsubmit="return confirm('Sure?');">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection