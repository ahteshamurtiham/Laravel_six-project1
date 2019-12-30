@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      
         <a href="{{ route('add-category') }}" class="btn btn-success">Add Category</a>
         <a href="{{ route('all-category') }}" class="btn btn-danger" id="cmsg">All Category</a>
       <hr>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
        
        <form action="{{ url('update-category/'.$category->id) }}" method="post" >
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name </label>
              <input type="text" class="form-control" value="{{ $category->name }}"name="name"   >
             
            </div>
          </div>
          <br>
        
         
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Category Slug</label>
              <input type="text" class="form-control" value="{{ $category->slug }}" name="slug"   >
              
            </div>
          </div>
         
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection