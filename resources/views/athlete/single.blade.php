@extends('layouts.app')

@section('title')
	Data Atlet
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
	    <a href="/atlet" class="btn btn-outline-secondary btn-sm">Data Atlet</a>
	    <a href="/atlet/{{$atlet->id}}/edit" class="btn btn-outline-success btn-sm">Edit</a>
	</div>
	<form action="/atlet/{{$atlet->id}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-outline-danger btn-sm">Hapus</button>
	</form>
</div>
@endsection

@section('content')
		<div class="card shadow">
			<div class="card-body">
				<div class="row">
					<div class="col-3">Nama</div>
					<div class="col-9">: {{ $atlet->nama }}</div>
				</div>
				<div class="row">
					<div class="col-3">Email</div>
					<div class="col-9">: {{ $atlet->email }}</div>
				</div>
				<div class="row">
					<div class="col-3">Tempat Lahir</div>
					<div class="col-9">: {{ $atlet->tempat_lahir }}</div>
				</div>
				<div class="row">
					<div class="col-3">Tanggal Lahir</div>
					<div class="col-9">: {{ $atlet->tanggal_lahir }}</div>
				</div>
				<div class="row">
					<div class="col-3">Alamat</div>
					<div class="col-9">: 
						{{ $atlet->pedukuhan }},
						{{ $atlet->rt }}/{{ $atlet->rw }},
						{{ $atlet->kelurahan }},
						{{ $atlet->kecamatan }}, 
						{{ $atlet->kota }}, 
						{{ $atlet->provinsi }} 
						{{ $atlet->kode_pos }}
					</div>
				</div>
			</div>
		</div>
@endsection