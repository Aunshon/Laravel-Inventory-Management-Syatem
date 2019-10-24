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






<div>
        <table class="table" id="table_id">
        <thead class="table-dark">
            <tr>
            <th scope="col">Stock Id</th>
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Supplier Name</th>
            <th scope="col">Stock Buing</th>
            <th scope="col">Stock Selling</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allStock as $item)
            <tr>
            <th scope="row">{{$item->stockid}}</th>
            <td>{{App\Product::findOrFail($item->productid)->productid}}</td>
            <td>{{App\Product::findOrFail($item->productid)->productName}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{App\Category::findOrFail($item->categoryid)->categoryName}}</td>
            <td>{{App\supplier::findOrFail($item->supplierid)->supplierName}}</td>
            <td> {{$item->buingPrice}} </td>
            <td> {{$item->sellingPrice}} </td>
            </tr>
            @empty
            <tr><td>No data available</td></tr>
            @endforelse
        </tbody>
        </table>
        {{-- {{ $allProduct->links() }} --}}
</div>



</div>




@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}


@endsection


@endsection

