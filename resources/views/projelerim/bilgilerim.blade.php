@extends('templatev2')
@section('contentt')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bilgilerim</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bilgilerim</li>
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
              <h3 class="card-title">Profil Bilgilerini Tamamla</h3>

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
             
              @foreach($admins as $admin)
              <?php 
                if($admin->id==Auth::user()->id)
                {
                  $admin->id==Auth::user()->id;
                  $name=$admin->name;
                  $email=$admin->email;
                  $password=$admin->password;
                  $role=$admin->role;
                  $ogretmenid=$admin->ogretmenid;
                  break;
                }
              ?>
              @endforeach
              <form action="{{route('ogrencibilgiler.update',$admin->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                            <div class="form-group">
                                <label>????renci No</label><br>
                                <input type="text" id="inputName" name="ogrno" nameclass="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Fak??lte</label>
                                <select id="slct1" class="form-control custom-select" name="fakultead" onchange="populate(this.id,'slct2')">
                                  <option value=""></option>
                                  <option value="E??itim Fak??ltesi">E??itim Fak??ltesi</option>
                                  <option value="Fen Edebiyat Fak??ltesi">Fen Edebiyat Fak??ltesi</option>
                                  <option value="M??hendislik Fak??ltesi">M??hendislik Fak??ltesi</option>
                                  <option value="Spor Bilimleri Fak??ltesi">Spor Bilimleri Fak??ltesi</option>
                                  <option value="??ktisat Fak??ltesi">??ktisadi Fak??ltesi</option>
                                  <option value="G??zel Sanatlar Fak??ltesi">G??zel Sanatlar Fak??ltesi</option>
                                </select>
                              
                            </div>
                            <div class="form-group">
                              <label for="inputStatus">B??l??m</label>
                              <select id="slct2" name="bolumad" class="form-control custom-select" tabindex="11"> 
                              </select>
                            
                          </div>
                          <div class="form-group">
                            <label for="inputStatus">S??n??f</label>
                            <select id="inputStatus" class="form-control custom-select" name="sinif">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            </select>
                          
                        </div>
                            <div class="form-group">
                                <label >Cep Telefonu</label>
                                <input type="text" id="inputName" name="telno" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label >Foto??raf</label>
                              <input type="file" id="inputName" name="foto" class="form-control" required>
                          </div>
          <!--               <input type="hidden" value="{{$admin->id}}" name="id">
                        <input type="hidden" value="{{$admin->name}}" name="name">
                          <input type="hidden" value="{{$admin->password}}" name="password">
                         <input type="hidden" value="{{$admin->role}}" name="role">
                          <input type="hidden" value="{{$admin->ogretmenid}}" name="ogretmenid"> -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
    function populate(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "E??itim Fak??ltesi"){
            var optionArray = ["|","Fen Bilgisi ????retmenli??i|Fen Bilgisi ????retmenli??i","??lk????retim Matematik ????retmenli??i|??lk????retim Matematik ????retmenli??i","??ngilizce ????retmenli??i|??ngilizce ????retmenli??i","Okul ??ncesi ????retmenli??i|Okul ??ncesi ????retmenli??i","S??n??f ????retmenli??i|S??n??f ????retmenli??i"];
        } else if(s1.value == "Fen Edebiyat Fak??ltesi"){
            var optionArray = ["|","Arkeoloji|Arkeoloji","Biyoloji|Biyoloji","Felsefe|Felsefe","Fizik|Fizik","Kimya|Kimya"];
        } else if(s1.value == "M??hendislik Fak??ltesi"){
            var optionArray = ["|","Elektrik M??hendisli??i|Elektrik M??hendisli??i","End??stri M??hendisli??i|End??stri M??hendisli??i","??n??aat M??hendisli??i|??n??aat M??hendisli??i","Makine M??hendisli??i|Makine M??hendisli??i","Mekatronik M??hendisli??i|Mekatronik M??hendisli??i","Kimya M??hendisli??i|Kimya M??hendisli??i"];
        }   else if(s1.value == "Spor Bilimleri Fak??ltesi"){
            var optionArray = ["|","Antren??rl??k E??itimi|Antren??rl??k E??itimi","Spor Y??neticili??i|Spor Y??neticili??i","Rekreasyon|Rekreasyon"];
        }   else if(s1.value == "??ktisat Fak??ltesi"){
            var optionArray = ["|","????letme|????letme","??ktisat|??ktisat","Siyaset Bilimi Ve Kamu Y??netimi|Siyaset Bilimi Ve Kamu Y??netimi","Uluslararas?? ??li??kiler|Uluslararas?? ??li??kiler"];
        }
        else if(s1.value == "G??zel Sanatlar Fak??ltesi"){
            var optionArray = ["|","Foto??raf|Foto??raf","Grafik Tasar??m??|Grafik Tasar??m??","Heykel|Heykel","Oyunculuk|Oyunculuk"];
        }
        for(var option in optionArray){
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
    }
   
    </script>
  @endsection
