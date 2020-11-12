@extends('layouts.regis')

@section('content')
<main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Bergabung Bersama Kami</h1>
      <h2>Kelola Daerahmu Bersama Kami</h2>
    </div>
  </section><!-- End Hero Section -->

    <!-- ======= Contact Section ======= -->
    <section id="register">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">PENDAFTARAN</h3>
          <p class="section-description">Daftarkan Dirimu Menjadi Pengelola Wisata di Daerahmu melalui dewisata</p>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-5 col-md-8">
            <div class="form">
               <form action="/postregister" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
              <form action="" method="post" class="php-email-form" enctype="multipart/form-data">
                <div class="form-group {{$errors->has('nik') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">NIK</label>
                  <input name="nik" type="text" class="form-control" id="name"
                  placeholder="NIK" value="{{old('nik')}}">
                  @if($errors->has('nik'))
                    <span class="help-block">{{$errors->first('nik')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Nama Depan</label>
                  <input name="nama_depan" type="text" class="form-control" id="name"
                  placeholder="Nama Depan" value="{{old('nama_depan')}}">
                  @if($errors->has('nama_depan'))
                    <span class="help-block">{{$errors->first('nama_depan')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('nama_belakang') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Nama Belakang</label>
                  <input name="nama_belakang" type="text" class="form-control" id="name"
                  placeholder="Nama Depan" value="{{old('nama_belakang')}}">
                  @if($errors->has('nama_belakang'))
                    <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Email</label>
                  <input name="email" type="email" class="form-control" id="email"
                  placeholder="Email" value="{{old('email')}}">
                  @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" id="name" >
                    <option value="Pria"{{(old('jenis_kelamin') == 'Pria') ? ' selected' : ''}}>Pria</option>
                    <option value="Wanita"{{(old('jenis_kelamin') == 'Wanita') ? ' selected' : ''}}>Wanita</option>
                  </select>
                  @if($errors->has('jenis_kelamin'))
                    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tanggal Lahir</label>
                  <input name="tanggal_lahir" type="date" class="form-control" id="name"
                  placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                </div>
                <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Alamat</label>
                  <textarea name="alamat" class="form-control" id="name" rows="3" >{{old('alamat')}}</textarea>
                  @if($errors->has('alamat'))
                    <span class="help-block">{{$errors->first('alamat')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('no_hp') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">No Hp</label>
                  <input name="no_hp" type="text" class="form-control" id="name"
                  placeholder="No hp" value="{{old('no_hp')}}">
                  @if($errors->has('no_hp'))
                    <span class="help-block">{{$errors->first('no_hp')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Password</label>
                  <input name="password" type="password" class="form-control" id="name"
                  placeholder="password" value="{{old('password')}}">
                  @if($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('confirmation') ? 'has-error' : ''}}">
                  <label for="exampleFormControlSelect1">Password</label>
                  <input name="confirmation" type="password" class="form-control" id="name"
                  placeholder="konfirmasi password">
                  @if($errors->has('confirmation'))
                    <span class="help-block">{{$errors->first('confirmation')}}</span>
                  @endif
                </div>
                <div class="form-group {{$errors->has('ktp') ? 'has-error' : ''}}">
                  <label for="exampleFormControlTextarea1">Scan Photo KTP</label>
                  <input type="file" name="ktp" class="form-control">
                  @if($errors->has('ktp'))
                    <span class="help-block">{{$errors->first('ktp')}}</span>
                  @endif
                </div>
                <div class="text-center"><button type="submit">Submit</button></div>
                  </form>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
@stop
