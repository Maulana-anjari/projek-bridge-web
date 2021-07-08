@extends('layouts-kita.app')

@section('title')
	Absensi
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-3">
	    <a href="/absensi" class="btn btn-outline-secondary btn-sm">Daftar Absensi</a>
	    <a href="/absensi/{{$absence->id}}/edit" class="btn btn-success btn-sm">Edit</a>
	    <a href="/absensi/ekspor-lain/{{$absence->id}}" target="_blank" class="btn btn-warning btn-sm">Ekspor</a>
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
						<div class="col-2">Kategori</div>
						<div class="col-6">: {{$absence->kategori}}</div>
					</div>	
					<div class="row mb-2 form-group">
						<div class="col-2">Kegiatan</div>
						<div class="col-6">: {{$absence->kegiatan}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-2">Hari</div>
						<div class="col-6">: {{$absence->hari}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-2">Tanggal</div>
						<div class="col-6">: {{$absence->tanggal}}</div>
					</div>
					<div class="row mb-2 form-group">
						<div class="col-2">Tempat</div>
						<div class="col-6">: {{$absence->tempat}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow-sm mb-4 overflow-auto">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Kehadiran</th>
						<th scope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 1; @endphp
					@foreach ($attendances as $atd)
					<tr>
						<th scope="row">{{ $no++ }}</th>
						<td>{{ $atd->nama_atlet }}</td>
						<td>{{ $atd->kehadiran }}</td>
						<td>{{ $atd->keterangan }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="d-flex pagination mb-1 justify-content-center">
			{!! $attendances->links() !!}
			</div>
		</div>
	</div>
@endsection