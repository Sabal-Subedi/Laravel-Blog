@extends('layout')
@section('title','|Create Account')
@section('content')
<div class="container">
  <h1 class="title">Create New Account</h1>

  <form id='validation' action="/create" method="POST">
  @csrf
  <div class="row">
    <div class="form-group col-md-5 col-md-offset=1">
      <label class="inputlabel">First Name </label>
      <input type="text" class="form-control" id="inputfield" placeholder="First Name" name='first' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-5 col-md-offset=1">
      <label class="inputlabel">Last Name</label>
      <input type="text" class="form-control" id="inputfield" placeholder="Last Name" name='last' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5 ">
      <label class="inputlabel">Email </label>
      <input type="email" class="form-control" id="inputfield" placeholder="Email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" />
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5 col-md-offset=2">
      <label class="inputlabel">Password</label>
      <input type="password" class="inputfield_password" id="password" placeholder="Password" name="password" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-5 col-md-offset=2">
      <label class="inputlabel">Confirm Password</label>
      <input type="password" class="inputfield_password" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
    </div>
  </div>
  <div>
  <button id="button_comment" type="submit" class="btn btn-primary">Create</button>
</div>
@endsection