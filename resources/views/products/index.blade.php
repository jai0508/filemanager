@extends('layouts.productApp')

@section('content')


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <th scope="row">1</th>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td><img src="/product/{{$product->image}}" height="30px" width="30px"></td>
        <td><a href="/product/{{$product->id}}/edit" >Edit</a></td>
        <td><a href="/product/{{$product->id}}/delete" >Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @stop

