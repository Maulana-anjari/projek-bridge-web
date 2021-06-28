@extends('layouts.app')

@section('content')
	<h1>Mengedit Data Atlet</h1>
	<form action="/artikel/{{$data_atlet->id}}" method="post">
		@csrf
		@method('PUT')

		<div class="form-gorup">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" 
				value="{{old('nama') ? old('nama') : $data_atlet->nama}}">
			@error('nama')
				<div class="alert alert-danger mt-2">{{$message}}</div>
			@enderror
		</div>
		<div class="form-gorup">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email') : $data_atlet->email}}">
			@error('email')
				<div class="alert alert-danger mt-2">{{$message}}</div>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary mt-2">Simpan</button>
	</form>
@endsection