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
                                <label>Öğrenci No</label><br>
                                <input type="text" id="inputName" name="ogrno" nameclass="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Fakülte</label>
                                <select id="slct1" class="form-control custom-select" name="fakultead" onchange="populate(this.id,'slct2')">
                                  <option value=""></option>
                                  <option value="Eğitim Fakültesi">Eğitim Fakültesi</option>
                                  <option value="Fen Edebiyat Fakültesi">Fen Edebiyat Fakültesi</option>
                                  <option value="Mühendislik Fakültesi">Mühendislik Fakültesi</option>
                                  <option value="Spor Bilimleri Fakültesi">Spor Bilimleri Fakültesi</option>
                                  <option value="İktisat Fakültesi">İktisadi Fakültesi</option>
                                  <option value="Güzel Sanatlar Fakültesi">Güzel Sanatlar Fakültesi</option>
                                </select>
                              
                            </div>
                            <div class="form-group">
                              <label for="inputStatus">Bölüm</label>
                              <select id="slct2" name="bolumad" class="form-control custom-select" tabindex="11"> 
                              </select>
                            
                          </div>
                          <div class="form-group">
                            <label for="inputStatus">Sınıf</label>
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
                              <label >Fotoğraf</label>
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
        if(s1.value == "Eğitim Fakültesi"){
            var optionArray = ["|","Fen Bilgisi Öğretmenliği|Fen Bilgisi Öğretmenliği","İlköğretim Matematik Öğretmenliği|İlköğretim Matematik Öğretmenliği","İngilizce Öğretmenliği|İngilizce Öğretmenliği","Okul Öncesi Öğretmenliği|Okul Öncesi Öğretmenliği","Sınıf Öğretmenliği|Sınıf Öğretmenliği"];
        } else if(s1.value == "Fen Edebiyat Fakültesi"){
            var optionArray = ["|","Arkeoloji|Arkeoloji","Biyoloji|Biyoloji","Felsefe|Felsefe","Fizik|Fizik","Kimya|Kimya"];
        } else if(s1.value == "Mühendislik Fakültesi"){
            var optionArray = ["|","Elektrik Mühendisliği|Elektrik Mühendisliği","Endüstri Mühendisliği|Endüstri Mühendisliği","İnşaat Mühendisliği|İnşaat Mühendisliği","Makine Mühendisliği|Makine Mühendisliği","Mekatronik Mühendisliği|Mekatronik Mühendisliği","Kimya Mühendisliği|Kimya Mühendisliği"];
        }   else if(s1.value == "Spor Bilimleri Fakültesi"){
            var optionArray = ["|","Antrenörlük Eğitimi|Antrenörlük Eğitimi","Spor Yöneticiliği|Spor Yöneticiliği","Rekreasyon|Rekreasyon"];
        }   else if(s1.value == "İktisat Fakültesi"){
            var optionArray = ["|","İşletme|İşletme","İktisat|İktisat","Siyaset Bilimi Ve Kamu Yönetimi|Siyaset Bilimi Ve Kamu Yönetimi","Uluslararası İlişkiler|Uluslararası İlişkiler"];
        }
        else if(s1.value == "Güzel Sanatlar Fakültesi"){
            var optionArray = ["|","Fotoğraf|Fotoğraf","Grafik Tasarımı|Grafik Tasarımı","Heykel|Heykel","Oyunculuk|Oyunculuk"];
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
