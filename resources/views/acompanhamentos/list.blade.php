@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Acompanhamento Proposta</li>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-12 col-md-2">
                    <a href="{{ route('novo-acompanhamento', $idProposta) }}"
                        class="btn btn-block btn-outline-primary">Novo</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">

                        @foreach ($lista as $l)
                            <div class="time-label">
                                <span class="bg-info">{{ $l->tipo_acompanhamento->descricao }} -
                                    {{ date_format(new DateTime($l->created_at), 'd/m/Y') }}</span>
                            </div>
                            @if (auth()->user()->id_permissao != 3)
                                <div class="detalhes-timeline">

                                    @foreach ($l->observacao as $o)
                                        <i class="
                                    fas fa-clock bg-gray"></i>
                                        <div class="timeline-item mt-2">
                                            <h3 class="timeline-header">{{ $o->nomeUsuario->name }} adicionou uma
                                                observação
                                            </h3>

                                            <div class="timeline-body">
                                                {{ $o->observacao }}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        @endforeach


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

        .time-label {
            cursor: pointer;
        }

        .time-label .bg-info {
            background-color: #d79c4e !important;
        }

        .detalhes-timeline {}

        .hide-timeline {
            display: none;
        }

    </style>
    <script>
        $(".time-label").click(function() {
            $(this).next().toggleClass("hide-timeline");
        })
    </script>
@endsection
