@extends('layout')
@section('title','|My posts')
@section('content')
<div class="container">
    <h1 class="title">Verify Your Account</h1>
    @foreach($data as $key)
    <p class="post_body">Dear {{$key->first}} ! <br><br> We have send your verification code on <u> <B>{{$key->email}} </B></u>. 
    <br> Please check your email for verification code.</p>
    @endforeach
    <div class="row">
        <div class="col-md-12">
        <form id="validation"  action="/verifyAccount/{{$id}}" method="post">
        @csrf
        <label class="inputlabel">Enter verification code  </label>
        <input type="text" id="verify_field" placeholder="Verification Code" name="verification" required data-parsley-maxlength ="6" data-parsley-trigger="keyup" />
        <br><br>
        <input id="button_comment" type="submit" class="btn btn-success" value="Verify"/>
        </form>
    </div>
</div>
@endsection