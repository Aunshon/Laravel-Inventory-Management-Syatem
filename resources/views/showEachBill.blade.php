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

