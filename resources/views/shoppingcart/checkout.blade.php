@extends('layouts.app')
@section('content')

<table class="table" border=1px solid>

<thead class="thead-dark">
<tr> 
<th>Product name</th>
<th>Description</th>
<th>Price</th>
<th>Quantity</th>
</tr>
</thead>
@foreach($cart_items as $p)
<tr>
<td>{{$p->product_name}}</td>
<td>{{$p->description}}</td>
<td>{{$p->product_price}}</td>
<td>{{$p->product_quantity}}</td>
</tr>
@endforeach
</table>
<form action="{{route('payment')}}" method="post">
@csrf
<table class="table">
<tr>
    <td >
        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{old('name',Auth::user()->name)}}" placeholder="Name" class="form-control" id="name"/>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
    <td >
        <div class="form-group @error('address') has-error @enderror">
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{old('address',Auth::user()->address)}}" placeholder="address" class="form-control" id="address"/>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
    <td>
        <div class="form-group @error ('postcode') has-error @enderror" >
            <label for="postcode">Postcode:</label>
            <input type="text" name="postcode" value="{{old('postcode',Auth::user()->postcode)}}" placeholder="postcode" id="postcode" class="form-control"/>
            @error('postcode')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
    <td>
        <div class="form-group @error ('city') has-error @enderror">
            <label for="city">City:</label>
            <input type="text" name="city" value="{{old('city',Auth::user()->city)}}" placeholder="city" id="city" class="form-control"/>
            @error('city')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
    <td>
        <div class="form-group @error ('country') has-error @enderror">
            <label for="country">Country:</label>
            <input type="text" name="country" value="{{old('country',Auth::user()->country)}}" placeholder="country" id="country" class="form-control"/>
            @error('country')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
    <td >
        <div class="form-group @error('phone') has-error @enderror">
            <label for="phone">Phone No.:</label>
            <input type="text" name="phone" value="{{old('phone',Auth::user()->phone)}}" placeholder="phone" class="form-control" id="phone"/>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </td>
</tr>
<tr>
<td><button type="submit" class="btn btn-success">Proceed to Payment</button></td>
</tr>
</table>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please correct error and try again!</strong><br/>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>


@endsection