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




<div class="col-8">



          <form action="{{ Route('saveSellQueue') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Sale Id</label>
            <input readonly value=" {{'PSLN0'.($lastId->id+1)}} " name="saleid" class="form-control">
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
            <select name="stockid" class="form-control" id="productid">
            <option >Select One</option>
            </select>
        </div>


          <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Buing Price</label>
                    <input value=" {{old('buingPrice')}} " readonly id="buingPrice" name="buingPrice" class="form-control" placeholder="0.00">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Selling Price</b></label>
                    <input value=" {{old('sellingPrice')}} " readonly id="sellingPrice" name="sellingPrice" class="form-control" placeholder="0.00">
                </div>
            </div>
        </div>


          <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Quantity</label>
                    <input value="{{old('quantity')}}" id="quantity" name="quantity" type="number" class="form-control"  placeholder="Enter Quantity">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Available</label>
                    <input value="{{old('available')}}" readonly id="available" name="available" type="number" class="form-control"  placeholder="Enter Quantity">
                </div>
            </div>
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
            <label>Due</label>
            <input value="{{old('due')}}" readonly id="due" name="due" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label>Discreption</label>
            <input value="{{old('dis')}}" name="dis" type="text" class="form-control">
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




@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}
        <script>
        $(document).ready(function () {
            var globalQuan = 0;
            $('#categoryid').change(function () {
                var categoryid=$(this).val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });



                $.ajax({
                type:'POST',
                url:'/getProducts',
                data: {categoryid: categoryid},
                    success: function (data) {
                        // $( "#company_upazilla" ).html(data);
                        $('#productid').html(data);
                        // alert(data);
                    }
                });



            });
            $('#productid').change(function () {
                var stockid=$(this).val();
                //  alert(stockid);

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });



                $.ajax({
                type:'POST',
                url:'/getBuingPrice',
                data: {stockid: stockid},
                    success: function (data) {
                        // alert(data);
                        $('#buingPrice').val(data);
                        // $('#sellingPrice').val(data[1]);
                    }
                });

                $.ajax({
                type:'POST',
                url:'/getSellingPrice',
                data: {stockid: stockid},
                    success: function (data) {
                        // alert(data);
                        $('#sellingPrice').val(data);
                        // $('#sellingPrice').val(data[1]);
                        var sell = $('#sellingPrice').val();
                        var quantity = $('#quantity').val();
                        $('#totalBill').val(sell*quantity);
                    }
                });

                $.ajax({
                type:'POST',
                url:'/getquantity',
                data: {stockid: stockid},
                    success: function (data) {
                        // alert(data);
                        $('#available').val(data);
                        globalQuan = data;
                        LoadPrice();
                    }
                });



            });

            $('#buingPrice').click(function () {
                // alert(000000000000000);
                LoadPrice()
            });
            $('#quantity').keyup(function () {
                LoadPrice();
            });
            $('#totalBill').keyup(function () {
                LoadPrice();
            });
            $('#pay').keyup(function () {
                var totalBill = $('#totalBill').val();
                var pay = $('#pay').val();
                if (parseInt(pay) > parseInt(totalBill)) {
                    // alert();
                    $('#pay').css("background-color", "red");
                    $('#due').val(0);
                }
                else{
                    $('#pay').css("background-color", "white");
                    $('#due').val(parseInt(totalBill) - parseInt(pay));
                }
            });
            function LoadPrice() {
                var sell = $('#sellingPrice').val();
                var quantity = $('#quantity').val();
                var available = $('#available').val();
                $('#totalBill').val(sell*quantity);
                if (parseInt(quantity) > parseInt(available)) {
                    // alert();
                    $('#quantity').css("background-color", "red");
                    $('#available').val(globalQuan);
                }
                else{
                    $('#quantity').css("background-color", "white");
                    $('#available').val(globalQuan-quantity);
                }
            }
        });
    </script>

@endsection


@endsection

