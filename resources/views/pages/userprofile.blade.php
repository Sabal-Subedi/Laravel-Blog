@extends('layout')
@section('title','|My Profile')
@section('content')
<div class="container">
<h1>Profile Picture</h1>
@foreach($users as $key)
<img src="{{ asset('storage/'.$key->image) }}" height="250px;" width="250px;" alt="image">
<h1>Personal Details</h1>
  <dl class="row">
    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{$key->first}} {{$key->last}}</dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9">{{$key->email}}</dd>
    
  </dl>
    <a href="/upload/{{$key->id}}" class="btn btn-primary" id="button_addaccount">Edit</a>
  @endforeach
</div>
@endsection