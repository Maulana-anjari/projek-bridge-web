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
    <main class="form-signin">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4 mx-auto d-block" src="/icon/icon-logo.png" alt="Logo DBC">
        <p class="h5 mb-3 fw-normal text-center">{{ config('app.name') }}</p>
        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

        <div class="form-floating">
            <input id="floatingInput" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" id="floatingPassword" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-primary tombol-login text-center mx-auto">{{ __('Login') }}</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Daendels Bridge Community | GABKU 2021</p>
      </form>
    </main>

    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>