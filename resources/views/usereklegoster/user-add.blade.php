@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kullanıcı ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kullanıcı Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Kullanıcı</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('kullanicilar.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                <label>Adı Soyadı</label><br>
                                <input type="text" id="inputName" name="name" nameclass="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" id="inputName" name="email" class="form-control" required>
                            </div>
                          
                            <div class="form-group">
                                <label >Şifre</label>
                                <input type="text" id="inputName" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label >Öğretmen</label>
                              <label >1-Ahmet Aydın 2-Mehmet Gül 3-Niyazi Aydın</label>
                              <select id="inputStatus" class="form-control custom-select" name="ogretid">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                </select>
                          </div>
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Ekle </button>
                            </div>
                           
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  @endsection
