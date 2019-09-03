<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("judul") | dIV Forums</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-item.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/admin')}}">dIV Forums</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/admin')}}">Thread</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/thread-saya')}}">Thread Saya</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/kategori')}}">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/inbox')}}">Inbox</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/member')}}">Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/profil')}}">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/logout')}}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          Selamat Datang, {{Auth::user()->nama}}.<br>
          Waktu Server: {{date("d-m-Y")}}
          <h1 class="my-4">@yield("judul")</h1>
          <div class="list-group">
            <?php
              $kat = Kategori::list_kategori();
            ?>
            @foreach($kat as $k)
            <a href="{{url('/admin/thread/kategori/'.$k->id_kategori)}}" class="list-group-item">{{$k->nama_kategori}}</a>
            @endforeach
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
           <form class="card card-sm" method="get" action="{{url('/admin')}}">
                                <div class=" row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="text" placeholder="Cari Thread" name="cari">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Cari</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form> <br>
          @yield('isi')
        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->
    <br>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; dIV Forums 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
