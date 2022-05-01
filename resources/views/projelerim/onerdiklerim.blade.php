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
                <table id="example1" class="table table-bordered table-striped">
                  <h3>Bekleyen</h3>
                  <thead>
                  <tr>
                    <th>Konu</th>
                   
                    <th>Aktif-pasif</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($konular as $konu)
                 <?php          if($konu->ogrno==Auth::User()->ogrno && $konu->status==0 )
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
                     
                       {!!$konu->status==0 ? "<span class='text-danger'  style='font-weight:bold'>Pasif</span>" : "<span class='text-success'>Aktif</span>"!!}
                      
                      

                    </td>
                  
                   
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div><br><br>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <h3>Kabul Edilen</h3>
                  <thead>
                  <tr>
                    <th>Konu</th>
                   
                    <th>Aktif-pasif</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($konular as $konu)
                 <?php          if($konu->ogrno==Auth::User()->ogrno && $konu->status==1 )
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
                     
                       {!!$konu->status==0 ? "<span class='text-danger'  style='font-weight:bold'>Pasif</span>" : "<span class='text-success'  style='font-weight:bold'>Aktif</span>"!!}
                      
                      

                    </td>
                    <td>
                       
                       <?php  $a=0; foreach($raporlar as $rapor) 
                       {
                         $a++;
                       }
                       
                       ?>
                       <?php  $i=0; foreach($raporlar as $rapor)
                       {
                         if($rapor->onerino==$konu->id)
                         {
                           if($rapor->yuklendistatus=="1")
                           { ?>
                            <a href="" class="btn btn-sm btn-primary"><i class="fa fa-load"></i>  Rapor Yüklendi</a> 
<?php break;
                           }
                           else if($rapor->yuklendistatus=="0")
                           {?>
                            <a href="{{route('projeraporload.show',$konu->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-load"></i>  Rapor Yükle</a>
<?php break;
                           }
                          
                         }
                         else{ $i++;
                         
                           }
                       }
                       if($i==$a)
                       { ?>
                       <a href="{{route('projeraporload.show',$konu->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-load"></i>  Rapor Yükle</a>
                    <?php }
                       ?> 

                    </td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div><br><br>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <h3>Reddedilen</h3>
                  <thead>
                  <tr>
                    <th>Konu</th>
                   
                    <th>Aktif-pasif</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($konular as $konu)
                 <?php          if($konu->ogrno==Auth::User()->ogrno && $konu->status==2 )
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
                     
                       {!!$konu->status==2 ? "<span class='text-danger' style='font-weight:bold'>RED</span>" : "<span class='text-danger'>RED</span>"!!}
                      
                      

                    </td>
                    <td>
                       <a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>  Görüntüle</a>
                       <a href="{{route('ogrenciprojeler.edit',$konu->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i>  Düzenle</a>


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