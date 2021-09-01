@extends('layouts.app')
@section('content')
    <form method="post" action="/editproductnew/{{$pro->id}}" >
    <table class="table" style="background-color: #c8cbcf">
           {{ csrf_field() }}
            <input type="hidden" name="pro_id" value="{{$pro->id}}">
            <tr><td>name:</td><td> <input type="text" name="name" value="{{$pro->name}}" /></td></tr>
            <tr><td>price:  </td><td><input name="price" value="{{$pro->price}} " /></td></tr>
            <tr><td>quantity:  </td><td><input type="number" min="0" name="quantity" value="{{$pro->quantity}}" /></td></tr>
             <tr><td>discounted:  </td><td><input type="number" min="0" name="discounted" value="{{$pro->discounted}}" /></td></tr>
            <tr><td>description</td><td><input  name="description" value="{{$pro->description}}"></td></tr>
            <tr><td colspan="2"  align="center"><input type="submit" class="btn btn-success btn-lg" align="center" value=" Edit the product "></td></tr>


    </table> </form>
@endsection