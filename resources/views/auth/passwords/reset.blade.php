{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bank Prime - @yield('title')</title>
    <link rel="icon" href="{{ asset('images/fav.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="{{ asset('js/maskedInput.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('images/logo-bank-prime.png') }}" style="max-width: 100%" class="img-responsive" />
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body ">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4>Recuperação de senha</h4>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Digite seu e-mail" value="{{ $email ?? old('email') }}" required
                                autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="senha" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Senha" required autocomplete="new-password">


                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="confirma-senha" type="password" placeholder="Confirmar senha"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="btn-enviar" disabled>
                                {{ __('Alterar senha') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>
<script>
    let confirmaSenha = document.getElementById("confirma-senha");
    let senha = document.getElementById("senha");
    confirmaSenha.addEventListener("keyup", () => {
        if (confirmaSenha.value == senha.value && senha.value.length >= 8) {
            document
                .getElementById("btn-enviar")
                .removeAttribute("disabled");
        } else {
            document
                .getElementById("btn-enviar")
                .setAttribute("disabled", "disabled");
        }
    });
</script>

</html>
