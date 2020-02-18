@extends('layouts.app')
@section('content')

<h1> Shopping Cart</h1>
<form action="{{route('cartupdate')}}" method="post">
@csrf
<table class="table" style="border:1px solid">
<thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th></th>
    </tr>
</thead>
@foreach ($cart_items as $i)
<tr>
<td>{{$i->product_name}}</td>
<td>{{$i->description}}</td>
<td><input type="number" name="quantity[{{$i->id}}]" id="quantity" value="{{$i->product_quantity}}" min='1' max='99'></td>
<td>{{$i->product_price}}</td>
<td>{{$i->total()}}</td>
<td width=1><a href="{{route('cartitem.delete',$i->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
<tr>
<td colspan='6' align='right'> <button type="submit" class="btn btn-success">Update</button></td>
</tr>
</table>
</form>
<span class="font-weight-bold">Total Price : RM{{number_format(($cart_total),2)}}</span>
<a href="{{route('checkout')}}" class="btn btn-success" align="right">Check Out</a>

@endsection