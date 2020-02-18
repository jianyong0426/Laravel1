@extends('layouts.app')
@section('content')


<form method="POST" action="{{route('profile.save')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Photo</label>
    <input type="file" name="photo">
</div>
<div class="form-group">
    <label>Name</label>
    <input name="name" value="{{$user->name}}" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input name="email" value="{{$user->email}}" class="form-control" readonly>
</div>
<div class="form-group">
    <label>Gender</label>
    <input name="gender" value="{{$user->gender}}" class="form-control">
</div>
<div class="form-group">
    <label>Phone Number</label>
    <input name="phone" value="{{$user->phone}}" class="form-control">
</div>
<div class="form-group">
    <label>Address</label>
    <input name="address" value="{{$user->address}}" class="form-control">
</div>
<div class="form-group">
    <label>Postal Code</label>
    <input name="postcode" value="{{$user->postcode}}" class="form-control">
</div>
<div class="form-group">
    <label>City</label>
    <input name="city" value="{{$user->city}}" class="form-control">
</div>
<div class="form-group">
    <label>Country</label>
    <input name="country" value="{{$user->country}}" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form> 

@endsection
