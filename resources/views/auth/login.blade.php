@extends('layouts.app')
@section('judul')
Karangduren Archive
@endsection
@section('judul_sub')
Form Login
@endsection
@section('content')

<body>
    <div>
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-10"></div>
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Masukan Email Address..." value="{{ old('email') }}"
                                                    required autocomplete="email" autofocus>
                                            </div>
                                            @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user" id="exampleInputPassword"
                                                    placeholder="Masukan Password" required
                                                    autocomplete="current-password">
                                            </div>
                                            @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                        <hr>
                                        <hr>
                                        @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                                        </div>
                                        @endif
                                        <div class="text-center">
                                            <a class="small" href="{{ url('register') }}">Daftar Akun!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil',
            text: '{{ session('success') }}',
        });
    </script>
@endif

</body>
@endsection