@extends('layout')
@section('title','|ALL Post')
@section('content')

<div class="container">
    <h1 class="title">All Posts</h1>
    <a class="btn btn-success" id="button_addaccount" href="/login" role="button" style="width:150px;">Add New Post</a>
    <div class="row">
        <div class="col-md-12">
        @foreach($posts as $post)
        <div id="post">
            <h1 class="post_title">{{$post->title}}</h1>
            <p class="post_body">{{$post->message}}</p>
            <hr>
            @foreach($datas as $data)
            @if($data->id==$post->userid)
                <p class="post_created_by"><b><u>Created by:</u> <br> {{$data->first}} {{$data->last}} <br>
                <u>{{$data->email}}</U></b></p>
            @endif
            @endforeach
            <p class="post_created_at"><b>Created at: </b> {{date('M j,Y ',strtotime($post->created_at))}}</p><br>
            <a class="btn btn-success" id="button_view" href="pages/{{$post->id}}" role="button">View</a><br>
            <hr>
        </div> 
        @endforeach
        </div>
       
    </div>
</div>
    
@endsection