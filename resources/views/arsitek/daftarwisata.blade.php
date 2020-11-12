@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Masukkan Data Wisata</h3>
								</div>
								<div class="panel-body">
                  <form action="/postwisata" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                  <label class="form-group{{ $errors->has('nama_wisata') ? ' has-error' : '' }}"> <span> Nama Wisata </span> </label>
									<input type="text" class="form-control" placeholder="Nama Wisata" name="nama_wisata">
									<br>
                  <label class="form-group{{ $errors->has('alamat_wisata') ? ' has-error' : '' }}"> <span> Alamat Wisata </span> </label>
									<input type="text" class="form-control" placeholder="Alamat Wisata" name="alamat_wisata">
									<br>
                  <label class="form-group{{ $errors->has('jenis_wisata') ? ' has-error' : '' }}"> <span> Jenis Wisata </span> </label>
									<input type="text" class="form-control" placeholder="Jenis Wisata" name="jenis_wisata">
									<br>
                  <label class="form-group{{ $errors->has('jam_operasional') ? ' has-error' : '' }}"> <span> Jam Operasional </span> </label>
									<input type="text" class="form-control" placeholder="Jam Operasional Wisata" name="jam_operasional">
									<br>
                  <label class="form-group{{ $errors->has('deskripsi_wisata') ? ' has-error' : '' }}"> <span> Deskripsi Wisata </span> </label>
									<textarea class="form-control" placeholder="Deskripsi Wisata" rows="4" name="deskripsi_wisata"></textarea>
									<br>
                  <label class="form-group{{ $errors->has('surat_desa') ? ' has-error' : '' }}"> <span> Scan Surat Keterangan Desa </span> </label>
									<input type="file" class="form-control" name="surat_desa">
									<br>
                  <label class="form-group{{ $errors->has('foto_wisata') ? ' has-error' : '' }}"> <span> Foto Daerah Wisata </span> </label>
									<input type="file" class="form-control" name="foto_wisata">
									<br>
                  <button type="submit" class="btn btn-primary" >Ajukan</a>
                </form>
								</div>
							</div>
            </div>
          </div>
        </div>
@stop
