@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biten Projeler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Biten Projeler</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <h3>Biten Projeler</h3>
                <thead>
                <tr>
                  <th>Konu</th>
                 
                  <th>..</th>
                  
                 
                </tr>
                </thead>
                <tbody>
               @foreach($konular as $konu)
               <?php        if($konu->ogretmenid==Auth::User()->ogretmenid && $konu->status==1 && $konu->tezstatus==1 && $konu->tezraporu!=NULL)
                    {
                      
                    }
                    else{
                      continue;
                    }
                  
                    ?>
                <tr>
                  <td>
                   
                    
                    {{$konu->projename; }}  
                   

                  </td>
             
                  <td>
                    <a href="{{route('bitenprojem.show',$konu->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle</a>

                  </td>
                 
                </tr>
                @endforeach
                </tbody>
               
              </table>
            </div><br><br>
            <!-- /.card-body -->
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <h3>Bekleyen Tezler</h3>
              <thead>
              <tr>
                <th>Konu</th>
               
                <th>..</th>
                
               
              </tr>
              </thead>
              <tbody>
             @foreach($konular as $konu)
             <?php        if($konu->ogretmenid==Auth::User()->ogretmenid && $konu->status==1 && $konu->tezstatus==1 && $konu->tezraporu!=NULL)
                  {
                    
                  }
                  else{
                    continue;
                  }
                
                  ?>
              <tr>
                <td>
                 
                  
                  {{$konu->projename; }}  
                 

                </td>
           
                <td>
                  <a href="{{route('bitenprojem.show',$konu->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle</a>

                </td>
               
              </tr>
              @endforeach
              </tbody>
             
            </table>
          </div><br><br>
          <!-- /.card-body -->
        </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection