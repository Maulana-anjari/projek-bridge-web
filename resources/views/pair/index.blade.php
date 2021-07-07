@extends('layouts.app')

@section('title')
	Pair Match
@endsection
@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
	    <a href="/pair-match/create" class="btn btn-dark btn-sm">Tambah</a>
	    <a href="/pair-match/ekspor" class="btn btn-outline-dark btn-sm">Ekspor</a>
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

<div class="card">
	<div class="card-body">
		<div class="row row-cols-1 row-cols-md-2 g-4 mb-2">
			@foreach ($matches as $match)
			<div class="col">
				<div class="card border-secondary mb-2">
					<div class="card-header {{ ($match->kategori != 'Latihan') ? 'bg-dark' : '' }}">
						<div class="row align-items-center">
							<div class="col-8 {{ ($match->kategori != 'Latihan') ? 'text-white' : '' }}">
								<a href="/pair-match/{{$match->id}}" class="show-pair {{ ($match->kategori != 'Latihan') ? 'text-white' : 'text-dark' }}">{{ ucfirst($match->kegiatan) }}</a>
							</div>
							<div class="col-4">
								<div class="row">
									<div class="col-auto">
										<a href="/pair-match/{{$match->id}}/edit" class="btn btn-sm mb-1 btn-outline-primary">
											Edit
										</a>
									</div>
									<div class="col-auto">
										<form action="/pair-match/{{$match->id}}" method="post">
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
								@if ($match->hari == NULL)
								Data belum diatur!
								@else
								{{ $match->hari }}
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-3">Tanggal</div>
							<div class="col-9">: 
								@if ($match->tanggal == NULL)
								Data belum diatur!
								@else
								{{ $match->tanggal }}
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-3">Tempat</div>
							<div class="col-9">: 
								@if ($match->tempat == NULL)
								Data belum diatur!
								@else
								{{ $match->tempat }}
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-3">Hasil</div>
							<div class="col-9">: 
								@if ($match->file_pair == NULL)
								Data belum diatur!
								@else
								{{ $match->file_pair }}
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="d-flex pagination mb-1 justify-content-center">
			{{ $match->links() }}
		</div>
	</div>
</div>
@endsection