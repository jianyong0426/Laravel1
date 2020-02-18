@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('addcart',$product->id),(session(['quantity'=>'qty']))}}">
@csrf
<table width=60% >
    <tr>
    @foreach($product->image_url as $image)
    <td rowspan="4" width = "40%" align="center"><img src="{{url($image)}}" height = 400></td>
    @endforeach
    <td colspan="2" width = "20%" height="1px"><label><h1>{{$product->name}}</h1></label></td>
    </tr>
    <tr>
    <td colspan="2" width="20%" height="100px" valign="top"><label><h3>RM{{number_format(($product->price),2)}}</h3></label></td>
    </tr>

    <tr>
    <td width="10%" height="180px" style=""><label>Quantity</label></td>
    <td width="10%"><input name='quantity' value="1" id="quantity" type="number" min="1" max="99" required></td>
    </tr>
<tr>
<td colspan="2" height="50px"><button name="addToCart" type="submit" class="btn btn-primary">Add To Cart</button></td>
</tr>
</table>
</form>


@endsection