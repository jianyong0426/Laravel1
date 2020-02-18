@extends('layouts.app')
@section('content')

<form action="{{route('admin.products.save',$product->id)}}" enctype="multipart/form-data" method="post">
@csrf
<div class="form-group @error('file') has-error @enderror">
<label for="file">File:</label>
<input type="file" name="photo[]" multiple="multiple"/>
@error('photo')
<span class = "text-danger">{{$message}}</span>
@enderror
<div class="form-group @error('name') has-error @enderror">
<label for="name">Name:</label>
<input type="text" name="name" value="{{old('name',$product->name)}}" placeholder="Product Name" class="form-control" id="name"/>
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<div class="form-group @error ('description') has-error @enderror" >
<label for="description">Description:</label>
<input type="text" name="description" value="{{old('description',$product->description)}}" placeholder="Description" id="description" class="form-control"/>
@error('description')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<div class="form-group @error ('price') has-error @enderror">
<label for="price">Price:</label>
<input type="text" name="price" value="{{old('price',$product->price)}}" placeholder="Price" id="price" class="form-control"/>
@error('price')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<button type="submit" class="btn btn-success">save</button>
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