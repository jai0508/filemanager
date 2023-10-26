@extends('layouts.productApp')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="product/store" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name"  >
    </div>
    @if($errors->has('name'))
{{ $errors->first('name') }}
    @endif
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text"  name="description" class="form-control" id="description"  >
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
@stop
