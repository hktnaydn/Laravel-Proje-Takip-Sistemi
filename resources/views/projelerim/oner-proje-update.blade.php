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
              <form action="{{route('ogrenciprojeler.update',$onerilenkonular->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                            <div class="form-group">
                                <label>Proje Konusu</label><br>
                                <input type="text" id="inputName" name="name" nameclass="form-control" value="{{$onerilenkonular->projename}}" required>
                            </div>
                            <div class="form-group">
                                <label>Proje İçeriği</label>
                                <textarea name="icerik" id="icerik" class="form-control" rows="4" >{{$onerilenkonular->icerik}}</textarea>
                                
                            </div>
                            <div class="form-group">
                              <label>Proje Materyal, yöntem ve araştırma olanakları</label>
                              <textarea name="olanak" id="olanak" class="form-control" rows="4">{{$onerilenkonular->olanak}}</textarea>
                          </div>
                         
                            <input type="hidden" value="{{Auth::User()->ogretmenid}}" name="ogretmenid">
                           
                            <input type="hidden" value="{{Auth::User()->ogrno}}" name="ogrno">
                        
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Güncelle </button>
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
