@extends('layouts.app')

@section('title')
	Ekspor Absensi
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<a href="/absensi" class="btn btn-outline-secondary btn-sm">Daftar Absensi</a>
</div>
@endsection

@section('content')
@if (session('status'))
	<div class="alert alert-success alert-dismissible fade show">{{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@elseif (session('updated'))
	<div class="alert alert-success alert-dismissible fade show">{{ session('updated') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>		
	</div>
@elseif (session('destroy'))
	<div class="alert alert-success alert-dismissible fade show">{{ session('destroy') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>		
	</div>
@endif
<div class="card">
	<div class="card-body">
		<form action="/absensi/ekspor-data" method="post">
			@csrf
			<div class="row mb-2 form-group">
				<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="kategori" name="kategori" value="{{old('kategori')}}">
						<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
						<option>Latihan</option>
						<option>Pelatkab</option>
						<option>Event</option>
						<option>Kejuaraan</option>
					</select>
					@error('kategori')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tanggal_awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control shadow-sm" id="tanggal_awal" name="tanggal_awal" value="{{old('tanggal_awal')}}">
					@error('tanggal_awal')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tanggal_akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
				<div class="col-sm-10">
					<input type="date" class="form-control shadow-sm" id="tanggal_akhir" name="tanggal_akhir" value="{{old('tanggal_akhir')}}">
					@error('tanggal_akhir')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Ekspor</button>
		</form>
	</div>
</div>
@endsection