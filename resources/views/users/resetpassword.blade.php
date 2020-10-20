@extends('layout')
@section('title','|Forget Password')
@section('content')
<div class="container">
    <div class="box">
        <h5 class="inputfield">Enter Security Code</h5>
        <hr>
        <div class="row">
            <div class="col-6">
                <form id="validation"  action="/resetaccountpassword/{{$id}}" method="post">
                @csrf
                <label >Please check your email for a message with your code. Your code is 6 numbers long.</label>
                <input type="text" id="verify_field" placeholder="Enter Code" name="verification" required data-parsley-maxlength ="6" data-parsley-trigger="keyup" />
            </div>
            
            <div class="col-6">
                <p>We have send your verification code on <u> <B>{{$data['email']}} </B></u>
            </div>
        </div><br><br>
        <div>
            <input id="button_comment" type="submit" class="btn btn-success" value="Verify"/>
        </div>
        </form>
    </div>
</div>
@endsection