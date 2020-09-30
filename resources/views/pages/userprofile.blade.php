@extends('layout')
@section('title','|My Profile')
@section('content')
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="..." class="card-img" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
        @foreach($users as $key)
            <h1 class="card-title">{{$key->first}} {{$key->last}}</h1>
            <p class="card-text">{{$key->email}} <br></p>
            @endforeach
        </div>
        </div>
    </div>
    </div>
@endsection