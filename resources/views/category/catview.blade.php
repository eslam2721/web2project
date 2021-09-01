@extends('layouts.app')
@section('content')
<body style="background-color: #f5f5f5">
<table class="table" style="background-color: #c8cbcf">
    <tr>
        <th>name</th>
        <th>description</th>
        <th>SHOW PRODUCTS</th>
        <!--<th>Edit</th>
        <th>DELETE</th>-->
    </tr>

@foreach($categories as $category)
<tr>
    <td style="font-size: 20px;font-weight: bold "> {{$category->name}}</td>
    <td style="font-size: 16px;font-weight: bold "> {{$category->description}}</td>

    <td><a class="btn btn-primary" href="product/proview/{{$category->id}}">SHOW PRODUCTS</a></td>
@if(Auth::user()->type==1)
   <!-- <td><a class="btn btn-primary"  href="#">Edit</a></td>
    <td><a class="btn btn-primary" href="{{route('delcategory',$category->id)}}">DELETE</a></td> -->
    @endif
</tr>
@endforeach
    @if(Auth::user()->type==1)
    <tr><td colspan="5" align="center" ><a class="btn btn-primary" href="{{route('addcategory')}}" >ADD A Category</a></td> </tr>
        @endif
</table>
@endsection