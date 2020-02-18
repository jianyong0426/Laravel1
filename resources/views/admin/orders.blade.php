@extends('layouts.app')
@section('content')

<table class="table">
    <thead class="thead-black">
        <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Postcode</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th></th>
        </tr>
    </thead>
    @foreach ($orders as $o)
 
            <tr>
                <td>{{$o->id}}</td>
                <td>{{$o->name}}</td>
                <td>{{$o->address}}</td>
                <td>{{$o->postcode}}</td>
                <td>{{$o->city}}</td>
                <td>{{$o->country}}</td>
                <td>{{$o->phone}}</td>
                <td>{{$o->status}}</td>  
                <td><a href="{{route('admin.order.show',$o->id)}}" class="btn btn-success">Check</a></td>               
            </tr>
    
     @endforeach
</table>
@endsection