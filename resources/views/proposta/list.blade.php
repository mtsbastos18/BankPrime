@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Propostas</li>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-12 col-md-2">
                    @if (auth()->user()->id_permissao == 1)
                        <a href="{{ route('nova-proposta') }}" class="btn btn-block btn-outline-primary">Nova Proposta</a>
                    @endif
                </div>
                <div class="col-12 col-md-10" style="display: flex;justify-content: flex-end;">
                    <div class="col-4">
                        <select id="filtro-banco" class="custom-select form-control form-control-border">
                            <option value="">Filtra por banco</option>
                            <option value="1">Itaú
                            </option>
                            <option value="2">
                                Bradesco</option>
                            <option value="3">
                                Santander</option>
                            <option value="4">
                                Caixa</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-5">
                        <input type="text" name="filtroProposta" id="input-busca" placeholder="Pesquisar"
                            class="form-control form-control-border" id="">
                    </div>
                    <div class="col-12 col-md-3">
                        <a class="btn btn-block btn-outline-primary" id="filtra-busca">Pesquisar</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Propostas
                            </h3>
                        </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="tabela-lista" class="table">
                                    <thead>
                                        <tr>
                                            <th>Banco</th>
                                            <th>CPF</th>
                                            <th>Cliente</th>
                                            <th>Situação</th>
                                            <th>Atualizado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lista as $l)
                                            <tr>
                                                <td>
                                                    @switch($l->banco)
                                                        @case(1)
                                                            <img src="{{ asset('images/itau.png') }}"
                                                                style="max-width: 25px;"><span
                                                                style="visibility:hidden;">{{ $l->banco }}</span>
                                                        @break
                                                        @case(2)
                                                            <img src="{{ asset('images/bradesco.png') }}"
                                                                style="max-width: 25px;"><span
                                                                style="visibility:hidden;">{{ $l->banco }}</span>
                                                        @break
                                                        @case(3)
                                                            <img src="{{ asset('images/santander.png') }}"
                                                                style="max-width: 25px;"><span
                                                                style="visibility:hidden;">{{ $l->banco }}</span>
                                                        @break
                                                        @case(4)
                                                            <img src="{{ asset('images/caixa.png') }}"
                                                                style="max-width: 25px;"><span
                                                                style="visibility:hidden;">{{ $l->banco }}</span>
                                                        @break
                                                        @default

                                                    @endswitch
                                                </td>
                                                <td>{{ $l->cpf }}</td>
                                                <td>{{ $l->nome }}</td>

                                                @switch($l->status)
                                                    @case(1)
                                                        <td>
                                                            <a class="badge bg-info">Em andamento</a>
                                                        </td>
                                                    @break
                                                    @case(2)
                                                        <td>
                                                            <a class="badge bg-secondary">Aguardando aprovação</a>
                                                        </td>
                                                    @break
                                                    @case(3)
                                                        <td>
                                                            <a class="badge bg-warning">Declinou</a>
                                                        </td>
                                                    @break
                                                    @case(4)
                                                        <td>
                                                            <a class="badge bg-success">Registrado</a>
                                                        </td>
                                                    @break
                                                    @case(5)
                                                        <td>
                                                            <a class="badge bg-danger">Cancelado</a>
                                                        </td>
                                                    @break
                                                    @default

                                                @endswitch

                                                <td>{{ date_format(new DateTime($l->updated_at), 'd-m-Y H:i:s') }}</td>
                                                <td class="td-acoes">
                                                    <a title="Visualizar"
                                                        href="{{ route('visualizar-proposta', $l->id) }}"><i
                                                            class="far fa-eye"></i> </a>
                                                    @if (auth()->user()->id_permissao == 1)
                                                        <a title="Editar"
                                                            href="{{ route('editar-proposta', $l->id) }}"><i
                                                                class="far fa-edit"></i> </a>

                                                        <a title="Acompanhamentos"
                                                            href="{{ route('acompanhamentos', $l->id) }}"><i
                                                                class="fas fa-briefcase"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <style>
        .card-header {
            padding-bottom: 0 !important;
        }

        .card-title {
            font-size: 13px !important;
        }

        label {
            font-size: 12px !important;
        }

    </style>
    <script>
        $("#input-busca").on('keyup', function() {
            let filtro = $(this).val();

            $("#filtra-busca").attr('href', '/propostas/' + filtro);
        })

        $("#filtro-banco").on('change', function() {
            let filtro = $(this).val();
            console.log(filtro)
            $("#filtra-busca").attr('href', '/propostas/' + filtro);
            window.location.href = '/propostas/' + filtro;
        })

        $(document).ready(function() {
            $('#tabela-lista').DataTable({
                lengthChange: false,
                searching: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json'
                }
            });
        });
    </script>

@endsection
