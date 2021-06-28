@extends('layouts.app')

@section('title')
	Menambah Atlet Baru
@endsection

@section('menu')
	<a href="/atlet" class="btn btn-outline-secondary btn-sm">Data Atlet</a>
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
	<form action="/atlet" method="post">
		@csrf
		<div class="row mb-2 form-group">
			<label for="nama" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="nama" name="nama" value="{{old('nama')}}">
				@error('nama')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="email" name="email" value="{{old('email')}}">
				@error('email')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}">
				@error('tempat_lahir')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-10">
				<input type="date" class="form-control shadow-sm" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
				@error('tanggal_lahir')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="provinsi" name="provinsi" value="{{old('provinsi')}}">
				@error('provinsi')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="kota" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="kota" name="kota" value="{{old('kota')}}">
				@error('kota')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="kecamatan" name="kecamatan" value="{{old('kecamatan')}}">
				@error('kecamatan')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="kelurahan" name="kelurahan" value="{{old('kelurahan')}}">
				@error('kelurahan')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="pedukuhan" class="col-sm-2 col-form-label">Pedukuhan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="pedukuhan" name="pedukuhan" value="{{old('pedukuhan')}}">
				@error('pedukuhan')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="rt" class="col-sm-2 col-form-label">RT</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="rt" name="rt" value="{{old('rt')}}">
				@error('rt')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="rw" class="col-sm-2 col-form-label">RW</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="rw" name="rw" value="{{old('rw')}}">
				@error('rw')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row mb-2 form-group">
			<label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
			<div class="col-sm-10">
				<input type="text" class="form-control shadow-sm" id="kode_pos" name="kode_pos" value="{{old('kode_pos')}}">
				@error('kode_pos')
					<div class="alert alert-danger mt-2">{{$message}}</div>
				@enderror
			</div>
		</div>
		<button type="submit" class="btn btn-primary mt-2 mb-4">Simpan</button>
	</form>
@endsection