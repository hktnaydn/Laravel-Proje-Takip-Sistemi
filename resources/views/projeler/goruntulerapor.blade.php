@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Proje Raporu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Proje Raporu</li>
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
              <div>
                <input class="staturapor" raporno="{{$konular->id}}" type="checkbox" @if($konular->tezstatus==1) checked @endif  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="AKTİF" data-off="PASİF">
      
               </div>
              <?php

              
    foreach($raporlar as $rapor) {
              if($rapor->onerino==$konular->id)
         { ?> 
         

          <iframe src="{{asset($rapor->projerapor)}}" frameborder="1" width="750px" height="750px"></iframe>
         
         
         <?php 
         }
         else{
           continue;
         }

        }
         ?>
    
   

                </div>
       
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
