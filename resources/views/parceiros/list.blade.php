@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Parceiros</li>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-2">
                    <a href="{{ route('novo-parceiro') }}" class="btn btn-block btn-outline-primary">Novo parceiro</a>
                </div>
                <div class="col-12 col-md-10" style="display: flex;justify-content: flex-end;">
                    <div class="col-4">
                        <select id="filtro-banco" class="custom-select form-control form-control-border">
                            <option value="">Filtra por status</option>
                            <option value="1">Ativo
                            </option>
                            <option value="2">
                                Inativo</option>
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
                                Lista de parceiros
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Documento</th>
                                            <th>Parceiro</th>
                                            <th>Telefone</th>
                                            <th>Status</th>
                                            <th>Data cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parceiros as $p)
                                            @if ($p->id != 1)
                                                <tr>
                                                    <td>
                                                        @if ($p->tipo == 1)
                                                            Pessoa Física
                                                        @else
                                                            Pessoa Jurídica
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($p->cnpj)
                                                            {{ $p->cnpj }}
                                                        @else
                                                            {{ $p->cpf }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $p->apelido }}</td>
                                                    <td>{{ $p->telefone }}</td>
                                                    @if ($p->status == 1)
                                                        <td class="badge bg-success">Ativo</td>
                                                    @else
                                                        <td class="badge bg-danger">Inativo</td>
                                                    @endif
                                                    <td>{{ $p->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('editar-parceiro', $p->id) }}"><i
                                                                class="far fa-edit"></i> Editar</a>
                                                    </td>
                                                </tr>
                                            @endif
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
    <script>
        $("#input-busca").on('keyup', function() {
            let filtro = $(this).val();

            $("#filtra-busca").attr('href', '/sistema/parceiros/' + filtro);
        })
        $("#filtro-banco").on('change', function() {
            let filtro = $(this).val();
            console.log(filtro)
            $("#filtra-busca").attr('href', '/sistema/parceiros/' + filtro);
            window.location.href = '/sistema/parceiros/' + filtro;
        })
        $(document).ready(function() {
            $('.table').DataTable({
                lengthChange: false,
                searching: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json'
                }
            });
        });
    </script>
@endsection
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
