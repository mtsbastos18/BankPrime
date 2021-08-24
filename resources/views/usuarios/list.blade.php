@extends('layouts.master')


@section('breadcrumb')
              <li class="breadcrumb-item active">Usuários</li>
@endsection

@section('content')
 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-12 col-md-2">
                <a href="{{ route('novo-usuario') }}" class="btn btn-block btn-outline-primary">Novo usuário</a>
            </div>
           
            @if (auth()->user()->id_parceiro == 1)
                <div class="col-12 col-md-7 d-flex">
                    <div class="col-4 text-right pr-0">
                    <p>Filtrar por parceiro:</p>
                    </div>
                        <div class="col-5">
                        <select name="id_parceiro" id="id_parceiro" class="custom-select form-control form-control-border">
                            <option value="">Selecione</option>
                            @foreach ($parceiros as $p)
                                @if ($idParceiro == $p->id) 
                                    <option value="{{$p->id}}" selected>{{$p->apelido}}</option>
                                @else 
                                    <option value="{{$p->id}}">{{$p->apelido}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-block btn-outline-primary" id="filtra-busca">Filtrar</a>
                        </div>
                    </form>
                </div>
            
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card card-navy ">
                    <div class="card-header">
                        <h3 class="card-title">
                            Lista de usuários
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
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th>Telefone</th>
                                        <th>Permissão</th>
                                        <th>Data cadastro</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $u )
                                        <tr>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->login}}</td>
                                            <td>{{$u->telefone}}</td>
                                            <td>{{$u->permissao->permissao}}</td>
                                            <td>{{date_format(new DateTime($u->created_at),'d-m-Y')}}</td>
                                            @if ($u->status == 1) 
                                                <td class="badge bg-success">Ativo</td>
                                            @else 
                                                <td class="badge bg-danger">Inativo</td>
                                            @endif
                                            <td>
                                                <a  href="{{ route('editar-usuario',$u->id) }}"><i class="far fa-edit"></i> Editar</a>
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
$("#id_parceiro").on('change',function(){
    let filtro = $(this).val();

    $("#filtra-busca").attr('href','/usuarios/' + filtro);
})
</script>
@endsection
