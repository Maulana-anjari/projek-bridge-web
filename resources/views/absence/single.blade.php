@extends('layouts.app')

@section('title')
	Absensi
@endsection

@section('tombol-nav')
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
	    <a href="/absensi" class="btn btn-outline-secondary btn-sm">Data Atlet</a>
	    <a href="/absensi/{{$absence->id}}/edit" class="btn btn-outline-success btn-sm">Edit</a>
	</div>
	<form action="/absensi/{{$absence->id}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-outline-danger btn-sm">Hapus</button>
	</form>
</div>
@endsection

@section('content')

@endsection