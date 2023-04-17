<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posyandu - Login</title>
    <link rel="stylesheet" href="{{ asset('/dist/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <section id="login-form">
        <div class="row vh-100 mw-100 m-0">
            <div class="col-6">

            </div>
            <div class="col-6 bg-primary d-flex justify-content-center align-items-center">
                <div class="card bg-light bg-opacity-25 rounded rounded-4">
                    <p class="text-center h2 fw-bold text-light pt-3">MASUK</p>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Alamat Email</label>
                            <input type="email" class="form-control form-control-lg" id="email"
                                placeholder="Alamat Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-light">Kata Sandi</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                placeholder="Kata Sandi">
                        </div>
                        <button
                            class="btn btn-warning py-2 mx-auto px-5 rounded rounded-pill text-center">Masuk</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('/dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
