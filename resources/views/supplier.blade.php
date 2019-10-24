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




<div class="col-12">



<!--Trigger-->
<a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"><i class="fa fa-plus"></i> New Supplier</a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Add new Supplier</h4>
      <form action="{{ Route('saveNewSupplier') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Name</label>
            <input value=" {{old('supplierName')}} " name="supplierName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Company Name</label>
            <input value=" {{old('companyName')}} " name="companyName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Company name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Address</label>
            <input value=" {{old('supplierAddress')}} " name="supplierAddress" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier Address">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier First Contact</label>
            <input value=" {{old('firstContact')}} " name="firstContact" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier First Contact">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Supplier Second Contact</label>
            <input value=" {{old('secondContact')}} " name="secondContact" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Supplier Second Contact">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Activation</label>
            <select name="activation" class="form-control" id="exampleFormControlSelect1">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
            </select>
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
            <th scope="col">Supplier Name</th>
            <th scope="col">Complay</th>
            <th scope="col">First Contact</th>
            <th scope="col">Second Contact</th>
            <th scope="col">Activation</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allSupplier as $item)
            <tr>
            <th scope="row">{{$item->supplierName}}</th>
            <td>{{$item->companyName}}</td>
            <td>{{$item->firstContact}}</td>
            <td>{{$item->secondContact}}</td>
            <td>
                @if ($item->activation == 1)
                    <a class="btn btn-success" href=" {{__('changeSupplierActivation')}}/{{$item->id}}/{{$item->activation}} ">Active</a>
                @else
                    <a class="btn btn-danger" href=" {{__('changeSupplierActivation')}}/{{$item->id}}/{{$item->activation}} ">Inactive</a>
                @endif
            </td>
            <td><textarea name="adiinfo" cols="20" rows="2" readonly> {{$item->supplierAddress}} </textarea></td>
            <td>
                <a class="btn btn-primary" href=" {{__('supplierEdit')}}/{{$item->id}} "><i class="fa fa-edit"></i></a>
                {{-- <a class="btn btn-danger" href=" {{__("deleteCategory")}}/{{$item->id}} " ><i class="fa fa-trash"></i></a> --}}
                <button onclick="myFunction({{$item->id}})" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
            </td>
            </tr>
            @empty
            <tr><td>No data available</td></tr>
            @endforelse
        </tbody>
        </table>
</div>



</div>




@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}
<script>
function myFunction(id) {
  var txt;
  var r = confirm("Make sure you want to delete ?!");
  if (r == true) {
    location.href = "{{__("deleteSupplier")}}/"+id;
  }
}
</script>

@endsection


@endsection

