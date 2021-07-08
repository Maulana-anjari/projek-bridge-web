@extends('layouts-kita.app')

@section('title')
	Edit Pair Match
@endsection
@section('menu')
	<a href="/absensi" class="btn btn-outline-secondary btn-sm">Daftar Absensi</a>
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
		<form action="/pair-match/{{$data_pair->id}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-2 form-group">
				<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="kategori" name="kategori" value="{{old('kategori') ? old('kategori') : $data_pair->kategori}}">
						<option selected>{{old('kategori') ? old('kategori') : $data_pair->kategori}}</option>
						@if ($data_pair->kategori == 'Latihan')
						<option>Pelatkab</option>
						<option>Event</option>
						<option>Kejuaraan</option>
						@elseif ($data_pair->kategori == 'Pelatkab')
						<option>Latihan</option>
						<option>Event</option>
						<option>Kejuaraan</option>
						@elseif ($data_pair->kategori == 'Event')
						<option>Latihan</option>
						<option>Pelatkab</option>
						<option>Kejuaraan</option>
						@elseif ($data_pair->kategori == 'Kejuaraan')
						<option>Latihan</option>
						<option>Pelatkab</option>
						<option>Event</option>
						@else
						<option>Latihan</option>
						<option>Pelatkab</option>
						<option>Event</option>
						<option>Kejuaraan</option>
						@endif
					</select>
					@error('kategori')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="kegiatan" name="kegiatan" value="{{old('kegiatan') ? old('kegiatan') : $data_pair->kegiatan}}">
					@error('kegiatan')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="hari" class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="hari" name="hari" value="{{old('hari') ? old('hari') : $data_pair->hari}}">
						<option selected>{{old('hari') ? old('hari') : $data_pair->hari}}</option>
						@if ($data_pair->hari == 'Minggu')
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						@elseif ($data_pair->hari == 'Senin')
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						@elseif ($data_pair->hari == 'Selasa')
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						@elseif ($data_pair->hari == 'Rabu')
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						@elseif ($data_pair->hari == 'Kamis')
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						@elseif ($data_pair->hari == 'Jumat')
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						@elseif ($data_pair->hari == 'Sabtu')
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						@else
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						@endif
					</select>
					@error('hari')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" value="{{old('tanggal') ? old('tanggal') : $data_pair->tanggal}}">
					@error('tanggal')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="tempat" name="tempat" value="{{old('tempat') ? old('tempat') : $data_pair->tempat}}">
					@error('tempat')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="file_pair" class="col-sm-2 col-form-label">Hasil Match</label>
				<div class="col-sm-8">
					<input type="text" class="form-control shadow-sm" id="file_pair" name="file_pair" value="{{old('file_pair') ? old('file_pair') : $data_pair->file_pair}}">
					@error('file_pair')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
				<div class="col-sm-2">
					<a href="" class="btn btn-success float-end">Unduh</a>
				</div>
			</div>
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Simpan</button>
	    	<a href="/pair-match" class="btn btn-sm btn-outline-secondary">Kembali</a>
		</form>
	</div>
</div>
@endsection