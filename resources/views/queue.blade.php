@extends('layouts.frontEndApp')
@section('pageHeading')
    Stock Manager
@endsection
@section('searchpanel')
        <li class="hide-phone app-search">
            <form role="search" class="">
                <input type="text" placeholder="Search..." class="form-control">
                <a href=""><i class="fa fa-search"></i></a>
            </form>
        </li>
@endsection
@section('content')




<div class="col-12">


@php
    $totalAmount =0;
    $totalQuantity = 0;
    $totalPay = 0;
    $totalDue = 0;
@endphp



<div>
        <table class="table" id="table_id">
        <thead class="table-dark">
            <tr>
            <th scope="col">Sale Id</th>
            <th scope="col">Stock Id</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Bill</th>
            <th scope="col">Pay</th>
            <th scope="col">Pay Method</th>
            <th scope="col">Due</th>
            <th scope="col">Due Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allqueue as $item)
            <tr>
            <th scope="row"> {{$item->saleid}} </th>
            <td> {{$item->stockid}}</td>
            <td> {{$item->sellingPrice}}</td>
            <td> {{$item->quantity}}</td>
            <td> {{$item->totalBill}}</td>
            <td> {{$item->pay}}</td>
            <td> {{$item->payMethod}}</td>
            <td> {{$item->due}}</td>
            <td> {{$item->dueDate}}</td>
            @php
                $totalAmount += $item->totalBill;
                $totalQuantity += $item->quantity;
                $totalPay += $item->pay;
                $totalDue += $item->due;
            @endphp
            </tr>
            @empty
            <tr><td>No data available</td></tr>
            @endforelse
            <tr>
                <td>--------------</td>
                <td>--------------</td>
                <td>--------------</td>
                <th scope="row"> {{$totalQuantity}} </t>
                <th scope="row"> {{$totalAmount}} </t>
                <th scope="row"> {{$totalPay}} </t>
                <td>--------------</td>
                <th scope="row"> {{$totalDue}} </th>
                <td>--------------</td>
            </tr>
        </tbody>
        </table>
        {{-- {{ $allProduct->links() }} --}}
</div>














<!--Trigger-->
<a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"></i>Sell Them</a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Customer Information</h4>
      <form action="{{ __('saveNewCustomer') }}" method="POST">
        @csrf
        <div class="form-group">
            <label >Customer Name</label>
            <input value="{{old('customerName')}}" name="customerName" type="text" class="form-control"  placeholder="Enter customer name">
        </div>
        <div class="form-group">
            <label >Customer Phone</label>
            <input value="{{old('customerPhone')}}" name="phone" type="text" class="form-control"  placeholder="Enter customer Phone">
        </div>
        <div class="form-group">
            <label >Customer Address</label>
            <input value="{{old('customerAddress')}}" name="address" type="text" class="form-control"  placeholder="Enter customer Address">
        </div>
        <button type="submit" class="btn btn-primary col-12 text-center">Check Out</button>
    </form>
      </div>
    </div>
  </div>
</div>














</div>




@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}


@endsection


@endsection

