<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posyandu - Login</title>
    <link rel="stylesheet" href="{{ asset('/dist/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @livewireStyles
</head>

<body>
    @include('sweetalert::alert')
    <section id="login-form">
        <div class="row vh-100 mw-100 m-0">
            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('/images/logo.png') }}" alt="posyandu" width="200px">
                <p class="login-h1">Posyandu<br>Singkong I</p>
                <p class="login-h2">RW 005 Grogol Selatan</p>
            </div>
            <div class="col-6 bg-primary d-flex justify-content-center align-items-center">
                <div class="card bg-light bg-login-card bg-opacity-25 rounded rounded-4 w-50">
                    <p class="text-center h2 fw-bold text-light pt-3">MASUK</p>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <form action="login" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="email" class="form-label text-light">Alamat Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    placeholder="Alamat Email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-light">Kata Sandi</label>
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="password" placeholder="Kata Sandi">
                            </div>
                            <button type="submit"
                                class="btn btn-lg btn-warning mt-3 mx-auto px-5 rounded rounded-pill text-center">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('/dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts
</body>

</html>
