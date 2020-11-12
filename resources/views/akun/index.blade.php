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
									<h3 class="panel-title">Data Akun Pengguna</h3>
                  <p class="panel-subtitle">Catatan: Hati hati jangan sampai anda menghapus akun admin</p>
								</div>
              </div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NAMA DEPAN</th>
                        <th>ROLE</th>
                        <th>EMAIL</th>
                        <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                      @foreach($data_akun as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <a href="/akun/{{$user->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Delete</a>
                        </td>
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
@stop
