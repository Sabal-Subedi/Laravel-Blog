@extends('layout')

@section('title','|Update Post')
@section('content')

    <h1 style="margin-left:5%;">Update Post</h1>
    <form action="/posts/{{$posts->id}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-8 col-md-offset=2">
        <input style="margin-left:3%;width:400px;" type="text" class="form-control" id="inputEmail4" value="{{$posts->title}}" name='title'>
        </div>
       
        <div class="form-group col-md-8 col-md-offset=2">
        <Textarea style="margin-left:3%;width:400px;" class="form-control" id="inputPassword4" placeholder="{{$posts->message}}" name="message"></Textarea> 
        </div>
    
    </div>
    <button style="margin-left:4%;width:150px;" type="submit" class="btn btn-primary">Update Post</button>
    <a class="btn btn-danger" role="button" href="/profile" style="margin-left:1%; width:150px">Cancel</a>
@endsection