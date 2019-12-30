@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($post as $row)
            
        
        <div class="post-preview">
          <a href="{{ URL::to('single-post/'. $row->id) }}">
            
            <h3 class="post-image">
              <img src="{{ $row->image }}" style="height:300px;" alt="">
            </h3>
            <h2 class="post-title" >
              {{ $row->title }}
            </h2>
          </a>
          <p class="post-meta">Category by {{ $row->name }}
            <br>
            <a href="#">Slug</a>
            {{ $row->slug }}
           </p>
           <br>
           <p>{{ $row->details }}</p>
        </div>
        @endforeach

        
        <hr>
       
     
       
        <!-- Pager -->
        <div class="clearfix">
          {{ $post->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection