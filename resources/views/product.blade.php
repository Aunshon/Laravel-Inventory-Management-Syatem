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



<!--Trigger-->
<a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"><i class="fa fa-plus"></i>New Product</a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Add new Product</h4>
      <form action="{{ Route('saveNewProduct') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Product Id</label>
            <input readonly value=" {{'PRN0'.($lastId->id+1)}} " name="productid" type="text" class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label >Stock Name</label>
            <input value="{{old('productName')}}" name="productName" type="text" class="form-control"  placeholder="Enter Product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="categoryid" class="form-control" id="exampleFormControlSelect1">
            <option >Select One</option>
            @forelse ($allCategory as $item)
            <option value=" {{$item->id}} "> {{$item->categoryName}} </option>
            @empty
                <option>No Data Found</option>
            @endforelse
            </select>
        </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Aditional Info..</label>
            <textarea name="aditional" class="form-control"></textarea>
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
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Aditional Info</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allProduct as $item)
            <tr>
            <th scope="row">{{$item->productid}}</th>
            <td>{{$item->productName}}</td>
            <td>{{App\Category::findOrFail($item->categoryid)->categoryName}}</td>
            <td>{{$item->aditional}}</td>
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
                                                        <label for="exampleInputEmail1">Product Id</label>
                                                        <input readonly readonly value="{{$item->productid}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Product Name</label>
                                                        <input readonly value="{{$item->productName}}"type="text" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <input readonly value="{{App\Category::findOrFail($item->categoryid)->categoryName}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Aditional Info..</label>
                                                        <input readonly value="{{$item->aditional}}" class="form-control">
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
        {{ $allProduct->links() }}
</div>



</div>




@section('addNewScript')
    {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}




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

