@extends('layouts.frontEndApp')
@section('pageHeading')
    Stock Edit
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




<div class="col-10">

      <form action="{{ Route('saveEditedStock') }}" method="POST">
        @csrf
      <input name="id" type="hidden" value="{{$id}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Stock Id</label>
            <input readonly value=" {{App\stock::findOrFail($id)->stockid}} " name="stockid" type="text" class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label >Stock Name</label>
            <input value="{{App\stock::findOrFail($id)->stockName}}" name="stockName" type="text" class="form-control"  placeholder="Enter Stock name">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input value="{{App\stock::findOrFail($id)->quantity}}" name="quantity" type="number" class="form-control"  placeholder="Enter Quantity">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select supplier</label>
            <select name="supplierid" class="form-control" id="exampleFormControlSelect1">
            <option >Select One</option>
            @forelse ($allSupplier as $item)
            <option value=" {{$item->id}} "> {{$item->supplierName}} </option>
            @empty
                <option value="0">No Data Found</option>
            @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="categoryid" class="form-control" id="exampleFormControlSelect1">
            <option >Select One</option>
            @forelse ($allCategory as $item)
            <option value=" {{$item->id}} "> {{$item->categoryName}} </option>
            @empty
                <option value="0">No Data Found</option>
            @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Buing Price</label>
            <input value="{{App\stock::findOrFail($id)->buingPrice}}" name="buingPrice" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Selling Price</label>
            <input value="{{App\stock::findOrFail($id)->sellingPrice}}" name="sellingPrice" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Expire Date Now--></label>
            <input type="text" readonly value="{{App\stock::findOrFail($id)->expireDate}}">
            <input value=" {{old('expireDate')}} " name="expireDate" type="date" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <button type="submit" class="btn btn-primary col-12 text-center">Add</button>
    </form>





</div>




@section('addNewScript')


@endsection


@endsection

