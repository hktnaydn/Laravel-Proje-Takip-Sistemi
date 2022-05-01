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
              <li class="breadcrumb-item active">Proje Öner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php if(Auth::User()->ogrno==null) {echo "Lütfen bilgilerinizi tamamlayınız";  toastr()->error ('Başarısız', 'Lütfen bilgilerinizi tamamlayınız');} else { ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Proje Öner</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
              </div>
              @endif
              <form action="{{route('projeler.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                <label>Proje Konusu</label><br>
                                <input type="text" id="inputName" name="name" nameclass="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Proje İçeriği</label>
                                <textarea name="icerik"  class="form-control" rows="4"></textarea>
                                
                            </div>
                            <div class="form-group">
                              <label>Proje Materyal, yöntem ve araştırma olanakları</label>
                              <textarea name="olanak"  class="form-control" rows="4"></textarea>
                          </div>
                         
                            <input type="hidden" value="{{Auth::User()->ogretmenid}}" name="ogretmenid">
                           
                            <input type="hidden" value="{{Auth::User()->ogrno}}" name="ogrno">
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
    </section> <?php }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
