<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> My First Laravel Blog Site</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('public/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('public/frontend/css/clean-blog.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">TBLOG</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('about-us') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('write-post') }}">Write Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1 style="color:palegoldenrod;">Laravel Blog Site</h1>
            <span class="subheading">A Modern Bloagsite For You</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  @yield('content')
  <!-- Main Content -->
  

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('public/frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('public/frontend/js/clean-blog.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  
  
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
  @if(Session::has('message'))
  var type="{{ Session::get('alert-type','info') }}"
  switch(type){
    case 'info':
    toastr.info("{{ Session::get('message') }}");
    break;
    case 'success':
    toastr.success("{{ Session::get('message') }}");
    break;
    case 'warning':
    toastr.warning("{{ Session::get('message') }}");
    break;
    case 'error':
    toastr.error("{{ Session::get('message') }}");
    break;
  }

  @endif
  </script>
  <script type="text/javascript">
    $('#myTable').DataTable();
 </script>

 <script>

   $('.delete').click(function(){
     var delete_id = $(this).attr("data-id");

    
     Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {

   Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

    setTimeout(
        function() 
        {
          window.location.href = "{{ url('delete-category') }}/" + delete_id;
        }, 10000);

        $('.swal2-confirm').click(function(){
            window.location.href = "{{ url('delete-category') }}/" + delete_id;
    })

  }
})

   });
   
 </script>
 <script>
    $(document).ready(function () {
    $("#ckbCheckAll").click(function () {
        $(".checkbox").prop('checked', $(this).prop('checked'));
    });
});
 </script>

@yield('footer_js')
</body>

</html>
