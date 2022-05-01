<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Add</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Back/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Back/')}}/dist/css/adminlte.min.css">
   <!-- jsGrid -->
   <link rel="stylesheet" href="{{asset('Back/')}}/plugins/jsgrid/jsgrid.min.css">
   <link rel="stylesheet" href="{{asset('Back/')}}/jsgrid/jsgrid-theme.min.css">
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

   @toastr_css
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('Back/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PROTAKİP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="nav-link" data-toggle="dropdown">{{Auth::user()->name ?? 'Lütfen Giriş Yapın' }}</a>
          
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Anasayfa
              
              </p>
            </a>
          
          </li>
          @guest('admin')
          <li class="nav-item">
              <a href="{{ route('admin.login') }}" class="nav-link">Login</a>
          </li>
          @else
          @can('role',['ogrenci'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Projelerim
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('projeler.show',Auth::User()->id)}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Önerdiğim Projeler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('projeler.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proje Konusu Öner</p>
                </a>
         
              </li>
              <li class="nav-item">
                <a href="{{ route('tezbekleyen.show',Auth::user()->id) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projelerim</p>
                </a>
              </li>
             
            </ul>
            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('ogrencibilgiler.edit',Auth::user()->id) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bilgilerimi Güncelle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ogrencibilgiler.show',Auth::user()->id) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bilgilerimi Görüntüle</p>
                </a>
              </li>
            </ul>
          </li>
           @endcan
          @can('role',['ogretmen'])
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Projeler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ogretmenspanel.show',Auth::user()->ogretmenid) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Önerilen Projeler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ogrenciprojeler.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Biten Projeler</p>
                </a>
              </li>
           @endcan
              @can('role',['admin'])
         
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Kullanıcılar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('kullanicilar.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kullanıcıları Gör</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('kullanicilar.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kullanıcı ekle</p>
                    </a>
                    </li>
                  
                 @endcan

                 
             
           
            </ul>
            @can('role',['admin','ogrenci','ogretmen'])
            <li class="nav-item">
              <a href="{{ route('admin.logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                
                <p>
                  Çıkış Yap
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a><form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                @csrf
            </form>
            </li>
            @endcan
            @endguest
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div>
    @yield('contentt')
    </div>
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2014-2021</strong> All rights reserved.
    @jquery
    @toastr_js
    @toastr_render
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('Back/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Back/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('Back/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- DataTables  & Plugins -->
<script src="{{asset('Back/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('Back/')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('Back/')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('Back/')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('Back/')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#icerik').summernote();
    $('#olanak').summernote();
  });</script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('.statu').change(function() {
     id=$(this)[0].getAttribute('konuid');
     statu=$(this).prop('checked');
     $.get("{{route('switch')}}", {id:id,statu:statu}, function(data, status){
    console.log(data);
  });
    })
  })
</script>

<script>
  $(function() {
    $('.staturapor').change(function() {
     id=$(this)[0].getAttribute('raporno');
     staturapor=$(this).prop('checked');
     $.get("{{route('switchrapor')}}", {id:id,staturapor:staturapor}, function(data, status){
    console.log(data);
  });
    })
  })
</script>
</body>
</html>
