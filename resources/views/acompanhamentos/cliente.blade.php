
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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
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
            <h1><strong>STATUS</strong> DA PROPOSTA</h1>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-md-2 margem">
            <img src="{{ asset('images/01.png') }}" alt="" srcset="">
        </div>
        <div class="col-12 col-md-2 ">
             <img  @if($atual['id_tipo_acompanhamento'] > 1) src="{{ asset('images/02.png') }}" @else src="{{ asset('images/02_off.png') }}" @endif alt="" srcset="">
        </div>
        <div class="col-12 col-md-2 margem">
             <img  @if($atual['id_tipo_acompanhamento'] > 2) src="{{ asset('images/03.png') }}" @else src="{{ asset('images/03_off.png') }}" @endif  alt="" srcset="">
        </div>
        <div class="col-12 col-md-2">
             <img  @if($atual['id_tipo_acompanhamento'] > 3) src="{{ asset('images/04.png') }}" @else src="{{ asset('images/04_off.png') }}" @endif  alt="" srcset="">
        </div>
        <div class="col-12 col-md-2 margem">
             <img  @if($atual['id_tipo_acompanhamento'] > 4) src="{{ asset('images/05.png') }}" @else src="{{ asset('images/05_off.png') }}" @endif  alt="" srcset="">
        </div>
        <div class="col-12 col-md-2">
             <img @if($atual['id_tipo_acompanhamento'] > 6) src="{{ asset('images/06.png') }}" @else src="{{ asset('images/06_off.png') }}" @endif alt="" srcset="">
        </div>
    </div>
</div>

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<style>
body{
    background: url(../images/bg.png) no-repeat;
    background-size: cover;
}
h1{
    display: inline-block;
    line-height: .6;
}
h1::after{
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
