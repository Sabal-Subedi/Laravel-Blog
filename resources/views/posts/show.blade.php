@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="post">
                <h1 class="post_title">{{$posts->title}}</h1>
                
                <p class="post_body">{{$posts->message}}</p>
                <hr>
                @if(session()->has('data'))
                <a class="btn btn-danger" href="/posts/delete/{{$posts->id}}" role="button" id="button_view">Delete</a>
                <a class="btn btn-success" href="/posts/{{$posts->id}}/edit" role="button" id="button_view">Edit</a>
                @endif

                <h1 class="title">Comments</h1>
                <hr>
                @foreach($data as $key)
                <p class="post_created_by"><b>Posted By: <br><u>{{$key->name}}</u><br><u>{{$key->email}}</u></b><br>
                <b><u>Comment: </u></b>{{$key->comment}}</p><br>
                <p class="post_created_at"><b>Created at: </b> {{date('M j,Y ',strtotime($key->created_at))}}</p><br>
                @endforeach
                <hr>
            </div>
        </div>
    </div>
    <hr>
    <div class="comment">
        <form action='{{url("/create/comments/{$posts->id}")}}' method="POST" id="comment_form">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-8 col-md-offset=2">
            <input type="text" class="form-control" id="inputfield" placeholder="Full Name" name='name'>
            </div>
            <div class="form-group col-md-8 col-md-offset=2">
            <input type="email" class="form-control" id="inputfield" placeholder="Email" name='email'>
            </div>
            <div class="form-group col-md-8 col-md-offset=2">
            <Textarea  class="form-control" id="inputfield_body" placeholder="Write comments here!!!" name="comment"></Textarea> 
            </div>
        </div>
        <button type="submit" id="button_comment" class="btn btn-primary">Comment</button>
        <hr>
    </div>
</div>
@endsection