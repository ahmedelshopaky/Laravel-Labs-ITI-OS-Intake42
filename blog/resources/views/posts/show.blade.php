<?php
    use Carbon\Carbon;
    $date = Carbon::parse($user->created_at)->format('l jS \of F Y h:i:s A');
?>
@extends('layouts.app')
@section('title') View Post @endsection
@section('content')
<div class="container">
<div class="row my-5">
    <div class="card">
        <div class="card-header">Post Info</div>
            <div class="card-body">
                <p class="card-title"><strong>Title: </strong>{{$post['title']}}</p>
                <p class="card-text"><h5>Description: </h5>{{$post['description']}}</p>
                <div class="card-text">
                    <p><strong>Created At: </strong>{{$post['created_at']}}</p>
                </div>
                <div class="card-text">
                    <p><strong>Updated At: </strong>{{$post['updated_at']}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="card">
            <div class="card-header">Post Creator info</div>
            <div class="card-body">
                <div class="card-text">
                    <p><strong>Name: </strong>{{$user->name}}</p>
                </div>
                <div class="card-text">
                    <p><strong>Email: </strong>{{$user->email}}</p>
                </div>
                <div class="card-text">
                    <p><strong>Created At: </strong>{{$date}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection