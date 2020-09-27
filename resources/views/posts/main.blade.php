@extends('layout')
@section('title','|ALL Post')
@section('content')
<h1 style="text-align:center">All Posts</h1>
    <a class="btn btn-success" href="/login" role="button" style="float:right;margin-right:10%;">Add New Post</a>
    <div class="row">
        <div class="col-md-10 col-md-offset=1">
        @foreach($posts as $post)
        <h1 style="margin-left:10%">{{$post->title}}</h1>
        <p style="margin-left:10%">{{$post->message}}</p>
        <hr>
        <p style="float:right;"><b>Created at: </b> {{date('M j,Y h:ia',strtotime($post->created_at))}}<br>
         <b>Updated at: </b> {{date('M j,Y h:ia',strtotime($post->updated_at))}}</p><br>
        <a class="btn btn-success" style="margin-left:10%;" href="posts/{{$post->id}}" role="button">View</a><br>
        <hr>
   
        @endforeach
</div>
    
@endsection