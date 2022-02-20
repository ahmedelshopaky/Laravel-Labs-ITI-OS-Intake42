@extends('layouts.app')
@section('title') Edit Post @endsection
@section('content')
    <div class="container">
        <form class="mt-4" method="post" action="{{route('posts.update',$posts[0]['id'])}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                <option></option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection