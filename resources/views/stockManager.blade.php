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

<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="col-12">



<!--Trigger-->
<a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"><i class="fa fa-plus"></i> New Stock</a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Add new Stock</h4>
      <form action="{{ Route('saveNewStock') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Stock Id</label>
            <input readonly value=" {{'STN0'.($lastId->id+1)}} " name="stockid" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="categoryid" class="form-control" id="categoryid">
            <option >Select One</option>
            @forelse ($allCategory as $item)
            <option value=" {{$item->id}} "> {{$item->categoryName}} </option>
            @empty
                <option>No Data Found</option>
            @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Product</label>
            <select name="productid" class="form-control" id="productid">
            <option >Select One</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Select supplier</label>
            <select name="supplierid" class="form-control" id="exampleFormControlSelect1">
            <option >Select One</option>
            @forelse ($allSupplier as $item)
            <option value=" {{$item->id}} "> {{$item->supplierName}} </option>
            @empty
                <option>No Data Found</option>
            @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Buing Price</label>
            <input value=" {{old('buingPrice')}} " id="buingPrice" name="buingPrice" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Selling Price</label>
            <input value=" {{old('sellingPrice')}} " id="sellingPrice" name="sellingPrice" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input value="{{old('quantity')}}" id="quantity" name="quantity" type="number" class="form-control"  placeholder="Enter Quantity">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Expire Date</label>
            <input value=" {{old('expireDate')}} " name="expireDate" type="date" class="form-control"  aria-describedby="emailHelp" placeholder="0.00">
        </div>
        <div class="form-group">
            <label>Total Bill</label>
            <input value="{{old('totalBill')}}" readonly id="totalBill" name="totalBill" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label>Pay</label>
            <input value="{{old('pay')}}" id="pay" name="pay" type="number" class="form-control"placeholder="Enter money">
        </div>
        <div class="form-group">
            <label>Discreption</label>
            <input value="{{old('dis')}}" name="dis" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Due</label>
            <input value="{{old('due')}}" readonly id="due" name="due" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label>Pay Mothod</label>
            <select name="payMethod" class="form-control" id="payMethod">
            <option value="1">Cash</option>
            <option value="2">Check</option>
            <option value="3">Bikash</option>
            </select>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <input value="{{old('dueDate')}}" name="dueDate" type="date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary col-12 text-center">Add</button>
    </form>
      </div>
    </div>
  </div>
</div>



<div>
        <table class="table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Stock Id</th>
            {{-- <th scope="col">Product ID</th> --}}
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Supplier</th>
            <th scope="col">Category</th>
            <th scope="col">Buing Price</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Expire Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allStock as $item)
            <tr>
            <th scope="row">{{$item->stockid}}</th>
            {{-- <td>{{App\Product::findOrFail($item->productid)->productid}}</td> --}}
            <td>{{App\Product::findOrFail($item->productid)->productName}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{App\supplier::findOrFail($item->supplierid)->supplierName}}</td>
            <td>{{App\Category::findOrFail($item->categoryid)->categoryName}}</td>
            <td>{{$item->buingPrice}}</td>
            <td>{{$item->sellingPrice}}</td>
            <td>{{$item->expireDate}}</td>
            <td>
                <a class="btn btn-primary" href=" {{__('stockEdit')}}/{{$item->id}} "><i class="fa fa-edit"></i></a>
                {{-- <a class="btn btn-danger" href=" {{__("deleteCategory")}}/{{$item->id}} " ><i class="fa fa-trash"></i></a> --}}




                                        <!--Trigger-->
                                        <a class="btn btn-success" href="#" data-target="#{{$item->id}}" data-toggle="modal"><i class="fa fa-eye"></i></a>

                                        <div id="{{$item->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                            <div class="modal-body">
                                                <button data-dismiss="modal" class="close">&times;</button>


                                                        <div class="form-group">
                                                        <label for="exampleInputEmail1">Stock Id</label>
                                                        <input readonly readonly value=" {{$item->stockid}} " type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Product Name Name</label>
                                                        <input readonly value="{{App\Product::findOrFail($item->productid)->productName}}"type="text" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input readonly value="{{$item->quantity}}"type="number" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">supplier</label>
                                                        <input readonly value="{{ App\supplier::findOrFail($item->supplierid)->supplierName}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Category</label>
                                                        <input readonly value="{{App\Category::findOrFail($item->categoryid)->categoryName}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Buing Price</label>
                                                        <input readonly value="{{$item->buingPrice}}" type="number" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Selling Price</label>
                                                        <input readonly value="{{$item->sellingPrice}}" type="number" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Expire Date</label>
                                                        <input readonly value="{{$item->expireDate}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Total Bill</label>
                                                        <input readonly value="{{$item->totalBill}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Paid</label>
                                                        <input readonly value="{{$item->pay}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Due</label>
                                                        <input readonly value="{{$item->due}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Pay Method</label>
                                                        <p class="form-control">@php
                                                            if($item->payMethod == 1){
                                                                echo "Cash";
                                                            }
                                                            elseif ($item->payMethod == 2) {
                                                                echo "Check";
                                                            }
                                                            else {
                                                                echo "bikash";
                                                            }
                                                        @endphp</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Dis</label>
                                                        <input readonly value="{{$item->dis}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Due Date</label>
                                                        <input readonly value="{{$item->dueDate}}" type="text" class="form-control">
                                                    </div>

                                            </div>
                                            </div>
                                        </div>
                                        </div>




                <button onclick="myFunction({{$item->id}})" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
            </td>
            </tr>
            @empty
            <tr><td>No data available</td></tr>
            @endforelse
        </tbody>
        </table>
        {{ $allStock->links() }}
</div>



</div>

<div class="tooltip">Hover over me
  <span class="tooltiptext">Tooltip text</span>
</div>


@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}

    <script>
        $(document).ready(function () {
            $('#categoryid').change(function () {
                var categoryid=$(this).val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });



                $.ajax({
                type:'POST',
                url:'/getProductName',
                data: {categoryid: categoryid},
                    success: function (data) {
                        // $( "#company_upazilla" ).html(data);
                        // alert(data);
                        $('#productid').html(data);
                    }
                });



            });
        });
    </script>
    <script>
            $(document).ready(function () {
                $('#buingPrice').keyup(function () {
                    var quantity = $('#quantity').val();
                    var buingPrice = $('#buingPrice').val();
                    var pay = $('#pay').val();
                    var totalBill = $('#totalBill').val();

                        $('#totalBill').val(quantity*buingPrice);
                        $('#due').val(totalBill-pay);
                });
                $('#totalBill').click(function () {
                    var quantity = $('#quantity').val();
                    var buingPrice = $('#buingPrice').val();
                    var pay = $('#pay').val();
                    var totalBill = $('#totalBill').val();

                        $('#totalBill').val(quantity*buingPrice);
                        $('#due').val(totalBill-pay);
                });
                $('#quantity').keyup(function () {
                    var quantity = $('#quantity').val();
                    var buingPrice = $('#buingPrice').val();
                    var pay = $('#pay').val();
                    var totalBill = $('#totalBill').val();

                        $('#totalBill').val(quantity*buingPrice);
                        $('#due').val(totalBill-pay);
                });
                $('#pay').keyup(function () {
                    var quantity = $('#quantity').val();
                    var buingPrice = $('#buingPrice').val();
                    var pay = $('#pay').val();
                    var totalBill = $('#totalBill').val();

                        $('#totalBill').val(quantity*buingPrice);
                        $('#due').val(totalBill-pay);
                });
                $('#due').click(function () {
                    var pay = $('#pay').val();
                    var totalBill = $('#totalBill').val();
                        $('#due').val(totalBill-pay);
                });

                // $('#two').click(function(){
                //     // alert('two');
                //     $('#shiping').html(1.99);
                //     $('#ship').val(1.99);
                //     var total_amount=$('#total_amount').html();
                //     $('#print_total').html(parseFloat(total_amount)+1.99);
                //     $('#tot').val(parseFloat(total_amount)+1.99);
                // });

                // $('#three').click(function(){
                //     // alert('three');
                //     $('#shiping').html(0);
                //     $('#ship').val(0);
                //     var total_amount=$('#total_amount').html();
                //     $('#print_total').html(parseFloat(total_amount)+0);
                //     $('#tot').val(parseFloat(total_amount)+0);
                // });

    });
    </script>



<script>
function myFunction(id) {
  var txt;
  var r = confirm("Make sure you want to delete ?!");
  if (r == true) {
    location.href = "{{__("deleteStock")}}/"+id;
  }
}
</script>

@endsection


@endsection

