@extends('layout')
@section('title','|Change Password')
@section('content')
<div class="container">
    <div class="box">
        <h5 class="inputfield">Choose New Password</h5>
        <hr>
        <div class="row">
            <div class="col-6">
                <form id="validation"  action="/changepassword/{{$id}}" method="post">
                @csrf
                <label >Please enter new password.</label><br>
                <input type="password" id="verify_field" placeholder="Enter password" name="newpassword" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
            </div>
        </div><br><br>
        <div>
            <input id="button_comment" type="submit" class="btn btn-success" value="Save"/>
        </div>
        </form>
    </div>
</div>
@endsection