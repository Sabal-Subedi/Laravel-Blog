@extends('layout')
@section('title','|Create Account')
@section('content')
<h1 style="margin-left:5%;">Create New Account</h1>
<form action="/create" method="POST">
@csrf
  <div class="row">
    <div class="form-group col-md-4 col-md-offset=1">
      <p style="margin-left:5%;">First Name </p>
      <input type="text" class="form-control" style="margin-left:5%;width:400px;" id="inputEmail4" placeholder="FirstName" name='first'>
      
    </div>
    <div class="form-group col-md-4 col-md-offset=3">
      <p>Last Name</p>
      <input type="text" class="form-control" style="width:400px;" id="inputEmail4" placeholder="LastName" name='last'>
    </div>
    <div class="form-group col-md-8 col-md-offset=2">
      <p style="margin-left:2.5%;">Email </p>
      <input type="email" class="form-control" style="margin-left:2.5%;width:400px;" id="inputEmail4" placeholder="Email" name="email">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-8 col-md-offset=2">
      <p style="margin-left:2.5%;">Password</p>
      <input type="password" class="form-control" style="margin-left:2.5%;width:400px;" id="password" placeholder="Password" name="password">
    </div>
    <!-- <div class="form-group col-md-5 col-md-offset=2">
      <p>Confirm Password</p>
      <input type="password" class="form-control" style="width:400px;" id="confirmpassword" placeholder="ConfirmPassword" name="confirmpassword">
    </div> -->
  </div>
  <div>
  <button style="margin-left:2%;width:200px;" type="submit" class="btn btn-primary">Create</button>
  <script>
        
    function check(){
        var password=document.getElementById("password");
        var confirmpassword=document.getElementById("confirmpassword");
          if(password==confirmpassword)
          {
            alert('Login Successful !!');
          }
          else
           alert('Password and Confirm password not matching!!');
           
    }
    </script>

@endsection