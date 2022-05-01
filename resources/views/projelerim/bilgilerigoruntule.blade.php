@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kullanıcı Profili</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                    src="{{asset(Auth::User()->ppimage)}}"
                    alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::User()->name}}</h3>

                <p class="text-muted text-center">{{Auth::User()->email}}</p>


               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hakkında</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Eğitim</strong>

                <p class="text-muted">
                    {{Auth::User()->fakulte}} <label > </label>
                    {{Auth::User()->bolum}} <span > Bölümü</span>
                    {{Auth::User()->sinif}} <span > . Sınıf</span>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> İletişim telefon numarası</strong>

                <p class="text-muted"> {{Auth::User()->cepno}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Diğer Bilgiler</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Öğrenci numarası {{Auth::User()->ogrno}}</span><br>
                  <span class="tag tag-success">Katılma Tarihi {{Auth::User()->created_at}}</span> <br>
                  <span class="tag tag-info">Sistem Numarası {{Auth::User()->id}}</span>
        
                </p>

                <hr>

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  @endsection
