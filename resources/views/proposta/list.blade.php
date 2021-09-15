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
                <a href="{{ route('nova-proposta') }}" class="btn btn-block btn-outline-primary">Nova Proposta</a>
            </div>
            <div class="col-12 col-md-10" style="display: flex;justify-content: flex-end;">
                <div class="col-12 col-md-5">
                    <input type="text" name="filtroProposta" id="input-busca" placeholder="Pesquisar" class="form-control form-control-border" id="">
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
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
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
                                        @switch($l->banco)
                                            @case(1)
                                                <td><img src="{{ asset('images/itau.png') }}" style="max-width: 25px;"><span style="visibility:hidden;">{{$l->banco}}</span></td>
                                                @break
                                            @case(2)
                                                <td><img src="{{ asset('images/bradesco.png') }}" style="max-width: 25px;"><span style="visibility:hidden;">{{$l->banco}}</span></td>
                                                @break
                                            @case(3)
                                                <td><img src="{{ asset('images/santander.png') }}" style="max-width: 25px;"><span style="visibility:hidden;">{{$l->banco}}</span></td>
                                                @break
                                            @default
                                                
                                        @endswitch

                                        <td>{{$l->cpf}}</td>
                                        <td>{{$l->nome}}</td>
                                        
                                        @switch($l->status)
                                            @case(1)
                                            <td >
                                                <a class="badge bg-info">Em andamento</a>
                                            </td>
                                                @break
                                            @case(2)
                                            <td class="badge bg-secondary">
                                                Aguardando aprovação
                                            </td>
                                                @break
                                            @case(3)
                                            <td class="badge bg-warning">
                                                Declinou
                                            </td>
                                                @break
                                            @case(4)
                                            <td class="badge bg-success">
                                                Registrado
                                            </td>
                                                @break
                                            @case(5)
                                            <td class="badge bg-danger">
                                                Cancelado
                                            </td>
                                                @break
                                            @default
                                                
                                        @endswitch
                                        
                                        <td>{{date_format(new DateTime($l->updated_at),'d-m-Y H:i:s')}}</td>
                                        <td class="td-acoes">
                                        <a  href="{{ route('visualizar-proposta',$l->id) }}"><i class="far fa-eye"></i> </a>
                                            <a  href="{{ route('editar-proposta',$l->id) }}"><i class="far fa-edit"></i> </a>
                                            @if (auth()->user()->id_permissao == 1)
                                                <a  href="{{ route('acompanhamentos',$l->id) }}"><i class="fas fa-briefcase"></i></a>
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
.card-header{ 
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
$("#input-busca").on('keyup',function(){
    let filtro = $(this).val();

    $("#filtra-busca").attr('href','/propostas/' + filtro);
})

$(document).ready(function() {
    $('#tabela-lista').DataTable({
        lengthChange: false,
        searching: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json'
        }
    });
} );
</script>

@endsection

