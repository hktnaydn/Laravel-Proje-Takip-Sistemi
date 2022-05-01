@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rapor ekle</h1>
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
              <h3 class="card-title">Proje Raporu</h3>

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
              <form action="{{route('projeraporload.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                          
                <div class="form-group">
                    <label >RAPOR</label>
                    <input type="file" id="inputName" name="rapor" multiple class="form-control" required>
                 
                    <input type="file" id="inputName" name="raporiki" multiple class="form-control" required>
                    <input type="file" id="inputName" name="raporuc" multiple class="form-control" required>
                </div>
                            <input type="hidden" value="{{Auth::User()->ogretmenid}}" name="ogretmenid">
                           
                            <input type="hidden" value="{{Auth::User()->ogrno}}" name="ogrno">
                            <input type="hidden" value="{{$konular->id}}" name="onerino">
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Yükle</button>
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
