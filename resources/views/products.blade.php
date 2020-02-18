@extends('layouts.app')
@section('content')

<h1>products</h1>
<div class="row">
    @foreach ($products as $p)
        <div class = "col-6 col-sm-3">
            <a href="{{route('products.show',$p->id)}}"><img src="{{url($p->image_url[0])}}" height=200/></a><br/>
            <a href="{{route('products.show',$p->id)}}">{{$p->name}}</a>
            <p>{{$p->description}}</p>
            <p>RM{{number_format($p->price,2)}}</p>
        </div>
        @if($loop->iteration % 4 ==0)
        </div>
        <div class="row">
        @endif
    @endforeach
</div>
@endsection