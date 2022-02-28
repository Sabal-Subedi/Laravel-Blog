@extends('layout')

@section('title','|Update Post')
@section('content')
<div class="container">
    <h1 class="title">Update Post</h1>
    <form action="/posts/{{$posts->id}}" method="POST">
    
    @csrf
    <div class="row">
        <div class="form-group col-md-8 col-md-offset=2">
        <input type="text" class="form-control" id="inputfield" value="{{$posts->title}}" name='title'>
        </div>
       
        <div class="form-group col-md-8 col-md-offset=2">
        <Textarea class="form-control" id="inputfield_body" placeholder="{{$posts->message}}" name="message"></Textarea> 
        </div>
    
    </div>
    <button id="button_comment" type="submit" class="btn btn-primary">Update Post</button>
    <a class="btn btn-danger" role="button" href="/profile" id="button_comment">Cancel</a>
</div>
@endsection