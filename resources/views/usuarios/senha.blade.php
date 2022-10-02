<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bank Prime - @yield('title')</title>
        <link rel="icon" href="{{ asset('images/fav.png') }}" />

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css"
        />

        <link
            rel="stylesheet"
            href="{{ asset('css/dataTables.bootstrap4.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('css/responsive.bootstrap4.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('css/buttons.bootstrap4.min.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

        <script src="{{ asset('js/app.js') }}"></script>

        {{--
        <script src="{{ asset('js/maskedInput.js') }}"></script>
        --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json"></script>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img
                    src="{{ asset('images/logo-bank-prime.png') }}"
                    style="max-width: 100%"
                    class="img-responsive"
                />
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <h5 class="text-center">
                        Altere sua senha para prosseguir
                    </h5>
                    <form method="POST" action="{{ route('altera-senha') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                id="senha"
                                type="password"
                                class="form-control @error('senha') is-invalid @enderror"
                                placeholder="Senha"
                                name="senha"
                                required
                                autofocus
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                id="confirma-senha"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Confirmar senha"
                                name="confirmaSenha"
                                required
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input
                                    type="checkbox"
                                    onclick="exibirSenhas()"
                                />
                                Mostrar senha
                                <p>
                                    * Sua senha deve possuir no mínimo 8
                                    caracteres
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 text-center">
                                <button
                                    disabled
                                    type="submit"
                                    class="btn btn-block btn-primary"
                                    id="btn-enviar"
                                >
                                    {{ __("Alterar senha") }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
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

        function exibirSenhas() {
            let confirmaSenha = document.getElementById("confirma-senha");
            let senha = document.getElementById("senha");
            if (senha.type === "password") {
                senha.type = "text";
                confirmaSenha.type = "text";
            } else {
                senha.type = "password";
                confirmaSenha.type = "password";
            }
        }
    </script>
</html>
