@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ubah Status Wisata</h3>
								</div>
								<div class="panel-body">
                  <form action="/wisata/{{$wisata->id}}/update" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                          <option value="Aktif" @if($wisata->status == 'Aktif') selected @endif>Aktif</option>
                          <option value="Tidak Aktif" @if($wisata->status == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
								</div>
							</div>
            </div>
          </div>
        </div>
@stop
