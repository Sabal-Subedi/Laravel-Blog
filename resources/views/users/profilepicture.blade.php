@extends('layout')
@section('title','|Upload Avatar')
@section('content')
<div class="container">
  <div class="card">
  <div class="card-header">
    Choose Your Profile Picture
  </div>
  <div class="card-body">
    <form id="validation"  action="/upload/profilepicture/{{$id}}" method="post" enctype="multipart/form-data">
    @csrf
    <input id="choose_image" type="file" name="image"/>
    <input id="button_comment" type="submit" value="Upload"/>
    </form>
    <a class="btn btn-primary" href="/skip/profilepicture/{{$id}}" role="button" id="button_addaccount">Skip</a>
  </div>
</div>
</div>
@endsection
