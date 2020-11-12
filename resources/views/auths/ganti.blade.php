@extends('layouts.master')

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
          <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Ganti Password</h3>
						</div>
            <div class="panel-body">
              @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.update') }}">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" class="col-md-4 control-label">Password Saat ini</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                                <span class="help-block">{{ $errors->first('current_password') }}</span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password Baru</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">Konfirmasi Password Baru</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">
                                    Ganti Password
                                </button>
																<a href="/dashboard" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
