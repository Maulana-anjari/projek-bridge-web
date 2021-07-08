@extends('layouts-kita.app')

@section('title')
	Team Match
@endsection
@section('menu')
	<a href="/team-match" class="btn btn-outline-secondary btn-sm">Daftar Absensi</a>
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
		<div class="row">
			<div class="col mb-2">
				<div class="row mb-2 form-group">
					<div class="col-2">Kategori</div>
					<div class="col-6">: {{$team->kategori}}</div>
				</div>	
				<div class="row mb-2 form-group">
					<div class="col-2">Kegiatan</div>
					<div class="col-6">: {{$team->kegiatan}}</div>
				</div>
				<div class="row mb-2 form-group">
					<div class="col-2">Hari</div>
					<div class="col-6">: {{$team->hari}}</div>
				</div>
				<div class="row mb-2 form-group">
					<div class="col-2">Tanggal</div>
					<div class="col-6">: {{$team->tanggal}}</div>
				</div>
				<div class="row mb-2 form-group">
					<div class="col-2">Tempat</div>
					<div class="col-6">: {{$team->tempat}}</div>
				</div>
				<div class="row mb-2 form-group">
					<div class="col-2">Hasil Match</div>
					<div class="col-4">: {{$team->file_team}}</div>
				</div>
				<a href="" class="btn btn-sm btn-success">Unduh Hasil Match</a>
				<a href="/team-match" class="btn btn-sm btn-outline-secondary">Kembali</a>
			</div>
		</div>
	</div>
</div>
@endsection