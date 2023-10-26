@extends('layouts.productApp')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="/product/{{$product->id}}/update" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
    </div>
    @if($errors->has('name'))
{{ $errors->first('name') }}
    @endif
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text"  name="description" class="form-control" id="description"  value="{{$product->description}}"  >
      </div>
      @if($errors->has('description'))
{{ $errors->first('description') }}
    @endif
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file"  name="image" class="form-control" id="description">
      </div>
      @if($errors->has('image'))
{{ $errors->first('image') }}
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@stop
