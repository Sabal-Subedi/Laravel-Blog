@extends('layout')

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset=2">
            <h1 style="margin-left:25%;">{{$posts->title}}</h1>
            
            <p style="margin-left:5%;">{{$posts->message}}</p>
            <hr>
            <a class="btn btn-success" href="/" role="button" style="float:right;margin-right:1%; width:150px">Back</a>

            <h1 style="margin-left:5%;">Comments</h1>
            <hr>
                @foreach($data as $key)
                <p style="margin-left:5%;"><b>Posted By: <br><u>{{$key->name}}</u><br><u>{{$key->email}}</u></b><br>
                <b><u>Comment: </u></b>{{$key->comment}}</p><br>
                <p style="float:right;"><b>Created at: </b> {{date('M j,Y h:ia',strtotime($key->created_at))}}</p><br>
                <hr>
                @endforeach


            
        </div>
    </div>
    <hr>
    <form action='{{url("/create/comments/{$posts->id}")}}' method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-8 col-md-offset=2">
        <input type="text" style="width:400px;margin-left:5%;" class="form-control" id="inputEmail4" placeholder="Full Name" name='name'>
        </div>
        <div class="form-group col-md-8 col-md-offset=2">
        <input type="email" style="width:400px;margin-left:5%;" class="form-control" id="inputEmail4" placeholder="Email" name='email'>
        </div>
        <div class="form-group col-md-8 col-md-offset=2">
        <Textarea  class="form-control" id="inputPassword4" style="width:400px;margin-left:5%;" placeholder="Write comments here!!!" name="comment"></Textarea> 
        </div>
    </div>
    <button type="submit" style="width:100px;margin-left:4%;" class="btn btn-primary">Comment</button>
    <hr>
    
@endsection