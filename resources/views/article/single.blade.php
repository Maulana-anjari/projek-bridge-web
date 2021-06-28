@extends('layouts.app')

@section('content')
	<h1>{{$atlet->nama}}</h1>
	<p>{{$atlet->email}}</p>

	<a href="/artikel/{{$atlet->id}}/edit" class="btn btn-success btn-sm">Edit</a>
	<form action="/artikel/{{$atlet->id}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger btn-sm">Hapus</button>
	</form>
	<a class="btn btn-sm btn-info" href="/artikel"><<</a>
@endsection