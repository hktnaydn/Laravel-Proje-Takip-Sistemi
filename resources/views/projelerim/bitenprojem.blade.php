@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <section class="content">
      <div class="container"> 
        <div class="row justify-content-center">
         
          <h2 class="display-4 text-center"> {{$konu->projename ?? 'None' }} </h2>
          <br>
          <label> <h2 class="display-5">Proje İçeriği = </h2><p><em>  {{$konu->icerik ?? 'None' }} </em></p> </label>
          <br>
          <label> <h2 class="display-5">Proje Olanakları = </h2> <p><em> {{$konu->olanak ?? 'None' }} </em></p></label>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
<br><br>
<h2 class="display-4 text-center"> RAPORLAR </h2>
    <section class="content ">
        <div class="container">
          <div class="row justify-content-center">
            <?php

              
            foreach($raporlar as $rapor) {
                      if($rapor->onerino==$konu->id)
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
        </div><!-- /.container-fluid -->
      </section>
      <h2 class="display-4 text-center"> TEZ RAPORU </h2>
      <section class="content">
        <div class="container">
          <div class="row justify-content-center">
    
                  <iframe src="{{asset($konu->tezraporu)}}" frameborder="1" width="750px" height="750px"></iframe>
                 
          </div>
        </div><!-- /.container-fluid -->
      </section>
  </div>
  <!-- /.content-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  @endsection
