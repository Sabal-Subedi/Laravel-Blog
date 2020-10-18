@extends('layout')
@section('title','|Update Profile')
@section('content')
<div class="container">
  <div class="card">
  <div class="card-header">
    Update Your Profile
  </div>
  <div class="card-body">
  @foreach($data as $user)
  <img src="{{ asset('storage/'.$user->image) }}" height="250px;" width="250px;" alt="image">
    <form id="validation" action="/upload/image/{{$user->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="form-group col-md-5 col-md-offset=1">
      <label class="inputlabel">First Name </label>
      <input type="text" class="form-control" id="inputfield" value="{{$user->first}}" name='first' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-5 col-md-offset=1">
      <label>Last Name</label>
      <input type="text" class="form-control" id="inputfield" value="{{$user->last}}" name='last' required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5 col-md-offset=1">
      <label class="inputlabel">New Password</label>
      <input type="password" class="inputfield" id="password" placeholder="New Password" name="password" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
    </div>
    <div class="form-group col-md-5 col-md-offset=2">
      <label>Confirm Password</label>
      <input type="password" class="inputfield" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
    </div>
    <input id="choose_image" type="file" name="image"/>
    <input id="button_comment" type="submit" value="Upload"/>
    </form>
    <a class="btn btn-danger" href="{{route('profile')}}" role="button" id="button_addaccount">Cancel</a>
  @endforeach
  </div>
</div>
</div>
@endsection
