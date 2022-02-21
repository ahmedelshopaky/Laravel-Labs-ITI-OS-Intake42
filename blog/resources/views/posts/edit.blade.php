@extends('layouts.app')
@section('title') Edit Post @endsection
@section('content')
    <div class="container">
        <form class="mt-4" method="post" action="{{route('posts.update',$post['id'])}}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{$post['title']}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{$post['description']}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="user_id" class="form-control">
                <option>{{$user->name}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection