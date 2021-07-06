@extends('layouts.app')

@section('title')
	Create Team Match
@endsection
@section('menu')
	<a href="/team-match" class="btn btn-outline-secondary btn-sm">Kembali</a>
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
		<form action="/team-match" method="post" enctype="multipart/form-data">
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
				<label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="kegiatan" name="kegiatan" value="{{old('kegiatan')}}">
					@error('kegiatan')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="hari" class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="hari" name="hari" value="{{old('hari')}}">
						<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
					</select>
					@error('hari')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" value="{{old('tanggal')}}">
					@error('tanggal')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="tempat" name="tempat" value="{{old('tempat')}}">
					@error('tempat')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="file_team" class="col-sm-2 col-form-label">Hasil Match</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="file_team" name="file_team" value="{{old('file_team')}}">
					@error('file_team')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Tambah</button>
		</form>
	</div>
</div>
@endsection