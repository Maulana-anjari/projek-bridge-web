<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GABKU | Login</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/login-register.css">
    <!-- Styles -->
</head>

<body class="antialiased">
    <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="card shadow card-text-center card-login">
            <div class="card-body">
                <div class="card-image">
                    <img src="/icon/dbc.png" class="logo">
                </div>
                <a href="/home" class="tombol-login btn btn-dark flex justify-center mt-4 shadow-sm">LOGIN</a>
            </div>
        </div>
    </div> -->

    <main class="form-signin">
      <form>
        <img class="mb-4 mx-auto d-block" src="/icon/icon-logo.png" alt="Logo DBC">
        <p class="h5 mb-3 fw-normal text-center">{{ config('app.name') }}</p>
        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <a href="/home" class="w-100 btn btn-lg btn-primary tombol-login" type="submit">Sign in</a>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Daendels Bridge Community | GABKU 2021</p>
      </form>
    </main>

    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>