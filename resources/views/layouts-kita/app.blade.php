<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Maulana Anjari A">
    <title>GABKU | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/athlete.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/all-app.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>

<body>
	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/home">
	  	<img src="/icon/dbc.png" class="brand-logo">
	  </a>
	  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="show" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="text-light">Gabungan Bridge Kulon Progo</div>
	  <div class="navbar-nav">
	    <div class="nav-item text-nowrap">
	    	<form id="logout-form" action="{{ route('logout') }}" method="POST">
	    		@csrf
				<button class="nav-link px-3 sign-out" type="submit">Log Out</button>
	    	</form>
	    </div>
	  </div>
	</header>

	<div class="container-fluid">
	  <div class="row">
	    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	      <div class="position-sticky pt-3">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'home') ? 'active' : '' }}" aria-current="page" href="/home">
	              <span data-feather="home"></span>
	              Home
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'atlet') ? 'active' : '' }}" href="/atlet">
	              <span data-feather="file"></span>
	              Atlet
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'absensi') && (request()->segment(2) != 'ekspor') ? 'active' : '' }}" href="/absensi">
	              <span data-feather="shopping-cart"></span>
	              Absensi
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'pair-match') ? 'active' : '' }}" href="/pair-match">
	              <span data-feather="users"></span>
	              Pair Match
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'team-match') ? 'active' : '' }}" href="/team-match">
	              <span data-feather="bar-chart-2"></span>
	              Team Match
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link {{ (request()->segment(1) == 'table-score') ? 'active' : '' }}" href="/table-score">
	              <span data-feather="layers"></span>
	              Table of Score
	            </a>
	          </li>
	          <li class="nav-item btn-sign-out">
	            <form id="logout-form" action="{{ route('logout') }}" method="POST">
		    		@csrf
					<button class="nav-link btn-keluar" type="submit">Log Out</button>
		    	</form>
	          </li>
	        </ul>
	      </div>
	    </nav>

	    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	        <h1 class="h2">@yield('title')</h1>
	        @yield('menu')
	        @yield('tombol-nav')
	      	</div>

	      	<div class="col">
			@yield('content')
			</div>
	    </main>
	  </div>
	</div>


	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/dashboard.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(".navbar-toggler").click(function() {
			$("#sidebarMenu").toggleClass("show");
		});
	</script>
</body>

</html>