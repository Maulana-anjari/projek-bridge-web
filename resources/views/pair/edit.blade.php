@extends('layouts.app')

@section('title')
	Edit Pair Match
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

<div class="card">
	<div class="card-body">
		<div class="row row-cols-1 row-cols-md-2 g-4 mb-2">
			
		</div>
	</div>
</div>
@endsection