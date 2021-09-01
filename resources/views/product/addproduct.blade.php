@extends('layouts.app')
@section('content')
    <form method="POST" action="/addproductnew" enctype="multipart/form-data">
        {{ csrf_field() }}
<table class="table" style="background-color: #c8cbcf">


        <tr><td>name:</td><td> <input type="text" name="name" placeholder="product name" /></td></tr>
        <tr><td>img: </td><td><input type="file" name="img" /></td></tr>
        <tr><td>category: </td><td><select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select></td>
        </tr>
        <tr><td>price:  </td><td><input type="text" name="price" placeholder="product price" /></td></tr>
        <tr><td>quantity:  </td><td><input type="number" min="1" name="quantity" placeholder="product quantity" /></td></tr>
        <tr><td>discounted:  </td><td><input type="number" min="0" name="discounted" placeholder="discounted product " /></td></tr>
        <tr><td>discription</td><td><input type="text" name="description" placeholder="description product"></td></tr>
        <tr><td colspan="2"  align="center"><input type="submit" class="btn btn-success btn-lg" align="center" value="ADD a product"></td></tr>

</table> </form>
@endsection