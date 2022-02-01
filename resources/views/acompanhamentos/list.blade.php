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
                    <p>Clique nas etapas para ocultar as observações</p>

                    <!-- The time line -->
                    <div class="timeline">

                        @foreach ($lista as $l)
                            <div class="time-label">
                                <span class="bg-info">{{ $l->tipo_acompanhamento->descricao }} -
                                    {{ date_format(new DateTime($l->data), 'd/m/Y') }}</span>
                                 @if (auth()->user()->id_permissao == 1) 
                                    <a href="{{ url('excluir-acompanhamento/' . $idProposta . '/' . $l->id) }}"><i class="fas fa-trash"></i></a>
                                 @endif
                            </div>
                            @if (auth()->user()->id_permissao != 3)
                                <div class="detalhes-timeline">

                                    @foreach ($l->observacao as $o)
                                        <i class="
                                    fas fa-clock bg-gray"></i>
                                        <div class="timeline-item mt-2">


                                            <span class="time"><i class="fas fa-clock"></i>
                                                {{ date_format(new DateTime($o->data), 'd/m/Y') }}</span>
                                            <h5 class="timeline-header">{{ $o->nomeUsuario->name }} adicionou uma
                                                observação

                                                <a title="Editar"
                                                    href="{{ url('editar-observacao/' . $idProposta . '/' . $o->id) }}"><i
                                                        class="far fa-edit pull-right"></i> </a>
                                                <a title="Excluir" href="{{ url('excluir-observacao/' . $o->id) }}"><i
                                                        class="far fa-trash-alt pull-right"></i> </a>
                                            </h5>

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

        .timeline>div>.timeline-item>.timeline-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            color: #495057;
            font-size: 13px;
            line-height: 1.1;
            margin: 0;
            padding: 10px;
            font-weight: bold;
        }

    </style>
    <script>
        $(".bg-info").click(function() {
            $('.detalhes-timeline').toggleClass("hide-timeline");
        })
    </script>
@endsection
