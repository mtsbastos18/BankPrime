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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>CPF</th>
                                        <th>Cliente</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                        <th>Situação</th>
                                        <th>Criado em</th>
                                        <th>Atualizado em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($lista as $l)
                                    <tr>
                                        <td>{{$l->cpf}}</td>
                                        <td>{{$l->nome}}</td>
                                        <td>R$ {{$l->valor_financiar}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{date_format(new DateTime($l->created_at),'d-m-Y H:i:s')}}</td>
                                        <td>{{date_format(new DateTime($l->updated_at),'d-m-Y H:i:s')}}</td>
                                        <td>
                                            <a href=""><i class="far fa-edit"></i> Editar</a>
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
@endsection
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

