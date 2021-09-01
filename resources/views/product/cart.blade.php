@extends('layouts.app')

@section('content')


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <table class="table table-hover text-center font-weight-bold bg-light" style="font-size: 15px"  >
    <!--<table id="cart" class="table table-hover table-condensed">-->
        <thead >
        <tr>
            <th style="width:15%;color: #c51f1a;" ><h2 class="font-weight-bold">image</h2></th>
            <th style="width:35%;color: #c51f1a;"><h2 class="font-weight-bold">Product</h2></th>
            <th style="width:10%;color: #c51f1a;"><h2 class="font-weight-bold">Price</h2></th>
            <th style="width:8%;color: #c51f1a;"><h2 class="font-weight-bold">Quantity</h2></th>
            <th style="width:22%;color: #c51f1a;" class="text-center"><h2 class="font-weight-bold">Subtotal</h2></th>

        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>

                    <td><img src="/images/{{$details['image']}}" width="100" height="100" class="img-responsive" style="border-radius: 12px;margin-left: 20%"/></td>
                    <td> <h3 class="font-weight-bold">{{ $details['name'] }}</h3></td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" readonly style="font-size: 13px"/>
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>

                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr >
            <td><a href="{{ route('show')}}" class="btn btn-warning btn-lg" style="font-size:15px;font-weight: bolder;margin-left: 100%" ><i class="fa fa-angle-left" ></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total<span style=" color:green;"> $</span>{{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection
