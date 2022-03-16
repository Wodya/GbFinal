<!doctype html>
<html @lang('en')>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('style')
</head>

<body class="back-color-neutral">
<div id="app">
    <div class="d-flex justify-content-start align-items-center flex-column">
        <img src="img\logo.png" class="register-logo" alt="">
        <form class="bg-white register-form fw-normal" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            <div class="d-grid gap-1">
                <button type="submit" class="btn btn-primary w-auto">Войти</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
