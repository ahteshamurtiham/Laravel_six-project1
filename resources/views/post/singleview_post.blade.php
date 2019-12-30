@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 mx-auto m-auto">
      
         <a href="{{ route('all-post') }}" class="btn btn-dark">All Post</a>
        
       <hr>

        <table class="table table-light">
            <tr>
                <td style="color:brown">Category:</td>
                <td>{{ $post->name }}</td>
            </tr>
            <tr>
                <td style="color:brown">Title:</td>
                    <td>{{ $post->title }}</td>   
                </tr>
                <tr>
                  <td style="color:brown">Details</td>
                        <td>{{ $post->details }}</td>
                </tr>
                
        </table>
        <p style="color:brown">Image:</p>
        <img src="{{ URL::to($post->image )}}" style="height:200px; weight:200px;" alt="">
      
      </div>
    </div>
  </div>

@endsection