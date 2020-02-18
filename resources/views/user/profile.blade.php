@extends('layouts.app')
@section('content')

<h1>User Profile</h1>
<br/><br/>
<table class="table table-bordered table-light table-hover">

<tr>
<th scope="row">Photo</th>
<td><img src="{{url($user->image_url)}}" height=20/></td>
</tr>
<tr>
<th scope="row">Name</th>
<td>{{$user->name}}</td>
</tr>
<tr>
<th scope="row">Email</th>
<td>{{$user->email}}</td>
</tr>
<tr>
<th scope="row">Gender</th>
<td>{{$user->gender}}</td>
</tr>
<tr>
<th scope="row">Phone Number</th>
<td>{{$user->phone}}</td>
</tr>
<tr>
<th scope="row">Address</th>
<td>{{$user->address}}</td>
</tr>
<tr>
<th scope="row">Postal Code</th>
<td>{{$user->postcode}}</td>
</tr>
<tr>
<th scope="row">City</th>
<td>{{$user->city}}</td>
</tr>
<tr>
<th scope="row">Country</th>
<td>{{$user->country}}</td>
</tr>

</table>

<a href="{{route('profile.edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
    
   
@endsection
