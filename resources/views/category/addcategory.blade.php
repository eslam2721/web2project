@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/addcategorynew')}}" >
    <table class="table " style="background-color: #c8cbcf">

            {{ csrf_field() }}
            <tr><td style="font-weight: bold">name:</td><td> <input type="text" name="name" placeholder="category name" /></td></tr>
            <tr><td style="font-weight: bold">discribtion</td><td><input name="description" placeholder="description category"></td></tr>
            <tr><td colspan="2"  align="center"><input type="submit" class="btn btn-success btn-lg" align="center" value="Add a category"></td></tr>


    </table> </form>
@endsection