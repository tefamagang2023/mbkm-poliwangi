@extends('layouts.base-auth')

@section('title')
    <title>Sign In Akun | MBKM Poliwangi</title>
@endsection

@section('css')
    {{-- chapta google --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
    <section class="section">
        <div class="container mt-5 py-4">
            <div class="row d-flex justify-content-center margin-buttom">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('assets/images/logo-mbkm.png') }}" alt="logo" class="img-fluid mx-auto my-auto px-3"
                        width="300">
                </div>
            </div>

            <div class="row pt-2" data-aos="zoom-in" data-aos-delay="600">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary card-hover rounded">
                        <div class="card-body">
                            <div class="pb-3 pt-1">
                                <h6 class=" text-theme">Hai, Selamat Datang</h6>
                                <small class="text-muted">Masuk dengan akun anda</small>
                            </div>

                            <form action="{{ route('do.login') }}" method="POST" class="needs-validation">
                                @csrf

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        tabindex="1" placeholder="Username akun">
                                    @error('username')
                                        <div id="username" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            tabindex="2" placeholder="Password akun">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"
                                                onclick="togglePasswordVisibility()">
                                                <i id="togglePassword" class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div id="password" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <center class="d-flex">
                                        <!-- reCAPTCHA -->
                                        <div class="g-recaptcha mx-auto my-auto" data-sitekey="{{ env('SITE_KEY') }}"></div>
                                    </center>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Sign in
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <small class="mx-auto">
                                            <a href="{{ route('landing.page') }}">Kembali ke Landing Page</a>
                                        </small>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row py-1">
                        <div class="col text-center d-flex">
                            <span class="mx-auto my-auto text-theme" data-aos="zoom-in-down" data-aos-delay="900">
                                Copyright &copy; MBKM Poliwangi {{ now()->year }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Tampilkan password
                toggleButton.classList.remove('fa-eye-slash');
                toggleButton.classList.add('fa-eye');
            } else {
                passwordField.type = "password"; // Sembunyikan password
                toggleButton.classList.remove('fa-eye');
                toggleButton.classList.add('fa-eye-slash');
            }
        }
    </script>
@endsection
