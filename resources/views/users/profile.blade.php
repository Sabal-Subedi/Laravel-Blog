@extends('layout')
@section('title','|My posts')
@section('content')
<h1 style="text-align:center">My Posts</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset=1">
            @foreach($data as $key)
                <h1 style="margin-left:10%">{{$key->title}}</h1>
                <p style="margin-left:10%">{{$key->message}}</p>
                <p style="float:right;"><b>Created at: </b> {{date('M j,Y ',strtotime($key->created_at))}}</p><br>
                <a class="btn btn-success" style="margin-left:10%;width:150px;" href="posts/view/{{$key->id}}" role="button">View</a><br>
                <hr>
            @endforeach
            <a class="btn btn-success" href="/posts/add/{{$id}}" role="button" style="float:right;margin-right:1%;width:150px;">Add Post</a>
    

</div>
    
@endsection