@extends('layouts.frontEndApp')
@section('pageHeading')
    Supplier
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


      <form action="{{ Route('saveEditedSupplier') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value=" {{$id}} ">
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Name</label>
            <input value=" {{App\supplier::findOrFail($id)->supplierName}} " name="supplierName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Company Name</label>
            <input value=" {{App\supplier::findOrFail($id)->companyName}} " name="companyName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Company name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Address</label>
            <input value=" {{App\supplier::findOrFail($id)->supplierAddress}} " name="supplierAddress" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier Address">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier First Contact</label>
            <input value=" {{App\supplier::findOrFail($id)->firstContact}} " name="firstContact" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier First Contact">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Second Contact</label>
            <input value=" {{App\supplier::findOrFail($id)->secondContact}} " name="secondContact" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier Second Contact">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Activation</label>
            <select name="activation" class="form-control" id="exampleFormControlSelect1">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary col-12 text-center">Save</button>
    </form>





</div>




@section('addNewScript')


@endsection


@endsection

