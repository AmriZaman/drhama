@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Data Wisata Anda</h3>
					<div class="row">
						<div class="col-md-8">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Nama Wisata : {{auth()->user()->wisata->nama_wisata}}</h3>
									<p class="panel-subtitle">Tanggal publish : {{Carbon\Carbon::parse(auth()->user()->wisata->updated_at)->format('l, d F Y H:i')}}</p>
									@if(auth()->user()->wisata->status == 'Aktif')
                  <p class="panel-subtitle">Status Informasi Wisata : {{auth()->user()->wisata->status}}</p>
									@elseif(auth()->user()->wisata->status == 'Tidak Aktif')
									<p class="panel-subtitle">Status Informasi Wisata : {{auth()->user()->wisata->status}} (Menunggu verifikasi admin)</p>
									@endif
								</div>
								<div class="panel-body">
									<h4 class="panel-subtitle">Jenis Wisata : {{auth()->user()->wisata->jenis_wisata}}</h4>
                  <h5>Alamat :</h5>
									<p>{{auth()->user()->wisata->alamat_wisata}}</p>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						<div class="col-md-4">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Pemilik Wisata</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-thumbs-o-up fa-5x"></i>
										<h3>{{auth()->user()->Pengelola->nama_depan}} {{auth()->user()->pengelola->nama_belakang}}</h3>
									</div>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
						</div>
					</div>
          <div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Deskripsi Wisata</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body" style="display: block;">
									<p>{{auth()->user()->wisata->deskripsi_wisata}}</p>
								</div>
							</div>
							<!-- PANEL DEFAULT -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Surat Keterangan Desa</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<!-- <div style="width:100%"> -->
								<div class="panel-body">
									<div class="text-center">
									<img  style="display:block;margin:auto" src="{{auth()->user()->wisata->getSurat()}}" alt="">
									</div>
								</div>
								<!-- </div> -->
								<!-- <div class="panel-body container center m-auto row"  style="margin:auto; width:100%">
									<img class="col-md-6" src="{{auth()->user()->wisata->getSurat()}}" alt="">
								</div> -->
							</div>
							<!-- END PANEL DEFAULT -->
						</div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- PANEL DEFAULT -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Foto Tempat Wisata</h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
                  </div>
                </div>
                <div class="panel-body" style="display: block;">
                  <img src="{{auth()->user()->wisata->getfoto()}}" width="1000px">
                </div>
              </div>
              <!-- END PANEL DEFAULT -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Wisata</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body" style="display: block;">
									<a href="/wisata/{{auth()->user()->wisata->id}}/edit" class="btn btn-primary btn-sm">UBAH</a>
								</div>
							</div>
							<!-- END PANEL DEFAULT -->
            </div>
          </div>
						</div>
					</div>
				</div>


			<!-- END MAIN CONTENT -->
		<!-- </div>
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Data Wisata Anda</h3>
								</div>
                </div>
								<div class="panel-body">
                  <ul class="list-unstyled list-justify">
                    <li>{{auth()->user()->Pengelola->nama_depan}} {{auth()->user()->pengelola->nama_belakang}}</li>
                    <li>{{auth()->user()->wisata->nama_wisata}}</li>
                  </ul>
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>Pengelola</th>
                        <th>Nama wisata</th>
                        <th>Alamat Wisata</th>
                        <th>Jenis Wisata</th>
                        <th>Status Wisata</th>
                        <th>Detail Wisata</th>
											</tr>
										</thead>
										<tbody>
                      <tr>
                        <td></a></td>
                        <td></a></td>
                        <td><a href="#" class="btn btn-primary btn-sm">LihatKTP</a></td>
                      </tr>
										</tbody>
									</table>
								</div>
							</div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

@stop
