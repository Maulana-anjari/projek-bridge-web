@extends('layouts-kita.app')

@section('title')
	Edit Team Match
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
		<form action="/team-match/{{$data_team->id}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-2 form-group">
				<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="kategori" name="kategori" value="{{old('kategori') ? old('kategori') : $data_team->kategori}}">
						<option selected>{{old('kategori') ? old('kategori') : $data_team->kategori}}</option>
						@if ($data_team->kategori == 'Latihan')
						<option>Pelatkab</option>
						<option>Event</option>
						<option>Kejuaraan</option>
						@elseif ($data_team->kategori == 'Pelatkab')
						<option>Latihan</option>
						<option>Event</option>
						<option>Kejuaraan</option>
						@elseif ($data_team->kategori == 'Event')
						<option>Latihan</option>
						<option>Pelatkab</option>
						<option>Kejuaraan</option>
						@elseif ($data_team->kategori == 'Kejuaraan')
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
					<input type="text" class="form-control shadow-sm" id="kegiatan" name="kegiatan" value="{{old('kegiatan') ? old('kegiatan') : $data_team->kegiatan}}">
					@error('kegiatan')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="hari" class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="hari" name="hari" value="{{old('hari') ? old('hari') : $data_team->hari}}">
						<option selected>{{old('hari') ? old('hari') : $data_team->hari}}</option>
						@if ($data_team->hari == 'Minggu')
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						@elseif ($data_team->hari == 'Senin')
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						@elseif ($data_team->hari == 'Selasa')
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						@elseif ($data_team->hari == 'Rabu')
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						@elseif ($data_team->hari == 'Kamis')
						<option>Jumat</option>
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						@elseif ($data_team->hari == 'Jumat')
						<option>Sabtu</option>
						<option>Minggu</option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						@elseif ($data_team->hari == 'Sabtu')
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
					<input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" value="{{old('tanggal') ? old('tanggal') : $data_team->tanggal}}">
					@error('tanggal')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="tempat" name="tempat" value="{{old('tempat') ? old('tempat') : $data_team->tempat}}">
					@error('tempat')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="file_team" class="col-sm-2 col-form-label">Hasil Match</label>
				@if($data_team->file_team != NULL)
				<div class="col-sm-8">
					<input type="text" class="form-control shadow-sm" id="file_team" name="file_team" value="{{old('file_team') ? old('file_team') : $data_team->file_team}}">
				</div>
				<div class="col-sm-2">
					<a href="hapus_file" class="btn btn-danger float-end">Hapus</a>
				</div>
				@else
				<div class="col-sm-10">
					<input type="file" class="form-control shadow-sm" id="file_team" name="file_team" value="{{old('file_team') ? old('file_team') : $data_team->file_team}}">
					@error('file_team')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
				@endif
			</div>
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Simpan</button>
	    	<a href="/team-match" class="btn btn-sm btn-outline-secondary">Kembali</a>
		</form>
	</div>
</div>
@endsection