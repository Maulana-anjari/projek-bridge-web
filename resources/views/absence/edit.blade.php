@extends('layouts.app')

@section('title')
	Edit Absensi
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
	<div class="row">
		<div class="col mb-2">
			<div class="card shadow-sm">
				<div class="card-body">
				<form action="/absensi/{{$data_absence->id}}" method="post">
					@csrf
					@method('PUT')
					<div class="row mb-2 form-group">
						<label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
						<div class="col-sm-10">
							<select class="form-select shadow-sm" id="kegiatan" name="kegiatan" value="{{old('kegiatan') ? old('kegiatan') : $data_absence->kegiatan}}">
								<option selected>{{old('kegiatan') ? old('kegiatan') : $data_absence->kegiatan}}</option>
								@if ($data_absence->kegiatan == 'Latihan')
								<option>Event</option>
								<option>Kejuaraan</option>
								@elseif ($data_absence->kegiatan == 'Event')
								<option>Latihan</option>
								<option>Kejuaraan</option>
								@elseif ($data_absence->kegiatan == 'Kejuaraan')
								<option>Latihan</option>
								<option>Event</option>
								@else
								<option>Latihan</option>
								<option>Event</option>
								<option>Kejuaraan</option>
								@endif
							</select>
							@error('kegiatan')
								<div class="alert alert-danger mt-2">{{$message}}</div>
							@enderror
						</div>
					</div>
					<div class="row mb-2 form-group">
						<label for="hari" class="col-sm-2 col-form-label">Hari</label>
						<div class="col-sm-10">
							<select class="form-select shadow-sm" id="hari" name="hari" value="{{old('hari') ? old('hari') : $data_absence->hari}}">
								<option selected>{{old('hari') ? old('hari') : $data_absence->hari}}</option>
								@if ($data_absence->hari == 'Minggu')
								<option>Senin</option>
								<option>Selasa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								@elseif ($data_absence->hari == 'Senin')
								<option>Selasa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
								@elseif ($data_absence->hari == 'Selasa')
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
								<option>Senin</option>
								@elseif ($data_absence->hari == 'Rabu')
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
								<option>Senin</option>
								<option>Selasa</option>
								@elseif ($data_absence->hari == 'Kamis')
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
								<option>Senin</option>
								<option>Selasa</option>
								<option>Rabu</option>
								@elseif ($data_absence->hari == 'Jumat')
								<option>Sabtu</option>
								<option>Minggu</option>
								<option>Senin</option>
								<option>Selasa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								@elseif ($data_absence->hari == 'Sabtu')
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
							<input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" value="{{old('tanggal') ? old('tanggal') : $data_absence->tanggal}}">
							@error('tanggal')
								<div class="alert alert-danger mt-2">{{$message}}</div>
							@enderror
						</div>
					</div>
					<div class="row mb-2 form-group">
						<label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control shadow-sm" id="tempat" name="tempat" value="{{old('tempat') ? old('tempat') : $data_absence->tempat}}">
							@error('tempat')
								<div class="alert alert-danger mt-2">{{$message}}</div>
							@enderror
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-2 d-grid mx-auto">Simpan</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col mb-2">
			<div class="card shadow-sm">
				<div class="card-body">
					<form action="/absensi/atlet" method="post">
					@csrf
					<input type="text" name="tanggal" class="form-control shadow-sm mb-2" value="{{ $data_absence->tanggal }}" disabled="disabled">
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
					<!-- @php $no = 1; @endphp
					@foreach ($attendances as $atd)
					<tr>
						<th scope="row">{{ $no++ }}</th>
						<td>{{ $atd->tanggal }}</td>
						<td>{{ $atd->nama_atlet }}</td>
						<td>{{ $atd->kehadiran }}</td>
						<td>
							<form action="/absensi/atlet/{{$atd->id}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-outline-danger btn-sm">Hapus</button>
							</form>
						</td>
					</tr>
					@endforeach -->
				</tbody>
			</table>
		</div>
	</div>
@endsection