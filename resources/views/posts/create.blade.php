@extends('layout')

@section('title','|Create Post')
@section('content')
    
    <h1 style="margin-left:5%;">Create New Post</h1>
    <form action="/create/posts/{{$user->id}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-8 col-md-offset=2">
        <input style="margin-left:3%;width:400px;" type="text" class="form-control" id="inputEmail4" placeholder="Title" name='title'>
        </div>
       
        <div class="form-group col-md-8 col-md-offset=2">
        <Textarea style="margin-left:3%;width:400px;" class="form-control" id="inputPassword4" placeholder="Message" name="message"></Textarea> 
        </div>
    
    </div>
    <button style="margin-left:4%;width:200px;" type="submit" class="btn btn-primary">Create Post</button>
@endsection