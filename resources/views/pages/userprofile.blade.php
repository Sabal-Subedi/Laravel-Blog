@extends('layout')
@section('title','|My Profile')
@section('content')
<div class="container">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/public/images/defaultimg.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            @foreach($users as $key)
                <h1 class="card-title">{{$key->first}} {{$key->last}}</h1>
                <p class="card-text">{{$key->email}} <br></p>
            @endforeach
            <div class="card-body">
                <a href="/upload/{{$key->id}}" class="card-link">Edit</a>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection