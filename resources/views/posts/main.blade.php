@extends('layout')
@section('title','|ALL Post')
@section('content')

<h1 style="text-align:center">All Posts</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset=1">
        @foreach($posts as $post)
            <h1 style="margin-left:10%">{{$post->title}}</h1>
            <p style="margin-left:10%">{{$post->message}}</p>
            <hr>
            @foreach($datas as $data)
            @if($data->id==$post->userid)
                <p style="margin-left:10%"><b><u>Created by:</u> <br> {{$data->first}} {{$data->last}} <br>
                <u>{{$data->email}}</U></b></p>
            @endif
            @endforeach
            <p style="float:right;"><b>Created at: </b> {{date('M j,Y ',strtotime($post->created_at))}}</p><br>
            <a class="btn btn-success" style="margin-left:10%;width:150px;" href="pages/{{$post->id}}" role="button">View</a><br>
            <hr>  
        @endforeach
    
    <a class="btn btn-success" href="/login" role="button" style="float:right;width:150px;">Add New Post</a>
    </div>

    
@endsection