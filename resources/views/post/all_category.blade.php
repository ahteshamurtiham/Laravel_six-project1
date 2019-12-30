@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
      
         <a href="{{ route('add-category') }}" class="btn btn-success">Add Category</a>
         <a href="{{ route('all-category') }}" class="btn btn-danger" id="cmsg">All Category</a>
       <hr>
<form action="{{ route('multidelete') }}" method="post">
  @csrf
     <table class="table table-bordered" >
         <thead>
         <tr>
           <th><input type="checkbox" id="ckbCheckAll" value="All"></th>
             <th>Serial No</th>
             <th>Category Name</th>
             <th>Slug</th>
             <th>Created at</th>
             <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($category as $cat )
         <tr>
                <td><input name="checkbox[]" value="{{ $cat->id }}" type="checkbox" class="checkbox"></td>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->slug }}</td>
                <td>{{ $cat->created_at }}</td>
                <td>
                    <a href="{{ URL::to('single-category/'. $cat->id) }}" class="btn btn-sm btn-dark">View</a>
                    <a href="{{ URL::to('edit-category/'. $cat->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <input type="button" data-id='{{ $cat->id }}' class="btn btn-sm btn-danger delete" value="Delete">
                </td>
            </tr>  
         @endforeach
       
        </tbody>
     </table>
     <input type="submit" value="Delete All" class="btn btn-outline-danger">
    </form>
      
      </div>
    </div>
  </div>

@endsection