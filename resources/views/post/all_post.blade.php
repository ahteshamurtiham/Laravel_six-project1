@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
      
         <a href="{{ route('write-post') }}" class="btn btn-success">Write post</a>
        
       <hr>
{{-- <form action="{{ route('multidelete') }}" method="post"> --}}
  {{-- @csrf --}}
     <table class="table table-bordered" >
         <thead>
         <tr>
           {{-- <th><input type="checkbox" id="ckbCheckAll" value="All"></th> --}}
             <th>Serial No</th>
             <th>Category</th>
             <th>Title</th>
             <th>Image</th>
            
             <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($post as $all )
         <tr>
                {{-- <td><input name="checkbox[]" value="{{ $cat->id }}" type="checkbox" class="checkbox"></td> --}}
                <td>{{ $all->id }}</td>
                <td>{{ $all->name }}</td>
                <td>{{ $all->title }}</td>
                <td><img src="{{ URL::to($all->image) }}" style="height:40px; weight:70px;" alt=""></td>
               
                <td>
                    <a href="{{ URL::to('single-post/'. $all->id) }}" class="btn btn-sm btn-dark">View</a>
                    <a href="{{ URL::to('edit-post/'. $all->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <input type="button" data-id='{{ $all->id }}' class="btn btn-sm btn-danger delete" value="Delete"> --}}
                    <a href="{{ URL::to('delete-post/'. $all->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>  
         @endforeach
       
        </tbody>
     </table>
     {{-- <input type="submit" value="Delete All" class="btn btn-outline-danger">
    </form> --}}
      
      </div>
    </div>
  </div>

@endsection