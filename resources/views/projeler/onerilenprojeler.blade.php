@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Öneriler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Öneriler</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped"> <h3>Bekleyen</h3>
                  <thead>
                  <tr>
                    <th>Konu</th>
                    <th>Öğrenci Numarası</th>
                    <th>Aktif-pasif</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                        
                   
                 @foreach($konular as $konu)
                 <?php          if($konu->ogretmenid==Auth::User()->ogretmenid && $konu->status==0)
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
                     
                      
                        {{$konu->ogrno; }}  
                       
  
                      </td>
                    <td>
                     
                   <!--  {!!$konu->status==0 ? "<span class='text-danger'>Pasif</span>" : "<span class='text-success'>Aktif</span>"!!} -->
                       <input class="statu" konuid="{{$konu->id}}" type="checkbox" @if($konu->status==1) checked @endif  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="AKTİF" data-off="PASİF">

                      

                    </td>
                    <td>
                       <a href="{{route('goruntuleoneri.show',$konu->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>  Görüntüle</a>
                       <a href="{{route('ogretmenspanel.edit',$konu->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>  Reddet</a>

                    </td>
                   
                  </tr>
                  @endforeach
             
                  </tbody>
                 
                </table>
              </div>
             <div class="card-body">
                <table id="example1" class="table table-bordered table-striped"> <h3>Kabul Edilen</h3>
                  <thead>
                  <tr>
                    <th>Konu</th>
                    <th>Öğrenci Numarası</th>
                    <th>Aktif-pasif</th>
                    <th>Rapor</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                        
                   
                 @foreach($konular as $konu)
                 <?php          if($konu->ogretmenid==Auth::User()->ogretmenid && $konu->status==1 && $konu->tezraporu==NULL)
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
                     
                      
                        {{$konu->ogrno; }}  
                       
  
                      </td>
                    <td>
                     
                       {!!$konu->status==0 ? "<span class='text-danger'>Pasif</span>" : "<span class='text-success style='font-weight:bold'>Aktif</span>"!!}
                      
                      

                    </td>
                    <td>
                       
                      <a href="{{route('projeraporgoruntuleogretmen.show',$konu->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>  Raporu Gör</a>
                     


                    </td>
                   
                  </tr>
                  @endforeach
             
                  </tbody>
                 
                </table> 
              </div>
           
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