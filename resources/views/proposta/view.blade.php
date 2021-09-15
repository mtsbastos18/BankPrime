@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Visualizasr Proposta</li>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card card-navy ">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Situação da proposta
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <select name="processo[status]" readonly
                                            class="custom-select form-control form-control-border" id="">
                                            <option value="1" @if ($processo->status == 1) selected @endif>Em andamento</option>
                                            <option value="2" @if ($processo->status == 2) selected @endif> Aguardando aprovação</option>
                                            <option value="3" @if ($processo->status == 3) selected @endif> Declinou</option>
                                            <option value="4" @if ($processo->status == 4) selected @endif> Registrado</option>
                                            <option value="5" @if ($processo->status == 5) selected @endif> Cancelado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label for="">Url de acompanhamento</label>
                                        <input type="text" onclick="myFunction()" class="form-control form-control-border"
                                            id="link-cliente" readonly
                                            value="{{ url('/acompanhamento-cliente', $processo->id) }}">
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
                                        <label>CPF</label>
                                        <p>{{ $comprador->cpf }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Nome</label>
                                        <p>{{ $comprador->nome }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Sexo</label>
                                        @if ($comprador->sexo == 1) <p>Masculino</p> @endif
                                        @if ($comprador->sexo == 2) <p>Feminino</p> @endif

                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <p>{{ $comprador->pais }}</p>

                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <p>{{ $comprador->naturalidade }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <p>{{ $comprador->tipo_documento }}</p>

                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <p>{{ $comprador->num_documento }}</p>
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <p>{{ $comprador->orgao_emissor }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        @foreach ($ufs as $k => $v)
                                            @if ($comprador->estado_documento == $k)
                                                <p>{{ $v }}</p>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-4">
                                        <label>Data emissão</label>
                                        <p>{{ $comprador->data_emissao }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Regime de bens</label>
                                        @if ($comprador->regime_bens == 1) <p>Comunhão parcial de bens</p> @endif
                                        @if ($comprador->regime_bens == 2) <p>Comunhão Universal de Bens</p> @endif
                                        @if ($comprador->regime_bens == 3) <p>Separação de bens</p> @endif
                                    </div>

                                    <div class="col-6">
                                        <label>Data casamento</label>
                                        <p>{{ $comprador->data_casamento }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CEP Residencial</label>
                                        <p>{{ $enderecoComprador->cep }}</p>
                                    </div>

                                    <div class="col-5">
                                        <label>Endereço residencial</label>
                                        <p>{{ $enderecoComprador->logradouro }}</p>
                                    </div>

                                    <div class="col-2">
                                        <label>Número</label>
                                        <p>{{ $enderecoComprador->numero }}</p>
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <p>{{ $enderecoComprador->complemento }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <p>{{ $enderecoComprador->bairro }}</p>
                                    </div>

                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <p>{{ $enderecoComprador->cidade }}</p>
                                    </div>

                                    <div class="col-4">
                                        <label>Estado</label>
                                        @foreach ($ufs as $k => $v)
                                            @if ($enderecoComprador->uf == $k)
                                                <p>$v</p>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <p>{{ $enderecoComprador->telefone }}</p>
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <p>{{ $enderecoComprador->celular }}</p>
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <p>{{ $comprador->email }}</p>
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
                                        <p>{{ $profissaoComprador->nome_empresa }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        @if ($profissaoComprador->contratacao == 1) <p>Assalariado</p> @endif
                                        @if ($profissaoComprador->contratacao == 2) <p>Aposentado</p> @endif
                                        @if ($profissaoComprador->contratacao == 3) <p>Sócio Proprietário</p> @endif
                                        @if ($profissaoComprador->contratacao == 4) <p>Autônomo</p> @endif
                                        @if ($profissaoComprador->contratacao == 5) <p>Profissional liberal</p> @endif
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <p>{{ $profissaoComprador->admissao }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <p>{{ $profissaoComprador->cargo }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <p>{{ $profissaoComprador->renda_mensal }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <p>{{ $profissaoComprador->outra_renda_mensal }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <p>{{ $profissaoComprador->origem_renda }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if ($conjugeComprador)
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
                                            <p>{{ $conjugeComprador->nome }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Sexo</label>
                                            @if ($conjugeComprador->sexo == 1) <p>Masculino</p> @endif
                                            @if ($conjugeComprador->sexo == 2) <p>Feminino</p> @endif
                                        </div>
                                        <div class="col-4">
                                            <label>Nome da mãe</label>
                                            <p>{{ $conjugeComprador->nome_mae }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Nacionalidade</label>
                                            <p>{{ $conjugeComprador->pais }}</p>
                                        </div>
                                        <div class="col-6">
                                            <label>Naturalidade</label>
                                            <p>{{ $conjugeComprador->naturalidade }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Documento</label>
                                            <p>{{ $conjugeComprador->tipo_documento }}</p>
                                        </div>
                                        <div class="col-6">
                                            <label>Nº Documento</label>
                                            <p>{{ $conjugeComprador->num_documento }}</p>
                                        </div>

                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Órgão expedidor</label>
                                            <p>{{ $conjugeComprador->orgao_emissor }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>UF emissão</label>
                                            @foreach ($ufs as $k => $v)
                                                @if ($conjugeComprador->estado_documento == $k)
                                                    <p>{{ $v }}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-4">
                                            <label>Data emissão</label>
                                            <p>{{ $conjugeComprador->data_emissao }}</p>
                                        </div>
                                    </div>



                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Telefone</label>
                                            <p>{{ $conjugeComprador->telefone }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>Celular</label>
                                            <p>{{ $conjugeComprador->celular }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>E-mail</label>
                                            <p>{{ $conjugeComprador->email }}</p>
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
                                            <p>{{ $conjugeComprador->nome_empresa }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Tipo contratação</label>
                                            @if ($conjugeComprador->contratacao == 1) <p>Assalariado</p> @endif
                                            @if ($conjugeComprador->contratacao == 2) <p>Aposentado</p> @endif
                                            @if ($conjugeComprador->contratacao == 3) <p>Sócio Proprietário</p> @endif
                                            @if ($conjugeComprador->contratacao == 4) <p>Autônomo</p> @endif
                                            @if ($conjugeComprador->contratacao == 5) <p>Profissional Liberal</p> @endif
                                        </div>
                                        <div class="col-4">
                                            <label>Data admissão</label>
                                            <p>{{ $conjugeComprador->admissao }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Cargo</label>
                                            <p>{{ $conjugeComprador->cargo }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Renda mensal</label>
                                            <p>{{ $conjugeComprador->renda_mensal }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Outra renda mensal</label>
                                            <p>{{ $conjugeComprador->outra_renda_mensal }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Origem</label>
                                            <p>{{ $conjugeComprador->origem_renda }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                        {{-- comprador2 --}}
                        @if ($comprador2)

                            <div class="card card-navy ">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Dados Pessoais Comprador
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>CPF</label>
                                            <p>{{ $comprador2->cpf }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Nome</label>
                                            <p>{{ $comprador2->nome }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Sexo</label>
                                            @if ($comprador2->sexo == 1) <p>Masculino</p> @endif
                                            @if ($comprador2->sexo == 2) <p>Feminino</p> @endif

                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Nacionalidade</label>
                                            <p>{{ $comprador2->pais }}</p>

                                        </div>
                                        <div class="col-6">
                                            <label>Naturalidade</label>
                                            <p>{{ $comprador2->naturalidade }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Documento</label>
                                            <p>{{ $comprador2->tipo_documento }}</p>

                                        </div>
                                        <div class="col-6">
                                            <label>Nº Documento</label>
                                            <p>{{ $comprador2->num_documento }}</p>
                                        </div>

                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Órgão expedidor</label>
                                            <p>{{ $comprador2->orgao_emissor }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>UF emissão</label>
                                            @foreach ($ufs as $k => $v)
                                                @if ($comprador2->estado_documento == $k)
                                                    <p>{{ $v }}</p>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-4">
                                            <label>Data emissão</label>
                                            <p>{{ $comprador2->data_emissao }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Regime de bens</label>
                                            @if ($comprador2->regime_bens == 1) <p>Comunhão parcial de bens</p> @endif
                                            @if ($comprador2->regime_bens == 2) <p>Comunhão Universal de Bens</p> @endif
                                            @if ($comprador2->regime_bens == 3) <p>Separação de bens</p> @endif
                                        </div>

                                        <div class="col-6">
                                            <label>Data casamento</label>
                                            <p>{{ $comprador2->data_casamento }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <label>CEP Residencial</label>
                                            <p>{{ $enderecoComprador2->cep }}</p>
                                        </div>

                                        <div class="col-5">
                                            <label>Endereço residencial</label>
                                            <p>{{ $enderecoComprador2->logradouro }}</p>
                                        </div>

                                        <div class="col-2">
                                            <label>Número</label>
                                            <p>{{ $enderecoComprador2->numero }}</p>
                                        </div>
                                        <div class="col-2">
                                            <label>Complemento</label>
                                            <p>{{ $enderecoComprador2->complemento }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Bairro</label>
                                            <p>{{ $enderecoComprador2->bairro }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>Cidade</label>
                                            <p>{{ $enderecoComprador2->cidade }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>Estado</label>
                                            @foreach ($ufs as $k => $v)
                                                @if ($enderecoComprador2->uf == $k)
                                                    <p>$v</p>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Telefone</label>
                                            <p>{{ $enderecoComprador2->telefone }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>Celular</label>
                                            <p>{{ $enderecoComprador2->celular }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label>E-mail</label>
                                            <p>{{ $comprador2->email }}</p>
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
                                            <p>{{ $profissaoComprador2->nome_empresa }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Tipo contratação</label>
                                            @if ($profissaoComprador2->contratacao == 1) <p>Assalariado</p> @endif
                                            @if ($profissaoComprador2->contratacao == 2) <p>Aposentado</p> @endif
                                            @if ($profissaoComprador2->contratacao == 3) <p>Sócio Proprietário</p> @endif
                                            @if ($profissaoComprador2->contratacao == 4) <p>Autônomo</p> @endif
                                            @if ($profissaoComprador2->contratacao == 5) <p>Profissional liberal</p> @endif
                                        </div>
                                        <div class="col-4">
                                            <label>Data admissão</label>
                                            <p>{{ $profissaoComprador2->admissao }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Cargo</label>
                                            <p>{{ $profissaoComprador2->cargo }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Renda mensal</label>
                                            <p>{{ $profissaoComprador2->renda_mensal }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Outra renda mensal</label>
                                            <p>{{ $profissaoComprador2->outra_renda_mensal }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Origem</label>
                                            <p>{{ $profissaoComprador2->origem_renda }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @if ($conjugeComprador)
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
                                                <p>{{ $conjugeComprador2->nome }}</p>
                                            </div>
                                            <div class="col-4">
                                                <label>Sexo</label>
                                                @if ($conjugeComprador2->sexo == 1) <p>Masculino</p> @endif
                                                @if ($conjugeComprador2->sexo == 2) <p>Feminino</p> @endif
                                            </div>
                                            <div class="col-4">
                                                <label>Nome da mãe</label>
                                                <p>{{ $conjugeComprador2->nome_mae }}</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label>Nacionalidade</label>
                                                <p>{{ $conjugeComprador2->pais }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label>Naturalidade</label>
                                                <p>{{ $conjugeComprador2->naturalidade }}</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label>Documento</label>
                                                <p>{{ $conjugeComprador2->tipo_documento }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label>Nº Documento</label>
                                                <p>{{ $conjugeComprador2->num_documento }}</p>
                                            </div>

                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label>Órgão expedidor</label>
                                                <p>{{ $conjugeComprador2->orgao_emissor }}</p>
                                            </div>
                                            <div class="col-4">
                                                <label>UF emissão</label>
                                                @foreach ($ufs as $k => $v)
                                                    @if ($conjugeComprador2->estado_documento == $k)
                                                        <p>{{ $v }}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-4">
                                                <label>Data emissão</label>
                                                <p>{{ $conjugeComprador2->data_emissao }}</p>
                                            </div>
                                        </div>



                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label>Telefone</label>
                                                <p>{{ $conjugeComprador2->telefone }}</p>
                                            </div>

                                            <div class="col-4">
                                                <label>Celular</label>
                                                <p>{{ $conjugeComprador2->celular }}</p>
                                            </div>

                                            <div class="col-4">
                                                <label>E-mail</label>
                                                <p>{{ $conjugeComprador2->email }}</p>
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
                                                <p>{{ $conjugeComprador2->nome_empresa }}</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label>Tipo contratação</label>
                                                @if ($conjugeComprador2->contratacao == 1) <p>Assalariado</p> @endif
                                                @if ($conjugeComprador2->contratacao == 2) <p>Aposentado</p> @endif
                                                @if ($conjugeComprador2->contratacao == 3) <p>Sócio Proprietário</p> @endif
                                                @if ($conjugeComprador2->contratacao == 4) <p>Autônomo</p> @endif
                                                @if ($conjugeComprador2->contratacao == 5) <p>Profissional Liberal</p> @endif
                                            </div>
                                            <div class="col-4">
                                                <label>Data admissão</label>
                                                <p>{{ $conjugeComprador2->admissao }}</p>
                                            </div>
                                            <div class="col-4">
                                                <label>Cargo</label>
                                                <p>{{ $conjugeComprador2->cargo }}</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label>Renda mensal</label>
                                                <p>{{ $conjugeComprador2->renda_mensal }}</p>
                                            </div>
                                            <div class="col-4">
                                                <label>Outra renda mensal</label>
                                                <p>{{ $conjugeComprador2->outra_renda_mensal }}</p>
                                            </div>
                                            <div class="col-4">
                                                <label>Origem</label>
                                                <p>{{ $conjugeComprador2->origem_renda }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endif
                        {{-- comprador2 --}}
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
                                        <p>{{ $processo->valor_operacao }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Valor a financiar</label>
                                        <p>{{ $processo->valor_financiar }}</p>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox">
                                            @if ($processo->utiliza_fgts == 1)
                                                <input class="custom-control-input" type="checkbox" id="utilizar_fgts"
                                                    name="processo[utiliza_fgts]" value="1" disabled checked>
                                            @endif
                                            <label for="utilizar_fgts" class="custom-control-label">Utilizar FGTS</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox">
                                            @if ($processo->financiar_despesas == 1)
                                                <input class="custom-control-input" type="checkbox" id="financiar_despesas"
                                                    name="processo[financiar_despesas]" value="1" disabled checked>
                                            @endif
                                            <label for="financiar_despesas" class="custom-control-label">Financiar
                                                Despesas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">

                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            @if ($processo->financiar_avaliacao == 1)
                                                <input class="custom-control-input" type="checkbox" id="financiar_tarifa"
                                                    name="processo[financiar_avaliacao]" value="1" disabled checked>
                                            @endif
                                            <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa de
                                                Avaliação</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="col-4">
                                        <label>Recursos Próprios</label>
                                        <p>{{ $processo->recursos_proprios }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Valor FGTS</label>
                                        <p>{{ $processo->fgts }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Valor de entrada total</label>
                                        <p>{{ $processo->valor_total_entrada }}</p>
                                    </div>
                                </div>


                                <div class="row mt-2">

                                    <div class="col-5">
                                        <label>Valor total financiado</label>
                                        <p>{{ $processo->valor_total_financiado }}</p>
                                    </div>

                                    <div class="col-1 mr-2">
                                        <div class="custom-control custom-radio">
                                            @php
                                                $checked1 = '';
                                                $checked2 = '';
                                                $checked3 = '';
                                                $checked4 = '';
                                                $checked5 = '';
                                                
                                                if ($processo->tipo_imovel == 1) {
                                                    $checked1 = 'checked';
                                                } elseif ($processo->tipo_imovel == 2) {
                                                    $checked2 = 'checked';
                                                } elseif ($processo->tipo_imovel == 3) {
                                                    $checked3 = 'checked';
                                                } elseif ($processo->tipo_imovel == 4) {
                                                    $checked4 = 'checked';
                                                } elseif ($processo->tipo_imovel == 5) {
                                                    $checked5 = 'checked';
                                                }
                                            @endphp


                                            <input class="custom-control-input" type="radio" id="tipo_imovel1"
                                                name="processo[tipo_imovel]" disabled value="1" {{ $checked1 }}>
                                            <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel2"
                                                name="processo[tipo_imovel]" disabled value="2" {{ $checked2 }}>
                                            <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel3"
                                                name="processo[tipo_imovel]" disabled value="3" {{ $checked3 }}>
                                            <label for="tipo_imovel3" class="custom-control-label">Terreno</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel4"
                                                name="processo[tipo_imovel]" disabled value="4" {{ $checked4 }}>
                                            <label for="tipo_imovel4" class="custom-control-label">Construção</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel5"
                                                name="processo[tipo_imovel]" disabled value="5" {{ $checked5 }}>
                                            <label for="tipo_imovel5" class="custom-control-label">Terreno +
                                                Construção</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">


                                    <div class="col-6">
                                        <label>Meses</label>
                                        <p>{{ $processo->meses_financiamento }}</p>
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
                                        @if ($vendedor->tipo == 1) <p>Pessoa Física</p> @endif
                                        @if ($vendedor->tipo == 2) <p>Pessoa Jurídica</p> @endif
                                    </div>
                                </div>

                                <div class="pessoa-fisica" @if ($vendedor->tipo == 2) style="display: none;" @endif>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Nome</label>
                                            <p>{{ $vendedor->nome }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>Estado Civil</label>
                                            @if ($vendedor->estado_civil == 1) <p>Solteiro(a)</p> @endif
                                            @if ($vendedor->estado_civil == 2) <p>Casado(a)</p> @endif
                                            @if ($vendedor->estado_civil == 3) <p>União estável</p> @endif
                                            @if ($vendedor->estado_civil == 4) <p>Divorciado(a)</p> @endif
                                            @if ($vendedor->estado_civil == 5) <p>Viúvo(a)</p> @endif
                                        </div>
                                        <div class="col-4">
                                            <label>CPF</label>
                                            <p>{{ $vendedor->cpf }}</p>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Telefone</label>
                                            <p>{{ $vendedor->telefone }}</p>
                                        </div>

                                        <div class="col-6">
                                            <label>Profissão</label>
                                            <p>{{ $vendedor->profissao }}</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <p>{{ $vendedor->banco }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <p>{{ $vendedor->agencia }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <p>{{ $vendedor->conta }}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>

                                            @if ($vendedor->procurador == 1) <p>Sim</p> @endif
                                            @if ($vendedor->procurador == 0) <p>Não</p> @endif
                                        </div>
                                    </div>

                                    <div class="sessao-procurador-1" @if ($vendedor->procurador == 0)
                                        style="display:none;" @endif>


                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">Nome Procurador</label>
                                                <p>{{ $vendedor->nome_procurador }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <p>{{ $vendedor->cpf_procurador }}</p>

                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <p>{{ $vendedor->email_procurador }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone Procurador</label>
                                                <p>{{ $vendedor->telefone_procurador }}</p>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div class="pessoa-juridica" @if ($vendedor->tipo == 1) style="display: none;" @endif>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Razão social</label>
                                            <p>{{ $vendedor->nome }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label>CNPJ</label>
                                            <p>{{ $vendedor->cnpj }}</p>
                                        </div>
                                        <div class="col-3">
                                            <label>Telefone</label>
                                            <p>{{ $vendedor->telefone }}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <p>{{ $vendedor->banco }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <p>{{ $vendedor->agencia }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <p>{{ $vendedor->conta }}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>

                                            @if ($vendedor->procurador == 1) <p>Sim</p> @endif
                                            @if ($vendedor->procurador == 0) <p>Não</p> @endif
                                        </div>
                                    </div>

                                    <div class="sessao-procurador-2" @if ($vendedor->procurador == 0)
                                        style="display:none;" @endif>


                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">Nome Procurador</label>
                                                <p>{{ $vendedor->nome_procurador }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <p>{{ $vendedor->cpf_procurador }}</p>

                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <p>{{ $vendedor->email_procurador }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone Procurador</label>
                                                <p>{{ $vendedor->telefone_procurador }}</p>
                                            </div>
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
                                        <p>{{ $imovel->cep }}</p>
                                    </div>
                                    <div class="col-5">
                                        <label>Endereço</label>
                                        <p>{{ $imovel->endereco }}</p>
                                    </div>
                                    <div class="col-2">
                                        <label>Número</label>
                                        <p>{{ $imovel->numero }}</p>
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <p>{{ $imovel->complemento }} </p>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <p>{{ $imovel->bairro }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <p>{{ $imovel->cidade }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Estado</label>
                                        @foreach ($ufs as $k => $v)
                                            @if ($imovel->estado == $k)
                                                <p>{{ $v }}</p>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <div class="col-4">
                                        <label>Vagas na garagem</label>
                                        <p>{{ $imovel->vagas }}</p>
                                    </div>

                                    <div class="col-6">
                                        <label>Número(s) vaga(s)</label>
                                        <p>{{ $imovel->numero_vaga }}</p>
                                    </div>



                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Contato de avaliação</label>
                                        <p>{{ $imovel->contato_avaliacao }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label>Telefone do contato</label>
                                        <p>{{ $imovel->telefone_contato }}</p>
                                    </div>

                                    <div class="col-4">
                                        <label>Tipo </label>
                                        @if ($imovel->novo_usado == 1) <p>Novo</p> @endif
                                        @if ($imovel->novo_usado == 2) <p>Usado</p> @endif
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
                                <div class="row">
                                    <div class="col-6">
                                        <label>Banco</label>

                                        @if ($processo->banco == 1) <p>Itaú</p> @endif
                                        @if ($processo->banco == 2)
                                            <p>Bradesco</p>
                                        @endif
                                        @if ($processo->banco == 3)
                                            <p>Santander</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Dia da prestação</label>
                                        <p>{{ $processo->dia_prestacao }}</p>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Sistema de amortização</label>
                                        @if ($processo->amortizacao == 'sac') <p>Sac</p> @endif
                                        @if ($processo->amortizacao == 'price')
                                            <p>Price</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Indexador</label>
                                        @if ($processo->indexador == 1) <p>Poupança</p> @endif
                                        @if ($processo->indexador == 2) <p>TR</p> @endif
                                        @if ($processo->indexador == 3) <p>IPCA</p> @endif
                                        @if ($processo->indexador == 4) <p>Taxa Fixa</p> @endif
                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Parceiro</label>
                                        @foreach ($parceiros as $p)
                                            @if ($p->id != 1)
                                                @if ($processo->id_parceiro == $p->id)
                                                    <p>{{ $p->apelido }}
                                                    </p>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-6">
                                        <label>Corretor</label>
                                        @foreach ($corretores as $c)
                                            @if ($processo->id_corretor == $c->id)
                                                <p>{{ $c->name }}
                                                </p>

                                            @endif
                                        @endforeach
                                    </div>
                                </div>

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
    function tipoVendedor() {
        var tipoVendedor = document.getElementById('vendedor_tipo')

        if (tipoVendedor.value == 1) {
            document.querySelector('.pessoa-juridica').setAttribute('style', 'display:none;')
            $('.pessoa-juridica .form-control').attr('disabled', true)
            $('.pessoa-fisica .form-control').removeAttr('disabled');
            document.querySelector('.pessoa-fisica').removeAttribute('style')
        } else {
            document.querySelector('.pessoa-fisica').setAttribute('style', 'display:none;')
            document.querySelector('.pessoa-juridica').removeAttribute('style')
            $('.pessoa-fisica .form-control').attr('disabled', true)
            $('.pessoa-juridica .form-control').removeAttr('disabled');
        }
    }

    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("link-cliente");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Link copiado para a área de transferência");
    }
</script>
