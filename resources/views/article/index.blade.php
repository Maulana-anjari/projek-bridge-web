@extends('layouts.app')

@section('content')
	<h1>Daftar Atlet</h1>
	<!-- <a class="btn btn-primary mb-2" href="/artikel/create">Tambah Atlet +</a> -->
	@foreach ($atlets->chunk(3) as $atletChunk)
	<div class="row">
		@foreach($atletChunk as $atlet)
		<div class="col card mb-1 ml-1 mr-1">
			<div class="card-body">
				<p> <strong>{{ ucfirst($atlet->nama) }}</strong></p>
				<p>{{ $atlet->email }}</p>
				<a href="/artikel/{{$atlet->slug}}" class="btn btn-info btn-sm stretched-link">Baca</a>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach

	<div class="pagination pagination-sm">
		{{$atlets->links()}}
	</div>
@endsection