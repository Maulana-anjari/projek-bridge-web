@extends('layouts.app')

@section('title')
	Absensi
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="row">
		<div class="col">
		<form action="/absensi" method="post">
			@csrf
			<div class="row mb-2 form-group">
				<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal">
					@error('tanggal')
						<div class="alert alert-danger mt-2">{{$message}}</div>
					@enderror
				</div>
			</div>
	    	<button type="submit" class="btn btn-sm btn-outline-dark"><span class="icon"></span>Tambah</button>
	    </form>
	    </div>
	    <div class="col">
	    <a href="" type="button" class="btn btn-sm btn-outline-secondary"><span class="icon"></span>Ekspor</a>
	    </div>
	</div>
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
								<a href="/absensi/{{$absence->tanggal}}/edit" class="btn btn-sm mb-1
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
