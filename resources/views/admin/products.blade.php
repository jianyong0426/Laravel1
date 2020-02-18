@extends('layouts.app')
@section('content')

<h1>Products</h1>
<div align="right"><a href="{{route('admin.products.edit',0)}}" class="btn btn-primary">Add Product</a></div>
<table class="table table-hover" style="text-align:center">
@foreach ($products as $p)
<tr>
@if($p->image_url)

<td><img src="{{url($p->image_url[0])}}" height=80></td>
@endif
<td width=1><a href="{{route('admin.products.edit',$p->id)}}" class="btn btn-success">edit</a></td>
<td width=1><a href="{{route('admin.products.delete',$p->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
<td>{{$p->name}}</td>
<td>RM{{number_format(($p->price),2)}}</td>
</tr>
@endforeach
</table>
@endsection