@extends('layouts.app')

@section('title')
	Absensi
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
	    <a href="/absensi" class="btn btn-outline-secondary btn-sm">Daftar Absensi</a>
	    <a href="/absensi/{{$absence->id}}/edit" class="btn btn-outline-success btn-sm">Edit</a>
	</div>
	<form action="/absensi/{{$absence->id}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-outline-danger btn-sm">Hapus</button>
	</form>
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
	<div class="row">
		<div class="col mb-2">
			<div class="card shadow-sm">
				<div class="card-body">			
					<div class="row mb-2 form-group">
						<div class="col-sm-2">Kegiatan</div>
						<div class="col-sm-10">{{$absence->kegiatan}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-sm-2">Hari</div>
						<div class="col-sm-10">{{$absence->hari}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-sm-2">Tanggal</div>
						<div class="col-sm-10">{{$absence->tanggal}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-sm-2">Tempat</div>
						<div class="col-sm-10">{{$absence->tempat}}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col mb-2">
			<div class="card shadow-sm">
				<div class="card-body">
					<form action="/absensi/atlet" method="post">
					@csrf
					<input type="text" name="tanggal" class="form-control shadow-sm mb-2" value="{{ $absence->tanggal }}" disabled="disabled">
					<div class="row mb-2 form-group">
						<label for="nama_atlet" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<select class="form-select shadow-sm" id="nama_atlet" name="nama_atlet" value="{{old('nama_atlet')}}">
								<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
								@foreach ($atlets as $a)
								<option>{{ $a->nama }}</option>
								@endforeach
							</select>
							@error('nama')
								<div class="alert alert-danger mt-2">{{$message}}</div>
							@enderror
						</div>
					</div>
					<div class="row mb-2 form-group mt-2">
						<label for="kehadiran" class="col-sm-2 col-form-label">Kehadiran</label>
						<div class="col-sm-10">
							<select class="form-select shadow-sm" id="kehadiran" name="kehadiran" value="{{old('kehadiran')}}">
								<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
								<option>Hadir</option>
								<option>Sakit</option>
								<option>Ijin</option>
								<option>Alpha</option>
							</select>
							@error('kehadiran')
								<div class="alert alert-danger mt-2">{{$message}}</div>
							@enderror
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-2 d-grid mx-auto">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow-sm mb-4">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Nama</th>
						<th scope="col">Kehadiran</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
@endsection