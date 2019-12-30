@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 mx-auto m-auto">
      
         <a href="{{ route('add-category') }}" class="btn btn-success">Add Category</a>
         <a href="{{ route('all-category') }}" class="btn btn-danger" id="cmsg">All Category</a>
       <hr>

        <table class="table table-dark">
            <tr>
                <td>Category Name:</td>
                <td>{{ $singlecategory->name }}</td>
            </tr>
            <tr>
                <td>Category Slug:</td>
                    <td>{{ $singlecategory->slug }}</td>   
                </tr>
                <tr>
                  <td>Created at:</td>
                        <td>{{ $singlecategory->created_at }}</td>
                </tr>
        </table>
      
      </div>
    </div>
  </div>

@endsection