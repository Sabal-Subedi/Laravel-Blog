@extends('layout')
@section('title','|Login')
@section('content')
<div class="container">
  <h1 class="title">Login</h1>
  <a class="btn btn-success" href="/users.create" role="button" id="button_addaccount">Create Account</a>
  <div id="post">
  <form id='validation' action="/action" method="POST">
  @csrf
  <div class="row">
    <div class="form-group col-md-8 col-md-offset=2">
    <label class="inputlabel">Email</label>
      <input type="email" class="form-control" id="inputfield" placeholder="Email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-8 col-md-offset=2">
    <label class="inputlabel">Password</label>  
      <input type="password" class="form-control" id="inputfield" placeholder="Password" name="password"/>
    </div>
  </div>
  <div class="inputlabel">
      <a href="/forgetpassword">Forget Password?</a>
    </div><br>
  <button id="button_comment" type="submit" class="btn btn-primary">Sign in</button>
  </form>
  
</div>
@endsection