@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Scan KTP</h3>
							<p class="panel-subtitle">{{$pengelola->nama_depan}} {{$pengelola->nama_belakang}}</p>
						</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <img src="{{$pengelola->getKtp()}}" alt="Avatar" width="1000px">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
