@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br><br><br>
    <?php 
    foreach($admins as $admin){
      if($admin->ogrno==$konular->ogrno)
      {
        $ppimage=$admin->ppimage;
        $name=$admin->name;
        $email=$admin->email;
        $ogrno=$admin->ogrno;
        $fakulte=$admin->fakulte;
        $bolum=$admin->bolum;
        $sinif=$admin->sinif;
        break;
      
      
      }




    }
    
    
    
    ?>
    <section class="content">
      <div class="container">
        <div class="row">
          <h2 >Proje Konusu =  {{$konular->projename ?? 'None' }}</h2>
          <br>
          <label> <h2>Proje İçeriği = </h2> {{$konular->icerik ?? 'None' }}</label>
          <br>
          <label> <h2>Proje Olanakları = </h2> {{$konular->olanak ?? 'None' }}</label>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <br><br>  
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Öğrencinin Profili</h1>
          </div>
          <div class="col-sm-6">
          
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
                    src="{{asset($ppimage)}}"
                    alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$name}}</h3>

                <p class="text-muted text-center">{{$email}}</p>


               
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
                  {{$fakulte}} <label > </label>
                  {{$bolum }} <span > Bölümü</span>
                  {{$sinif}} <span > . Sınıf</span>
                </p>

                <hr>

              

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Diğer Bilgiler</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Öğrenci numarası {{$ogrno}}</span><br>
        
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
