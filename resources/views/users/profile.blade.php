@extends('layout')
@section('title','|My posts')
@section('content')
<div class="container">
    <h1 class="title">My Posts</h1>
    <div class="row">
        <div class="col-md-12">
            @foreach($data as $key)
            <div id="post">
                <h1 class="post_title">{{$key->title}}</h1>
                <p class="post_body">{{$key->message}}</p>
                <p class="post_created_at"><b>Created at: </b> {{date('M j,Y ',strtotime($key->created_at))}}</p><br>
                <a class="btn btn-success" id="button_view" href="posts/view/{{$key->id}}" role="button">View</a><br>
                <hr>
            </div> 
            @endforeach
            <a class="btn btn-success" href="/posts/add/{{$id}}" id="button_add" role="button">Add Post</a>

    </div>
</div>
@endsection