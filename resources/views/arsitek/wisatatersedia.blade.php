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
									<h3 class="panel-title">Data Wisata</h3>
								</div>
              </div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NAMA WISATA</th>
                        <th>NAMA PEMILIK WISATA</th>
                        <th>TANGGAL PUBLISH</th>
                        <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                      @foreach($data_wisata as $wisata)
                      @if($wisata->status == 'Aktif')
                      <tr>
                        <td>{{$wisata->nama_wisata}}</td>
                        <td>{{$wisata->User->Pengelola->nama_depan}} {{$wisata->User->Pengelola->nama_belakang}}</td>
                        <td>{{$wisata->updated_at}}</td>
                        <td>
                          <a href="/wisata/{{$wisata->id}}/data2" class="btn btn-primary btn-sm">LIHAT</a>
                        </td>
                      @elseif($wisata->status == 'Tidak Aktif')
                      @endif
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
@stop
