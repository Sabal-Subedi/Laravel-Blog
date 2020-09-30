@extends('layout')
@section('title','|Login')
@section('content')

  <h1 style="margin-left:10%">Login</h1>
  <a class="btn btn-success" href="/users.create" role="button" style="float:right;margin-right:20%;">Create New Account</a>

  <form id='validation' action="/action" method="POST">
  @csrf
  <div class="row">
      <div class="form-group col-md-8 col-md-offset=2">
        <p >Email </p><input type="email" class="form-control" style="width:400px;" id="email" placeholder="Email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" />
      </div>
      <div class="form-group col-md-8 col-md-offset=2">
      <p >Password </p><input type="password" class="form-control" id="password" style="width:400px;" placeholder="Password" name="password"/>
      </div>
    </div>
    <button style="margin-left:1%;width:150px;" type="submit" class="btn btn-primary">Sign in</button>
  </form>

@endsection