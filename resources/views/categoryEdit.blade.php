@extends('layouts.frontEndApp')
@section('pageHeading')
    Edit Category
@endsection
@section('searchpanel')
        <li class="hide-phone app-search">
            <p>Edit Category</p>
        </li>
@endsection
@section('content')

<div class="col-10">

    <form action="{{ Route('saveEditedCategory') }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
        <input name="id" type="hidden" value="{{$id}}">
            <input value=" {{App\Category::findOrFail($id)->categoryName}} " name="categoryName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter category name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Activation</label>
            <select name="activation" class="form-control" id="exampleFormControlSelect1">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
        </div>
        <div class="form-group">
            <textarea name="adiinfo" class="form-control" placeholder="Write if has additional information ">{{App\Category::findOrFail($id)->adiinfo}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary col-12 text-center">Save</button>
    </form>
</div>


@endsection
