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
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post['created_at']}}</td>
            <td>{{$post['updated_at']}}</td>
            <td>
                <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form id="myform" action="{{route('posts.destroy', $post->id)}}" method="get" onsubmit="return confirm('Sure?');">
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