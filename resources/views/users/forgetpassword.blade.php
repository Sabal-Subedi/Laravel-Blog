@extends('layout')
@section('title','|Create Account')
@section('content')
<div class="container">
    <div class="box">
            <div class="form-group col-md-7">
            <h5 >Find Your Account</h5>
            <hr>
        </div>
        <form id='validation' action="/resetpassword" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
            <label class="inputlabel">Please enter your email to search for your account. </label>
            <input type="email" class="form-control" id="inputfield" placeholder="Email" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" />
            </div>
        </div>
        <div>
        <button id="button_comment" type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</div>
@endsection