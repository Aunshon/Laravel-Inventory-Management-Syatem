@extends('layouts.frontEndApp')
@section('pageHeading')
    Show Each Customer Bill
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



  <div class="row">
    <div class="col">
        <select name="saleid" id="select" class="form-control">
            <option value="0" class="form-control">* Select One *</option>
            @foreach ($showEachBill as $item)
                <option value="{{$item->saleid}}" class="form-control"> {{$item->saleid}} -- {{App\customerInfo::findOrFail($item->customerid)->customerName}} </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <button class="btn btn-success" id="go">Go</button>
    </div>
  </div>








  <div>
        <table class="table" id="table_id">
        <thead class="table-dark">
            <tr>
            <th scope="col">saleid</th>
            <th scope="col">stockid</th>
            <th scope="col">categoryid</th>
            <th scope="col">buingPrice</th>
            <th scope="col">sellingPrice</th>
            <th scope="col">quantity</th>
            <th scope="col">available</th>
            <th scope="col">totalBill</th>
            <th scope="col">pay</th>
            <th scope="col">due</th>
            <th scope="col">dis</th>
            <th scope="col">payMethod</th>
            <th scope="col">customerid</th>
            <th scope="col">dueDate</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($showEachBillshow as $item)
                <tr>
                    <td> {{$item->saleid}} </td>
                    <td> {{$item->stockid}} </td>
                    <td> {{$item->categoryid}} </td>
                    <td> {{$item->buingPrice}} </td>
                    <td> {{$item->sellingPrice}} </td>
                    <td> {{$item->quantity}} </td>
                    <td> {{$item->available}} </td>
                    <td> {{$item->totalBill}} </td>
                    <td> {{$item->pay}} </td>
                    <td> {{$item->due}} </td>
                    <td> {{$item->dis}} </td>
                    <td> {{$item->payMethod}} </td>
                    <td> {{$item->customerid}} </td>
                    <td> {{$item->dueDate}} </td>
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
    <script>
        $('#go').click(function () {
            var base_url = window.location.origin+window.location.pathname;
            // window.location.href =base_url+'/'+$('#select').val();
            var newlink = base_url+"/"+$('#select').val();
            window.location.href = $('#select').val();
            // alert(newlink);
        });
    </script>

@endsection


@endsection

