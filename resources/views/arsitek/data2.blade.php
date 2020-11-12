@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Informasi Wisata</h3>
					<div class="row">
						<div class="col-md-8">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Nama Wisata : {{$wisata->nama_wisata}}</h3>
									<p class="panel-subtitle">Tanggal publish : {{Carbon\Carbon::parse($wisata->updated_at)->format('l, d F Y H:i')}}</p>
									@if($wisata->status == 'Aktif')
                  <p class="panel-subtitle">Status Informasi Wisata : {{$wisata->status}}</p>
									@elseif($wisata->status == 'Tidak Aktif')
									<p class="panel-subtitle">Status Informasi Wisata : {{$wisata->status}} (Menunggu verifikasi admin)</p>
									@endif
								</div>
								<div class="panel-body">
									<h4 class="panel-subtitle">Jenis Wisata : {{$wisata->jenis_wisata}}</h4>
                  <h5>Alamat Wisata :</h5>
									<p>{{$wisata->alamat_wisata}}</p>
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
										<h3>{{$wisata->User->Pengelola->nama_depan}} {{$wisata->User->Pengelola->nama_belakang}}</h3>
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
                  <p>{{$wisata->deskripsi_wisata}}</p>
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
									<img  style="display:block;margin:auto" src="{{$wisata->getSurat()}}" alt="">
									</div>
								</div>
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
                  <img src="{{$wisata->getfoto()}}" width="1000px">
                </div>
              </div>
              <!-- END PANEL DEFAULT -->
            </div>
          </div>
						</div>
					</div>
				</div>

@stop
