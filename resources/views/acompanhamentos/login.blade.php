<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Prime - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper pt-5">

        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-12 text-center">
                    <img src="{{ asset('images/logo-bank-prime.png') }}" alt="" srcset="">
                </div>

            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-12 text-center">
                    <h3>Faça login para visualizar</h3>

                </div>

                <form method="POST" style="display:inline;width:40%;" enctype="multipart/form-data"
                    action="{{ route('acompanhamento-cliente-logado') }}">
                    @csrf
                    <input type="hidden" name="idProposta" value="{{ $idProposta }}">
                    <div class="col-12">
                        <label>CPF:</label>
                        <input type="text" name="cpf" placeholder="CPF" class="form-control form-control-border"
                            required>
                    </div>

                    <div class="col-12 mt-2">
                        <label>Senha:</label>
                        <input type="password" name="senha" placeholder="Senha" class="form-control form-control-border"
                            required>
                    </div>

                    <div class="col-12 mt-4">
                        <input type="submit" class="btn btn-block btn-outline-primary" value="Entrar">
                    </div>
                </form>

            </div>

        </div>


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <style>
        body {
            background: url(../images/bg.png) no-repeat;
            background-size: cover;
        }

        h1 {
            display: inline-block;
            line-height: .6;
        }

        h1::after {
            content: '';
            width: 100%;
            height: 5px;
            background-color: #d79c4e;
            display: inline-block;
        }

        .margem {
            margin-top: 1.8rem !important;
        }

    </style>
</body>

</html>
