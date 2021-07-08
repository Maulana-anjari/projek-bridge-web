@extends('layouts-kita.app')

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
	    	<button type="submit" class="btn btn-sm btn-primary"><span class="icon"></span>Tambah</button>
		</form>
	</div>
</div>
<hr>
<div class="card mb-4">
	<div class="card-body">
		<div class="row">
			<label for="filter-rentang-waktu" class="col-form-label col-sm-2">Filter Waktu</label>
			<div class="col-sm-2">
				<select id="filter-rentang-waktu" name="filter-rentang-waktu" class="form-select shadow-sm filter">
					<option selected="true" disabled="disabled" value="">--<i>Pilih</i>--</option>
					<option value="1">Harian</option>
					<option value="2">Mingguan</option>
					<option value="3">Bulanan</option>
					<option value="4">Tahunan</option>
				</select>
			</div>
		</div>
		<hr>
		<div class="row row-cols-1 row-cols-md-2 g-4">
			@foreach ($absences as $absence)
			<div class="col">
				<div class="card border-secondary mb-2">
					<div class="card-header {{ ($absence->kategori == 'Pelatkab') ? 'bg-dark' : '' }}">
						<div class="row align-items-center">
							<div class="col-8 {{ ($absence->kategori == 'Pelatkab') ? 'text-white' : '' }}">
								<a href="/absensi/{{$absence->id}}" class="show-absensi {{ ($absence->kategori == 'Pelatkab') ? 'text-white' : 'text-dark' }}">{{ ucfirst($absence->kegiatan) }}</a>
							</div>
							<div class="col-4">
								<div class="row">
									<div class="col-auto">
										<a href="/absensi/{{$absence->id}}/edit" class="btn btn-sm mb-1 btn-outline-primary">
											Edit
										</a>
									</div>
									<div class="col-auto">
										<form action="/absensi/{{$absence->id}}" method="post">
											@csrf
											@method('DELETE')
											<button class="btn btn-sm btn-outline-danger">
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
		<div class="d-flex pagination mb-1 justify-content-center">
			{{ $absences->links() }}
		</div>
	</div>
</div>
@endsection
