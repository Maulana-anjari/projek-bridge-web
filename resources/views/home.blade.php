@extends('layouts.app')

@section('title')
	Home
@endsection

@section('content')
<div class="description">
	<h4>Selamat Datang!</h4>
	<p>Silahkan memilih fitur di bawah ini untuk memulai.</p>
</div>
<div class="row row-cols-1 row-cols-md-5 g-3 mt-3 mb-4">
	<div class="col tempat-kotak">
		<a href="/atlet" class="link-dark text-decoration-none">
			<div class="card h-100 border-dark kotak-dark shadow">
				<img src="" class="card-img-top" alt="">
				<div class="card-body card-menu">
					<div class="row">
						<div class="col-2">
							<img src="/icon/atlet.png" class="img-sm float-start">
						</div>
						<div class="col-10">
							<h6 class="card-title float-end">Data Atlet</h6>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col tempat-kotak">
		<a href="/absensi" class="link-dark text-decoration-none">
			<div class="card h-100 border-dark kotak-dark shadow">
				<img src="" class="card-img-top" alt="">
				<div class="card-body card-menu">
					<div class="row">
						<div class="col-2">
							<img src="/icon/absences.png" class="img-sm float-start">
						</div>
						<div class="col-10">
							<h6 class="card-title float-end">Absensi</h6>
						</div>
					</div>
				</div>
			</div>	
		</a>
	</div>
	<div class="col tempat-kotak">
		<a href="/pair-match" class="link-dark text-decoration-none">
			<div class="card h-100 border-dark kotak-dark shadow">
				<img src="" class="card-img-top" alt="">
				<div class="card-body card-menu">
					<div class="row">
						<div class="col-2">
							<img src="/icon/versus.png" class="img-sm float-start">
						</div>
						<div class="col-10">
							<h6 class="card-title float-end">Pair Match</h6>
						</div>
					</div>
				</div>
			</div>
		</a>	
	</div>
	<div class="col tempat-kotak">
		<a href="/team-match" class="link-dark text-decoration-none">
			<div class="card h-100 border-dark kotak-dark shadow">
				<img src="" class="card-img-top" alt="">
				<div class="card-body card-menu">
					<div class="row">
						<div class="col-2">
							<img src="/icon/versus.png" class="img-sm float-start">
						</div>
						<div class="col-10">
							<h6 class="card-title float-end">Team Match</h6>
						</div>
					</div>
				</div>
			</div>
		</a>	
	</div>
	<div class="col tempat-kotak">
		<a href="/table-score" class="link-dark text-decoration-none">
			<div class="card h-100 border-dark kotak-dark shadow">
				<img src="" class="card-img-top" alt="">
				<div class="card-body card-menu">
					<div class="row">
						<div class="col-2">
							<img src="/icon/score.png" class="img-sm float-start">
						</div>
						<div class="col-10">
							<h6 class="card-title float-end">Table of Score</h6>
						</div>
					</div>
				</div>
			</div>
		</a>	
	</div>
</div>
@endsection