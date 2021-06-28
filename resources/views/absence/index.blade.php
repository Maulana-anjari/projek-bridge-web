@extends('layouts.app')

@section('title')
	Absensi
@endsection

@section('tombol-nav')

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
		<form action="/absensi" method="post">
			@csrf
			<div class="row mb-2 form-group">
				<label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
				<div class="col-sm-10">
					<select class="form-select shadow-sm" id="kegiatan" name="kegiatan" value="{{old('kegiatan')}}">
						<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
						<option>Latihan</option>
						<option>Event</option>
						<option>Kejuaraan</option>
					</select>
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
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Tambah</button>
		</form>
	</div>
</div>
<hr>
<div class="row row-cols-1 row-cols-md-2 g-4">
	@foreach ($absences as $absence)
	<div class="col">
		<div class="card border-secondary mb-2">
			<div class="card-header 
						@if ($absence->kegiatan == NULL || $absence->hari == NULL || $absence->tanggal == NULL)
						bg-danger
						@else
						{{ ($absence->kegiatan != 'Latihan') ? 'bg-dark' : '' }}
						@endif">
				<div class="row align-items-center">
					<div class="col-8 {{ ($absence->kegiatan != 'Latihan') ? 'text-white' : '' }}">
						@if ($absence->kegiatan == NULL)
						Data belum diatur! Silahkan Edit
						@else
						{{ ucfirst($absence->kegiatan) }}
						@endif
					</div>
					<div class="col-4">
						<div class="row">
							<div class="col-auto">
								<a href="/absensi/{{$absence->id}}" class="btn btn-sm mb-1
									@if ($absence->kegiatan == NULL|| $absence->hari == NULL || $absence->tanggal == NULL)
										btn-dark
									@else
										btn-outline-primary
									@endif">
									Edit
								</a>
							</div>
							<div class="col-auto">
								<form action="/absensi/{{$absence->id}}" method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm
										@if ($absence->kegiatan == NULL|| $absence->hari == NULL || $absence->tanggal == NULL)
										btn-outline-light
										@else
										btn-outline-danger
										@endif">
										Hapus
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-3">Hari</div>
					<div class="col-9">: 
						@if ($absence->hari == NULL)
						Data belum diatur!
						@else
						{{ $absence->hari }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-3">Tanggal</div>
					<div class="col-9">: 
						@if ($absence->tanggal == NULL)
						Data belum diatur!
						@else
						{{ $absence->tanggal }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-3">Tempat</div>
					<div class="col-9">: 
						@if ($absence->tempat == NULL)
						Data belum diatur!
						@else
						{{ $absence->tempat }}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection
