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
		<form action="/absensi/ekspor-data" method="get" target="_blank">
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
				<label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="bulan" name="bulan" value="{{old('bulan')}}">
						<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
					@error('bulan')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
			<div class="row mb-2 form-group">
				<label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-10">
					<input type="text" class="form-control shadow-sm" id="tahun" name="tahun" value="{{old('tahun')}}" placeholder="">
					@error('tahun')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Print PDF</button>
		</form>
		<!-- <a href="/absensi/ekspor-data" class="btn btn-danger" target="_blank">PRINT</a> -->
	</div>
</div>
@endsection