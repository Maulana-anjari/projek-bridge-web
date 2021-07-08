@extends('layouts-kita.app')

@section('title')
	Data Atlet
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
	    <a href="/atlet/create" type="button" class="btn btn-sm btn-outline-dark"><span class="icon"></span>Tambah</a>
	    <a href="" type="button" class="btn btn-sm btn-outline-secondary"><span class="icon"></span>Ekspor</a>
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

	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Alamat</th>
			<th scope="col">Event</th>
		</tr>
	</thead>
	<tbody>
		@php $no = 1; @endphp
		@foreach ($atlets as $atlet)
		<tr>
			<th scope="row">{{ $no++ }}</th>
			<td><a href="/atlet/{{$atlet->slug}}" class="link-nama">{{ $atlet->nama }}</a></td>
			<td>
				@if ($atlet->pedukuhan == NULL || $atlet->rt == NULL || $atlet->rw == NULL || $atlet->kelurahan == NULL || $atlet->kecamatan == NULL || $atlet->kota == NULL || $atlet->provinsi == NULL || $atlet->kode_pos == NULL)
				Data belum lengkap!
				@else
				{{ $atlet->pedukuhan }},
				{{ $atlet->rt }}/{{ $atlet->rw }},
				{{ $atlet->kelurahan }},
				{{ $atlet->kecamatan }}, 
				{{ $atlet->kota }}, 
				{{ $atlet->provinsi }} 
				{{ $atlet->kode_pos }}
				@endif
			</td>
			<td>
				<div class="row">
					<div class="col-auto">
						<a href="/atlet/{{$atlet->id}}/edit" class="btn btn-outline-info btn-sm mb-1">Edit</a>
					</div>
					<div class="col-auto">
						<form action="/atlet/{{$atlet->id}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-outline-danger btn-sm">Hapus</button>
						</form>
					</div>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="d-flex pagination mb-1 justify-content-center">
	{{ $atlets->links() }}
</div>
@endsection