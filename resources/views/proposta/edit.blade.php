@extends('layouts.master')


@section('breadcrumb')
              <li class="breadcrumb-item active">Editar Proposta</li>
@endsection

@section('content')
 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           
                <div class="col-12">
                 <form method="POST" enctype="multipart/form-data" action="{{ route('atualizar-proposta',$processo->id) }}">
                    @csrf
                    <input type="hidden" name="processo[id]" value="{{$processo->id}}">
                    <input type="hidden" name="imovel[id]" value="{{$imovel->id}}">
                    <input type="hidden" name="vendedor[id]" value="{{$vendedor->id}}">
                    <input type="hidden" name="comprador[id]" value="{{$comprador->id}}">
                    <input type="hidden" name="endereco_comprador[id]" value="{{$enderecoComprador->id}}">
                    <input type="hidden" name="profissao_comprador[id]" value="{{$profissaoComprador->id}}">
                    <input type="hidden" name="conjuge[id]" value="{{$conjugeComprador->id}}">
                    <div class="row justify-content-end mb-2">
                        <div class="col-12 col-md-3 pull-right mt-3">
                            <input type="submit" class="btn btn-block btn-outline-primary" value="Salvar">
                        </div>
                    </div>
                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Situação da proposta
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <select name="processo[status]" class="custom-select form-control form-control-border" id="">
                                        <option value="1" @if ($processo->status == 1) selected @endif>Em andamento</option>
                                        <option value="2" @if ($processo->status == 2) selected @endif> Aguardando aprovação</option>
                                        <option value="3" @if ($processo->status == 3) selected @endif> Declinou</option>
                                        <option value="4" @if ($processo->status == 4) selected @endif> Registrado</option>
                                        <option value="5" @if ($processo->status == 5) selected @endif> Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>  
                    </div> 


                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Cliente(s)
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>CPF comprador </label>
                                    <input type="text" name="comprador[cpf]" value="{{$comprador->cpf}}" id="" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Data de Nascimento</label>
                                    <input type="date" name="comprador[nascimento]" value="{{$comprador->nascimento}}" placeholder="Data de Nascimento" id="" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Estado Civil</label>
                                    <select name="comprador[estado_civil]"  class="custom-select form-control form-control-border" id="">
                                        @foreach ($estadoCivil as $k => $v)
                                            @if ($comprador->estado_civil == $k)
                                                <option value="{{$k}}" selected>{{$v}}</option>
                                            @else
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label>CPF cônjuge 1</label>
                                    <input type="text" name="conjuge[cpf_conjuge]" id="" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Data de Nascimento</label>
                                    <input type="date" name="conjuge[nascimento_conjuge]" placeholder="Data de Nascimento" id="" class="form-control form-control-border">
                                </div>
                                
                            </div>
                        </div>  
                    </div>
                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Valores da Operação
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>Valor Imóvel</label>
                                    <input type="text" value="{{$processo->valor_operacao}}" name="processo[valor_operacao]" id="" placeholder="R$" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Valor a financiar</label>
                                    <input type="text" name="processo[valor_financiar]" value="{{$processo->valor_financiar}}" placeholder="R$" id="" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        @if ($processo->utiliza_fgts == 1)
                                            <input class="custom-control-input" type="checkbox" id="utilizar_fgts" name="processo[utiliza_fgts]" value="1" checked>
                                        @else
                                            <input class="custom-control-input" type="checkbox" id="utilizar_fgts" name="processo[utiliza_fgts]" value="1">
                                        @endif
                                        <label for="utilizar_fgts" class="custom-control-label">Utilizar FGTS</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                    @if ($processo->financiar_despesas == 1)
                                        <input class="custom-control-input" type="checkbox" id="financiar_despesas" name="processo[financiar_despesas]" value="1" checked>
                                    @else
                                        <input class="custom-control-input" type="checkbox" id="financiar_despesas" name="processo[financiar_despesas]" value="1">
                                    @endif
                                        <label for="financiar_despesas" class="custom-control-label">Financiar Despesas</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                
                                <div class="col-3">
                                    <div class="custom-control custom-checkbox">
                                    @if ($processo->financiar_avaliacao == 1)
                                        <input class="custom-control-input" type="checkbox" id="financiar_tarifa" name="processo[financiar_avaliacao]" value="1" checked>
                                    @else
                                        <input class="custom-control-input" type="checkbox" id="financiar_tarifa" name="processo[financiar_avaliacao]" value="1">
                                    @endif
                                        <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa de Avaliação</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                
                                <div class="col-4">
                                    <label>Recursos Próprios</label>
                                    <input type="text" name="processo[recursos_proprios]" value="{{$processo->recursos_proprios}}" placeholder="Valor Recursos Próprios" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>Valor FGTS</label>
                                    <input type="text" name="processo[fgts]" placeholder="Valor FGTS" value="{{$processo->fgts}}" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>Valor de entrada total</label>
                                    <input type="text" name="processo[valor_total_entrada]" value="{{$processo->valor_total_entrada}}" placeholder="Valor Total Entrada" id="" class="form-control form-control-border">
                                </div>
                            </div>


                            <div class="row mt-2">
                                
                                <div class="col-5">
                                    <label>Valor total financiado</label>
                                    <input type="text" name="processo[valor_total_financiado]" value="{{$processo->valor_total_financiado}}" placeholder="Valor total financiado" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>LTV</label>
                                    <input type="text" name="processo[ltv]" value="{{$processo->ltv}}" placeholder="LTV" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-1 mr-2">
                                    <div class="custom-control custom-radio">
                                    @php
                                        $checked1 = "";
                                        $checked2 = "";

                                        if ($processo->tipo_imovel == 1) {
                                            $checked1 = "checked";
                                        }
                                        else {
                                            $checked2 = "checked";
                                        }
                                    @endphp

                                    
                                        <input class="custom-control-input" type="radio" id="tipo_imovel1" name="processo[tipo_imovel]" value="1" {{$checked1}}>
                                        <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="tipo_imovel2" name="processo[tipo_imovel]" value="2" {{$checked2}}>
                                        <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="row mt-3">
                                
                                
                                <div class="col-6">
                                    <label>Meses</label>
                                    <input type="text" name="processo[meses_financiamento]" value="{{$processo->meses_financiamento}}" placeholder="Meses" id="" class="form-control form-control-border"> 
                                </div>
                                
                                <div class="col-6">
                                    <label for="">Estado</label>
                                    <select name="processo[estado]" class="custom-select form-control form-control-border" id="">
                                        @foreach ($ufs as $k => $v)
                                            @if ($processo->estado == $k)
                                                <option value="{{$k}}" selected>{{$v}}</option> 
                                            @else
                                                <option value="{{$k}}">{{$v}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>  
                    </div>   



                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Pessoais Comprador
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>Nome</label>
                                    <input type="text" value="{{$comprador->nome}}" name="comprador[nome]" id="" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Sexo</label>
                                    <select name="comprador[sexo]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1" @if ($comprador->sexo == 1) selected @endif>Masculino</option>
                                        <option value="2" @if ($comprador->sexo == 2) selected @endif>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Nome da mãe</label>
                                    <input type="text" value="{{$comprador->nome_mae}}" name="comprador[nome_mae]" id="" placeholder="Nome da mãe" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nacionalidade</label>
                                     <input type="text" name="comprador[pais]" value="{{$comprador->pais}}" id="" placeholder="Nacionalidade" class="form-control form-control-border">
                                    
                                </div>
                                <div class="col-6">
                                    <label>Naturalidade</label>
                                    <input type="text" name="comprador[naturalidade]" value="{{$comprador->naturalidade}}" id="" placeholder="Naturalidade" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Documento</label>
                                    <input type="text" name="comprador[tipo_documento]" value="{{$comprador->tipo_documento}}" id="" placeholder="Documento" class="form-control form-control-border">
                                    
                                </div>
                                <div class="col-6">
                                    <label>Nº Documento</label>
                                    <input type="text" name="comprador[num_documento]" value="{{$comprador->num_documento}}" id="" placeholder="Nº Documento" class="form-control form-control-border">
                                </div>
                                
                            </div>


                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Órgão expedidor</label>
                                    <input type="text" name="comprador[orgao_emissor]" value="{{$comprador->orgao_emissor}}" id="" placeholder="Órgão expedidor" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>UF emissão</label>
                                    <select name="comprador[estado_documento]" class="custom-select form-control form-control-border" id="">
                                        @foreach ($ufs as $k => $v)
                                            @if ($comprador->estado_documento == $k)
                                                <option value="{{$k}}" selected>{{$v}}</option> 
                                            @else
                                                <option value="{{$k}}">{{$v}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data emissão</label>
                                    <input type="date" name="comprador[data_emissao]" value="{{$comprador->data_emissao}}" id="" placeholder="Data emissão" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Regime de bens</label>
                                    <select name="comprador[regime_bens]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1" @if ($comprador->regime_bens == 1) selected @endif>Comunhão parcial de bens</option>
                                        <option value="2" @if ($comprador->regime_bens == 2) selected @endif>Comunhão Universal de Bens</option>
                                        <option value="3" @if ($comprador->regime_bens == 3) selected @endif>Separação de bens</option>
                                    </select>
                                </div>
                                
                                <div class="col-6">
                                    <label>Data casamento</label>
                                    <input type="date" name="comprador[data_casamento]" value="{{$comprador->data_casamento}}" placeholder="" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3">
                                    <label>CEP Residencial</label>
                                    <input type="text" name="endereco_comprador[cep]" value="{{$enderecoComprador->cep}}" id="" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-5">
                                    <label>Endereço residencial</label>
                                    <input type="text" name="endereco_comprador[logradouro]" value="{{$enderecoComprador->logradouro}}" id="" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-2">
                                    <label>Número</label>
                                    <input type="text" name="endereco_comprador[numero]" value="{{$enderecoComprador->numero}}" placeholder="" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Complemento</label>
                                    <input type="text" name="endereco_comprador[complemento]" value="{{$enderecoComprador->complemento}}" placeholder="" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Bairro</label>
                                    <input type="text" name="endereco_comprador[bairro]" value="{{$enderecoComprador->bairro}}" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-4">
                                    <label>Cidade</label>
                                    <input type="text" name="endereco_comprador[cidade]" value="{{$enderecoComprador->cidade}}" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>Estado</label>
                                    <select name="endereco_comprador[uf]" class="custom-select form-control form-control-border" id="">
                                         @foreach ($ufs as $k => $v)
                                            @if ($enderecoComprador->uf == $k)
                                                <option value="{{$k}}" selected>{{$v}}</option> 
                                            @else
                                                <option value="{{$k}}">{{$v}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Telefone</label>
                                    <input type="text" name="endereco_comprador[telefone]" value="{{$enderecoComprador->telefone}}" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-4">
                                    <label>Celular</label>
                                    <input type="text" name="endereco_comprador[celular]" value="{{$enderecoComprador->celular}}" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>E-mail</label>
                                    <input type="text" name="comprador[email]" value="{{$comprador->email}}" class="form-control form-control-border">
                                </div>

                                
                            </div>


                        </div>  
                    </div>  
                    
                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Profissionais Comprador
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Nome da empresa</label>
                                    <input type="text" name="profissao_comprador[nome_empresa]" value="{{$profissaoComprador->nome_empresa}}" placeholder="Nome da empresa" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Tipo contratação</label>
                                    <select name="profissao_comprador[contratacao]" class="custom-select form-control form-control-border" id="">
                                        <option value="1" @if ($profissaoComprador->contratacao == 1) selected @endif>Assalariado</option>
                                        <option value="2" @if ($profissaoComprador->contratacao == 2) selected @endif>Aposentado</option>
                                        <option value="3" @if ($profissaoComprador->contratacao == 3) selected @endif>Sócio Proprietário</option>
                                        <option value="4" @if ($profissaoComprador->contratacao == 4) selected @endif>Autônomo</option>
                                        <option value="5" @if ($profissaoComprador->contratacao == 5) selected @endif>Profissional liberal</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data admissão</label>
                                    <input type="date" name="profissao_comprador[admissao]" value="{{$profissaoComprador->admissao}}" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Cargo</label>
                                    <input type="text" name="profissao_comprador[cargo]" value="{{$profissaoComprador->cargo}}" placeholder="Cargo" class="form-control form-control-border">
                                </div>
                            </div>

                             <div class="row mt-3">
                                <div class="col-4">
                                    <label>Renda mensal</label>
                                    <input type="text" name="profissao_comprador[renda_mensal]" value="{{$profissaoComprador->renda_mensal}}" placeholder="Renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Outra renda mensal</label>
                                    <input type="text" name="profissao_comprador[outra_renda_mensal]" value="{{$profissaoComprador->outra_renda_mensal}}" placeholder="Outra renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Origem</label>
                                    <input type="text" name="profissao_comprador[origem_renda]" value="{{$profissaoComprador->origem_renda}}" placeholder="Origem" class="form-control form-control-border">
                                </div>
                            </div>

                        </div>  
                    </div> 

                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Pessoais do cônjuge do Comprador 1
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>Nome</label>
                                    <input type="text" name="conjuge[nome]" value="{{$conjugeComprador->nome}}" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Sexo</label>
                                    <select name="conjuge[sexo]" class="custom-select form-control form-control-border" id="">
                                        <option value="1" @if ($conjugeComprador->sexo == 1) selected @endif>Masculino</option>
                                        <option value="2" @if ($conjugeComprador->sexo == 2) selected @endif>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Nome da mãe</label>
                                    <input type="text" name="conjuge[nome_mae]" value="{{$conjugeComprador->nome_mae}}" id="" placeholder="Nome da mãe" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nacionalidade</label>
                                    <input type="text" name="conjuge[pais]" value="{{$conjugeComprador->pais}}" id="" placeholder="Nacionalidade" class="form-control form-control-border">
                                </div>
                                <div class="col-6">
                                    <label>Naturalidade</label>
                                    <input type="text" name="conjuge[naturalidade]" value="{{$conjugeComprador->naturalidade}}" placeholder="Naturalidade" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Documento</label>
                                    <input type="text" name="conjuge[tipo_documento]" value="{{$conjugeComprador->tipo_documento}}" id="" placeholder="Documento" class="form-control form-control-border">
                                </div>
                                <div class="col-6">
                                    <label>Nº Documento</label>
                                    <input type="text" name="conjuge[num_documento]" value="{{$conjugeComprador->num_documento}}" placeholder="Nº Documento" class="form-control form-control-border">
                                </div>
                                
                            </div>


                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Órgão expedidor</label>
                                    <input type="text" name="conjuge[orgao_emissor]" value="{{$conjugeComprador->orgao_emissor}}" placeholder="Órgão expedidor" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>UF emissão</label>
                                    <select name="conjuge[estado_documento]" class="custom-select form-control form-control-border" id="">
                                         @foreach ($ufs as $k => $v)
                                            @if ($conjugeComprador->estado_documento == $k)
                                                <option value="{{$k}}" selected>{{$v}}</option> 
                                            @else
                                                <option value="{{$k}}">{{$v}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data emissão</label>
                                    <input type="date" name="conjuge[data_emissao]" value="{{$conjugeComprador->data_emissao}}" placeholder="Data emissão" class="form-control form-control-border">
                                </div>
                            </div>

                           

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Telefone</label>
                                    <input type="text" name="conjuge[telefone]" value="{{$conjugeComprador->telefone}}" placeholder="Telefone" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-4">
                                    <label>Celular</label>
                                    <input type="text" name="conjuge[celular]" value="{{$conjugeComprador->celular}}" placeholder="Celular" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>E-mail</label>
                                    <input type="text" name="conjuge[email]" value="{{$conjugeComprador->email}}" placeholder="E-mail" class="form-control form-control-border">
                                </div>
                            </div>


                        </div>  
                    </div> 

                     <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados profissionais do cônjuge do comprador
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Nome da empresa</label>
                                    <input type="text" name="conjuge[nome_empresa]" value="{{$conjugeComprador->nome_empresa}}" placeholder="Nome da empresa" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Tipo contratação</label>
                                    <select name="conjuge[contratacao]" class="custom-select form-control form-control-border" id="">
                                        <option value="1"  @if ($conjugeComprador->contratacao == 1) selected @endif>Assalariado</option>
                                        <option value="2"  @if ($conjugeComprador->contratacao == 2) selected @endif>Aposentado</option>
                                        <option value="3"  @if ($conjugeComprador->contratacao == 3) selected @endif>Sócio Proprietário</option>
                                        <option value="4"  @if ($conjugeComprador->contratacao == 4) selected @endif>Autônomo</option>
                                        <option value="5"  @if ($conjugeComprador->contratacao == 5) selected @endif>Profissional liberal</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data admissão</label>
                                    <input type="date" name="conjuge[admissao]" value="{{$conjugeComprador->admissao}}" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Cargo</label>
                                    <input type="text" name="conjuge[cargo]" value="{{$conjugeComprador->cargo}}" placeholder="Cargo" class="form-control form-control-border">
                                </div>
                            </div>

                             <div class="row mt-3">
                                <div class="col-4">
                                    <label>Renda mensal</label>
                                    <input type="text" name="conjuge[renda_mensal]" value="{{$conjugeComprador->renda_mensal}}" placeholder="Renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Outra renda mensal</label>
                                    <input type="text" name="conjuge[outra_renda_mensal]" value="{{$conjugeComprador->outra_renda_mensal}}" placeholder="Outra renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Origem</label>
                                    <input type="text" name="conjuge[origem_renda]" value="{{$conjugeComprador->origem_renda}}" placeholder="Origem" class="form-control form-control-border">
                                </div>
                            </div>

                        </div>  
                    </div>  

                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados dos vendedores
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label>Tipo de vendedor</label>
                                    <select name="vendedor[tipo]" onchange="tipoVendedor()" id="vendedor_tipo" class="custom-select form-control form-control-border" id="">
                                        <option value="1" @if ($vendedor->tipo == 1) selected @endif>Pessoa Física</option>
                                        <option value="2" @if ($vendedor->tipo == 2) selected @endif>Pessoa Jurídica</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pessoa-fisica"  @if ($vendedor->tipo == 2) style="display: none;" @endif >
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Nome</label>
                                        <input type="text" name="vendedor[nome]" value="{{$vendedor->nome}}" placeholder="Nome do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado Civil</label>
                                        <select name="vendedor[estado_civil]" class="custom-select form-control form-control-border" id="">
                                            <option value="1" @if ($vendedor->estado_civil == 1) selected @endif>Solteiro(a)</option>
                                            <option value="2" @if ($vendedor->estado_civil == 2) selected @endif>Casado(a)</option>
                                            <option value="3" @if ($vendedor->estado_civil == 3) selected @endif>União estável</option>
                                            <option value="4" @if ($vendedor->estado_civil == 4) selected @endif>Divorciado(a)</option>
                                            <option value="5" @if ($vendedor->estado_civil == 5) selected @endif>Viúvo(a)</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>CPF</label>
                                        <input type="text" name="vendedor[cpf]" value="{{$vendedor->cpf}}" placeholder="CPF" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>CEP</label>
                                        <input type="text" name="vendedor[cep]" value="{{$vendedor->cep}}" placeholder="CEP do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Endereço</label>
                                        <input type="text" name="vendedor[logradouro]" value="{{$vendedor->endereco}}" placeholder="Endereço do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Número</label>
                                        <input type="text" name="vendedor[numero]" value="{{$vendedor->numero}}" placeholder="Número" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>Complemento</label>
                                        <input type="text" name="vendedor[complemento]" value="{{$vendedor->complemento}}" placeholder="Complemento" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Bairro</label>
                                        <input type="text" name="vendedor[bairro]" value="{{$vendedor->bairro}}" placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Cidade</label>
                                        <input type="text" name="vendedor[cidade]" value="{{$vendedor->cidade}}" placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Estado</label>
                                        <select name="vendedor[uf]" class="custom-select form-control form-control-border" id="">
                                            @foreach ($ufs as $k => $v)
                                                @if ($vendedor->uf == $k)
                                                    <option value="{{$k}}" selected>{{$v}}</option> 
                                                @else
                                                    <option value="{{$k}}">{{$v}}</option> 
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="vendedor[telefone]" value="{{$vendedor->telefone}}" placeholder="Telefone" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Correntista Bradesco</label>
                                        <select name="vendedor[correntista_bradesco]" class="custom-select form-control form-control-border" id="">
                                            <option value="">Selecione</option>
                                            <option value="1" @if ($vendedor->correntista_bradesco == 1) selected @endif>Sim</option>
                                            <option value="0"  @if ($vendedor->correntista_bradesco == 0) selected @endif>Não</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Profissão</label>
                                        <input type="text" name="vendedor[profissao]" value="{{$vendedor->profissao}}" placeholder="Profissão" class="form-control form-control-border">
                                    </div>
                                </div>






                            </div>

                            <div class="pessoa-juridica" @if ($vendedor->tipo == 1) style="display: none;" @endif>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Razão social</label>
                                        <input type="text" name="vendedor[nome]" value={{$vendedor->nome}} placeholder="Razão Social" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>CNPJ</label>
                                        <input type="text" name="vendedor[cnpj]" value={{$vendedor->cnpj}} placeholder="CPF" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>CEP</label>
                                        <input type="text" name="vendedor[cep]" value={{$vendedor->cep}} placeholder="CEP do vendedor" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Endereço</label>
                                        <input type="text" name="vendedor[logradouro]" value={{$vendedor->logradouro}} placeholder="Endereço do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Número</label>
                                        <input type="text" name="vendedor[numero]" value={{$vendedor->numero}} placeholder="Número" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Complemento</label>
                                        <input type="text" name="vendedor[complemento]" value={{$vendedor->complemento}} placeholder="Complemento" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    
                                    <div class="col-3">
                                        <label>Bairro</label>
                                        <input type="text" name="vendedor[bairro]" value={{$vendedor->bairro}} placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Cidade</label>
                                        <input type="text" name="vendedor[cidade]" value={{$vendedor->cidade}} placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Estado</label>
                                        <select name="vendedor[uf]" class="custom-select form-control form-control-border" id="">
                                            @foreach ($ufs as $k => $v)
                                                @if ($vendedor->uf == $k)
                                                    <option value="{{$k}}" selected>{{$v}}</option> 
                                                @else
                                                    <option value="{{$k}}">{{$v}}</option> 
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Telefone</label>
                                        <input type="text" name="vendedor[telefone]" value={{$vendedor->telefone}} placeholder="Telefone" class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>  
                    </div> 


                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados do imóvel
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <label>CEP</label>
                                    <input type="text" name="imovel[cep]" value={{$imovel->cep}} placeholder="CEP do imóvel" class="form-control form-control-border">
                                </div>
                                <div class="col-5">
                                    <label>Endereço</label>
                                    <input type="text" name="imovel[endereco]" value={{$imovel->endereco}} placeholder="Endereço do imóvel" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Número</label>
                                    <input type="text" name="imovel[numero]" value={{$imovel->numero}} placeholder="Número" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Complemento</label>
                                    <input type="text" name="imovel[complemento]" value={{$imovel->complemento}} placeholder="Complemento" class="form-control form-control-border">
                                </div>
                            </div>
                            <div class="row mt-3">
                                    
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="imovel[bairro]" value={{$imovel->bairro}} placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="imovel[cidade]" value={{$imovel->cidade}} placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="imovel[estado]" class="custom-select form-control form-control-border" id="">
                                            @foreach ($ufs as $k => $v)
                                                @if ($imovel->estado == $k)
                                                    <option value="{{$k}}" selected>{{$v}}</option> 
                                                @else
                                                    <option value="{{$k}}">{{$v}}</option> 
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    
                            </div>

                            <div class="row mt-3">
                                    
                                    <div class="col-4">
                                        <label>Vagas na garagem</label>
                                        <input type="number" name="imovel[vagas]" value="{{$imovel->vagas}}" placeholder="Quantidade de vagas" min="0" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Contato de avaliação</label>
                                        <input type="text" name="imovel[contato_avaliacao]" value="{{$imovel->contato_avaliacao}}" placeholder="Contato de avaliação" class="form-control form-control-border">
                                    </div>
                                
                                    
                            </div>
                        </div>  
                    </div> 

                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados da operação
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Sistema de amortização</label>
                                    <select name="estado" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="sac">Sac</option>
                                        <option value="price">Price</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Dia da prestação</label>
                                    <input type="number" min="1" max="31" name="dia_prestacao" id="" placeholder="Dia da prestação" class="form-control form-control-border">
                                </div>
                                
                            </div>
                            
                        </div>  
                    </div> 

                    <div class="row justify-content-end mb-2">
                        <div class="col-12 col-md-3 pull-right mt-3">
                            <input type="submit" class="btn btn-block btn-outline-primary" value="Salvar">
                        </div>
                    </div>
                </form>       

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

<script>
    function tipoVendedor() {
        var tipoVendedor = document.getElementById('vendedor_tipo')

        if (tipoVendedor.value == 1) {
            document.querySelector('.pessoa-juridica').setAttribute('style','display:none;')
            $('.pessoa-juridica .form-control').attr('disabled', true)
            $('.pessoa-fisica .form-control').removeAttr('disabled');
            document.querySelector('.pessoa-fisica').removeAttribute('style')
        } else {
            document.querySelector('.pessoa-fisica').setAttribute('style','display:none;')
            document.querySelector('.pessoa-juridica').removeAttribute('style')
            $('.pessoa-fisica .form-control').attr('disabled', true)
            $('.pessoa-juridica .form-control').removeAttr('disabled');
        }
    }
</script>