@extends('layouts.master')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ubah Data</h3>
								</div>
								<div class="panel-body">
                  <form action="/akun/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="exampleInputEmail1">nama</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$user->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Photo Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-warning">Update</button>
                      <a href="/profiladmin" class="btn btn-primary">Kembali</a>
                      </form>
								</div>
							</div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
