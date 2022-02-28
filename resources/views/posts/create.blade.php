@extends('layout')

@section('title','|Create Post')
@section('content')
<div class="container">
    <h1 class="title">Create New Post</h1>
    <form action="/create/posts/{{$user->id}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-8 col-md-offset=2">
        <input type="text" class="form-control" id="inputfield" placeholder="Title" name='title'>
        </div>
       
        <div class="form-group col-md-8 col-md-offset=2">
        <Textarea class="form-control" id="inputfield_body" placeholder="Message" name="message"></Textarea> 
        </div>
    
    </div>
    <button id="button_add" type="submit" class="btn btn-primary">Create Post</button>
    </div>
@endsection