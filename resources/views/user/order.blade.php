@extends('layouts.app')
@section('content')

@foreach($order as $o)
OrderID : {{$o->id}}
Name    : {{$o->name}}
Address : {{$o->address}}
Postcode: {{$o->postcode}}
City    : {{$o->city}}
Country : {{$o->country}}
Phone   : {{$o->phone}}
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scole="col">Product Name</th>
            <th scole="col">Description</th>
            <th scole="col">Quantity</th>
        </tr>
    </thead>
        @foreach($o->items as $i)
            <tr>
                <td>{{$i->product_name}}</td>
                <td>{{$i->description}}</td>
                <td>{{$i->quantity}}</td>
            </tr>
        @endforeach
</table>
<h3>Status: {{$o->status}}</h3>
@endforeach

@endsection