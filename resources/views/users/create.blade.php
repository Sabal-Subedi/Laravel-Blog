@extends('layout')
@section('title','|Create Account')
@section('content')
<h1 style="margin-left:5%;">Create New Account</h1>

<form id='validation' action="/create" method="POST">
@csrf
  <div class="row">
    <div class="form-group col-md-4 col-md-offset=1">
      <p style="margin-left:5%;">First Name </p>
      <input type="text" class="form-control" style="margin-left:5%;width:400px;" id="first" placeholder="FirstName" name='first' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-4 col-md-offset=3">
      <p>Last Name</p>
      <input type="text" class="form-control" style="width:400px;" id="inputEmail4" placeholder="last" name='last' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-8 col-md-offset=2">
      <p style="margin-left:2.5%;">Email </p>
      <input type="email" class="form-control" style="margin-left:2.5%;width:400px;" id="email" placeholder="Email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" />
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4 col-md-offset=2">
      <p style="margin-left:5%;">Password</p>
      <input type="password" class="form-control" style="margin-left:5%;width:400px;" id="password" placeholder="Password" name="password" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-5 col-md-offset=2">
      <p>Confirm Password</p>
      <input type="password" class="form-control" style="width:400px;" id="confirmpassword" placeholder="ConfirmPassword" name="confirmpassword" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
    </div>
  </div>
  <div>
  <button style="margin-left:2%;width:200px;" type="submit" class="btn btn-primary">Create</button>

@endsection