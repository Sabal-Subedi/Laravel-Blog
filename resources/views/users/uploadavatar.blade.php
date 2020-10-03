@extends('layout')
@section('title','|Upload Avatar')
@section('content')
<div class="container">
  <div class="card">
  <div class="card-header">
    Upload Your Profile
  </div>
  <div class="card-body">
    <form action="/upload/image/{{$id}}" method="post">
    @csrf
    <input type="file" name="image"/>
    <input type="submit" value="Upload"/>
    </form>
  </div>
</div>
</div>
@endsection