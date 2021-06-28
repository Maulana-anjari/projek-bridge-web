@extends('layouts.app')

@section('content')
	<h1>Menambah Atlet Baru</h1>
	<form action="/artikel" method="post">
		@csrf
		<div class="form-gorup">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
			@error('nama')
				<div class="alert alert-danger mt-2">{{$message}}</div>
			@enderror
		</div>
		<div class="form-gorup">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
			@error('email')
				<div class="alert alert-danger mt-2">{{$message}}</div>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary mt-2">Simpan</button>
	</form>
@endsection