@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      
         
         <a href="{{ route('all-post') }}" class="btn btn-dark">All Post</a>
       <hr>
       {{-- validation eror message --}}
       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
        
        <form action="{{ url('update-post/'.$post->id) }}" method="post" enctype="multipart/form-data">
          @csrf

         
          
          <div class="control-group">
            <div class="form-group ">
              <label>Post Title:</label>
              <input type="text" class="form-control" value="{{ $post->title }}" name="title" required >
             
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group ">
              <label>Category:</label>
              <select class="form-control" name="categories_id">
                @foreach ($category as $row)
                <option value="{{ $row->id}}" <?php if($row->id == $post->categories_id) echo "selected"; ?> > {{ $row->name }} </option>
                @endforeach
              
              

              </select>
              
            </div>
          </div>
          <br>
         
          <div class="control-group">
            <div class="form-group col-xs-12 ">
            
              <label>New Image:</label>
              <input type="file" class="form-control" placeholder="Images" name="image" >
              <br>
               <p>Present image:</p>
               <br>
               <input type="hidden" name="old_photo" value="{{ $post->image }}">
         
          <img src="{{ URL::to($post->image) }}" style="height:100px; weight:100px;" alt="">
            </div>
          </div>
         
          <div class="control-group">
            <div class="form-group ">
              <label>Post Details:</label>
              <textarea rows="5" class="form-control" name="details" required >
                  {{ $post->details }}
              </textarea>
              
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