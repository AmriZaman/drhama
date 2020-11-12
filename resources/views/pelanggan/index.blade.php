@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Data Wisatawan</h3>
                  <!-- <p class="panel-subtitle">Catatan: Jika anda menghapus data wisatawan anda juga harus menghapus data akun di halaman akun</p>
                  <div class="right">
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                  </div> Tidak Jadi diimplementasikan -->
								</div>
              </div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NAMA DEPAN</th>
                        <th>NAMA BELAKANG</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <!-- <th>AKSI</th> Tidak diimplementasikan -->
											</tr>
										</thead>
										<tbody>
                      @foreach($data_wisatawan as $wisatawan)
                      <tr>
                        <td><a href="/wisatawan/{{$wisatawan->id}}/profile">{{$wisatawan->nama_depan}}</a></td>
                        <td><a href="/wisatawan/{{$wisatawan->id}}/profile">{{$wisatawan->nama_belakang}}</a></td>
                        <td>{{$wisatawan->jenis_kelamin}}</td>
                        <td>{{$wisatawan->alamat}}</td>
                        <!-- <td>
                          <a href="/wisatawan/{{$wisatawan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                          <a href="/wisatawan/{{$wisatawan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Delete</a>
                        </td> Tidak diimplementasikan -->
                      </tr>
                      @endforeach
										</tbody>
									</table>
								</div>
							</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Wisatawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/wisatawan/create" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Depan</label>
                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Belakang</label>
                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">No Hp</label>
                <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No hp">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div> Tidak diimplementasikan -->
@stop
