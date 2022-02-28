@extends('layout')
@section('title','|About Me')
@section('content')
<div class="container">
<h1>Profile Picture</h1>
<img src="{{url('/images/aboutpic.jpg')}}" height="250px;" width="250px;" alt="Image">
<h1>Personal Details</h1>
  <dl class="row">
    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">Gopi Subedi</dd>

    <dt class="col-sm-3">Contacts</dt>
    <dd class="col-sm-9">9864220453</dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9">gopi.subedi09@gmail.com</dd>
    
  </dl>
</div>
@endsection