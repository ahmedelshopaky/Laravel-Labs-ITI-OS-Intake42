@extends('layouts.app')
@section('title') View Post @endsection
@section('content')

<div class="row my-5">
    <div class="card">
        <div class="card-header">Post Info</div>
            <div class="card-body">
                <p class="card-title"><strong>Title: </strong>{{$posts[0]['title']}}</p>
                <p class="card-text"><h5>Description: </h5>{{$posts[0]['title']}}</p>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="card">
            <div class="card-header">Post Creator info</div>
            <div class="card-body">
                <div class="card-text">
                    <p><strong>Name: </strong>{{$posts[0]['posted_by']}}</p>
                </div>
                <div class="card-text">
                    <p><strong>Email: </strong>{{$posts[0]['posted_by']}}</p>
                </div>
                <div class="card-text">
                    <p><strong>Created At: </strong>{{$posts[0]['created_at']}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection