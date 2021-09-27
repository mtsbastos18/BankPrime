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
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('atualizar-proposta', $processo->id) }}">
                        @csrf
                        <input type="hidden" name="processo[id]" value="{{ $processo->id }}">
                        <input type="hidden" name="imovel[id]" value="{{ $imovel->id }}">
                        <input type="hidden" name="vendedor[id]" value="{{ $vendedor->id }}">
                        <input type="hidden" name="comprador[id]" value="{{ $comprador->id }}">
                        <input type="hidden" name="endereco_comprador[id]" value="{{ $enderecoComprador->id }}">
                        <input type="hidden" name="profissao_comprador[id]" value="{{ $profissaoComprador->id }}">
                        @if ($conjugeComprador)
                            <input type="hidden" name="conjuge[id]" value="{{ $conjugeComprador->id }}">
                        @endif

                        @if ($comprador2)
                            <input type="hidden" name="comprador2[id]" value="{{ $comprador2->id }}">
                            <input type="hidden" name="endereco_comprador2[id]" value="{{ $enderecoComprador2->id }}">
                            <input type="hidden" name="profissao_comprador2[id]" value="{{ $profissaoComprador2->id }}">
                            @if ($conjugeComprador2)
                                <input type="hidden" name="conjuge2[id]" value="{{ $conjugeComprador2->id }}">
                            @endif
                        @endif

                        @if ($comprador3)
                            <input type="hidden" name="comprador3[id]" value="{{ $comprador3->id }}">
                            <input type="hidden" name="endereco_comprador3[id]" value="{{ $enderecoComprador3->id }}">
                            <input type="hidden" name="profissao_comprador3[id]" value="{{ $profissaoComprador3->id }}">
                            @if ($conjugeComprador3)
                                <input type="hidden" name="conjuge3[id]" value="{{ $conjugeComprador3->id }}">
                            @endif
                        @endif

                        @if ($vendedor2)
                            <input type="hidden" name="vendedor2[id]" value="{{ $vendedor2->id }}">

                        @endif

                        <div class="row justify-content-end mb-2">
                            <div class="col-12 col-md-3 col-lg-2 pull-right mt-3">
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
                                        <select name="processo[status]"
                                            class="custom-select form-control form-control-border">
                                            <option value="1" @if ($processo->status == 1) selected @endif>Em andamento
                                            </option>
                                            <option value="2" @if ($processo->status == 2) selected @endif> Aguardando
                                                aprovação</option>
                                            <option value="3" @if ($processo->status == 3) selected @endif> Declinou
                                            </option>
                                            <option value="4" @if ($processo->status == 4) selected @endif> Registrado
                                            </option>
                                            <option value="5" @if ($processo->status == 5) selected @endif> Cancelado
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Pessoais Comprador 1
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label>CPF</label>
                                        <input type="text" value="{{ $comprador->cpf }}" name="comprador[cpf]"
                                            placeholder="CPF" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="comprador[nascimento]" placeholder="Data de Nascimento"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado Civil</label>
                                        <select name="comprador[estado_civil]" onchange="setEstadoCivil()"
                                            class="custom-select form-control form-control-border" id="estado-civil-1">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ $comprador->estado_civil == 1 ? 'selected' : '' }}>
                                                Solteiro(a)</option>
                                            <option value="2" {{ $comprador->estado_civil == 2 ? 'selected' : '' }}>
                                                Casado(a)</option>
                                            <option value="3" {{ $comprador->estado_civil == 3 ? 'selected' : '' }}>União
                                                estável</option>
                                            <option value="4" {{ $comprador->estado_civil == 4 ? 'selected' : '' }}>
                                                Divorciado(a)</option>
                                            <option value="5" {{ $comprador->estado_civil == 5 ? 'selected' : '' }}>
                                                Viúvo(a)</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nome</label>
                                        <input type="text" value="{{ $comprador->nome }}" name="comprador[nome]"
                                            placeholder="Nome" class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Sexo</label>
                                        <select name="comprador[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1" @if ($comprador->sexo == 1) selected @endif>Masculino</option>
                                            <option value="2" @if ($comprador->sexo == 2) selected @endif>Feminino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="comprador[pais]" value="{{ $comprador->pais }}"
                                            placeholder="Nacionalidade" class="form-control form-control-border">

                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="comprador[naturalidade]"
                                            value="{{ $comprador->naturalidade }}" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <input type="text" name="comprador[tipo_documento]"
                                            value="{{ $comprador->tipo_documento }}" placeholder="Documento"
                                            class="form-control form-control-border">

                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="comprador[num_documento]"
                                            value="{{ $comprador->num_documento }}" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="comprador[orgao_emissor]"
                                            value="{{ $comprador->orgao_emissor }}" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="comprador[estado_documento]"
                                            class="custom-select form-control form-control-border">
                                            @foreach ($ufs as $k => $v)
                                                @if ($comprador->estado_documento == $k)
                                                    <option value="{{ $k }}" selected>{{ $v }}
                                                    </option>
                                                @else
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data emissão</label>
                                        <input type="date" name="comprador[data_emissao]"
                                            value="{{ $comprador->data_emissao }}" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3 dados-casamento-1" @if ($comprador->estado_civil != 2 && $comprador->estado_civil != 3)
                                    style="display:none;"
                                    @endif>
                                    <div class="col-6">
                                        <label>Regime de bens</label>
                                        <select name="comprador[regime_bens]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1" @if ($comprador->regime_bens == 1) selected @endif>Comunhão
                                                parcial de bens</option>
                                            <option value="2" @if ($comprador->regime_bens == 2) selected @endif>Comunhão
                                                Universal de Bens</option>
                                            <option value="3" @if ($comprador->regime_bens == 3) selected @endif>Separação
                                                de bens</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Data casamento</label>
                                        <input type="date" name="comprador[data_casamento]"
                                            value="{{ $comprador->data_casamento }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CEP Residencial</label>
                                        <input type="text" name="endereco_comprador[cep]"
                                            value="{{ $enderecoComprador->cep }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-5">
                                        <label>Endereço residencial</label>
                                        <input type="text" name="endereco_comprador[logradouro]"
                                            value="{{ $enderecoComprador->logradouro }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-2">
                                        <label>Número</label>
                                        <input type="text" name="endereco_comprador[numero]"
                                            value="{{ $enderecoComprador->numero }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <input type="text" name="endereco_comprador[complemento]"
                                            value="{{ $enderecoComprador->complemento }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="endereco_comprador[bairro]"
                                            value="{{ $enderecoComprador->bairro }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="endereco_comprador[cidade]"
                                            value="{{ $enderecoComprador->cidade }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="endereco_comprador[uf]"
                                            class="custom-select form-control form-control-border">
                                            @foreach ($ufs as $k => $v)
                                                @if ($enderecoComprador->uf == $k)
                                                    <option value="{{ $k }}" selected>{{ $v }}
                                                    </option>
                                                @else
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="endereco_comprador[telefone]"
                                            value="{{ $enderecoComprador->telefone }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="endereco_comprador[celular]"
                                            value="{{ $enderecoComprador->celular }}" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="comprador[email]" value="{{ $comprador->email }}"
                                            class="form-control form-control-border">
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
                                        <input type="text" name="profissao_comprador[nome_empresa]"
                                            value="{{ $profissaoComprador->nome_empresa }}" placeholder="Nome da empresa"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="profissao_comprador[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="1" @if ($profissaoComprador->contratacao == 1) selected
                                                @endif>Assalariado</option>
                                            <option value="2" @if ($profissaoComprador->contratacao == 2) selected
                                                @endif>Aposentado</option>
                                            <option value="3" @if ($profissaoComprador->contratacao == 3) selected
                                                @endif>Sócio Proprietário</option>
                                            <option value="4" @if ($profissaoComprador->contratacao == 4) selected
                                                @endif>Autônomo</option>
                                            <option value="5" @if ($profissaoComprador->contratacao == 5) selected
                                                @endif>Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="profissao_comprador[admissao]"
                                            value="{{ $profissaoComprador->admissao }}"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="profissao_comprador[cargo]"
                                            value="{{ $profissaoComprador->cargo }}" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="profissao_comprador[renda_mensal]"
                                            value="{{ $profissaoComprador->renda_mensal }}" placeholder="Renda mensal"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="profissao_comprador[outra_renda_mensal]"
                                            value="{{ $profissaoComprador->outra_renda_mensal }}"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="profissao_comprador[origem_renda]"
                                            value="{{ $profissaoComprador->origem_renda }}" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- conjuge 1 --}}
                        @if ($conjugeComprador)
                            <div class="card card-navy conjuge1" @if ($comprador->estado_civil != 2 && $comprador->estado_civil != 3)
                                style="display:none;"
                        @endif>
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Pessoais do cônjuge do Comprador 1
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>Nome</label>
                                    <input type="text" name="conjuge[nome]" value="{{ $conjugeComprador->nome }}"
                                        placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Sexo</label>
                                    <select name="conjuge[sexo]" class="custom-select form-control form-control-border">
                                        <option value="1" @if ($conjugeComprador->sexo == 1) selected @endif>Masculino
                                        </option>
                                        <option value="2" @if ($conjugeComprador->sexo == 2) selected @endif>Feminino
                                        </option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Nome da mãe</label>
                                    <input type="text" name="conjuge[nome_mae]" value="{{ $conjugeComprador->nome_mae }}"
                                        placeholder="Nome da mãe" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nacionalidade</label>
                                    <input type="text" name="conjuge[pais]" value="{{ $conjugeComprador->pais }}"
                                        placeholder="Nacionalidade" class="form-control form-control-border">
                                </div>
                                <div class="col-6">
                                    <label>Naturalidade</label>
                                    <input type="text" name="conjuge[naturalidade]"
                                        value="{{ $conjugeComprador->naturalidade }}" placeholder="Naturalidade"
                                        class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Documento</label>
                                    <input type="text" name="conjuge[tipo_documento]"
                                        value="{{ $conjugeComprador->tipo_documento }}" placeholder="Documento"
                                        class="form-control form-control-border">
                                </div>
                                <div class="col-6">
                                    <label>Nº Documento</label>
                                    <input type="text" name="conjuge[num_documento]"
                                        value="{{ $conjugeComprador->num_documento }}" placeholder="Nº Documento"
                                        class="form-control form-control-border">
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Órgão expedidor</label>
                                    <input type="text" name="conjuge[orgao_emissor]"
                                        value="{{ $conjugeComprador->orgao_emissor }}" placeholder="Órgão expedidor"
                                        class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>UF emissão</label>
                                    <select name="conjuge[estado_documento]"
                                        class="custom-select form-control form-control-border">
                                        @foreach ($ufs as $k => $v)
                                            @if ($conjugeComprador->estado_documento == $k)
                                                <option value="{{ $k }}" selected>{{ $v }}
                                                </option>
                                            @else
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data emissão</label>
                                    <input type="date" name="conjuge[data_emissao]"
                                        value="{{ $conjugeComprador->data_emissao }}" placeholder="Data emissão"
                                        class="form-control form-control-border">
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Telefone</label>
                                    <input type="text" name="conjuge[telefone]" value="{{ $conjugeComprador->telefone }}"
                                        placeholder="Telefone" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>Celular</label>
                                    <input type="text" name="conjuge[celular]" value="{{ $conjugeComprador->celular }}"
                                        placeholder="Celular" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>E-mail</label>
                                    <input type="text" name="conjuge[email]" value="{{ $conjugeComprador->email }}"
                                        placeholder="E-mail" class="form-control form-control-border">
                                </div>
                            </div>


                        </div>
                </div>

                <div class="card card-navy conjuge1" @if ($comprador->estado_civil != 2 && $comprador->estado_civil != 3)
                    style="display:none;"
                    @endif>
                    <div class="card-header">
                        <h3 class="card-title">
                            Dados profissionais do cônjuge do comprador
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label>Nome da empresa</label>
                                <input type="text" name="conjuge[nome_empresa]"
                                    value="{{ $conjugeComprador->nome_empresa }}" placeholder="Nome da empresa"
                                    class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Tipo contratação</label>
                                <select name="conjuge[contratacao]" class="custom-select form-control form-control-border">
                                    <option value="1" {{ $conjugeComprador->contratacao == 1 ? 'selected' : '' }}>
                                        Assalariado
                                    </option>
                                    <option value="2" {{ $conjugeComprador->contratacao == 2 ? 'selected' : '' }}>
                                        Aposentado</option>
                                    <option value="3" {{ $conjugeComprador->contratacao == 3 ? 'selected' : '' }}>Sócio
                                        Proprietário</option>
                                    <option value="4" {{ $conjugeComprador->contratacao == 4 ? 'selected' : '' }}>
                                        Autônomo
                                    </option>
                                    <option value="5" {{ $conjugeComprador->contratacao == 5 ? 'selected' : '' }}>
                                        Profissional liberal</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Data admissão</label>
                                <input type="date" name="conjuge[admissao]" value="{{ $conjugeComprador->admissao }}"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Cargo</label>
                                <input type="text" name="conjuge[cargo]" value="{{ $conjugeComprador->cargo }}"
                                    placeholder="Cargo" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Renda mensal</label>
                                <input type="text" name="conjuge[renda_mensal]"
                                    value="{{ $conjugeComprador->renda_mensal }}" placeholder="Renda mensal"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Outra renda mensal</label>
                                <input type="text" name="conjuge[outra_renda_mensal]"
                                    value="{{ $conjugeComprador->outra_renda_mensal }}" placeholder="Outra renda mensal"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Origem</label>
                                <input type="text" name="conjuge[origem_renda]"
                                    value="{{ $conjugeComprador->origem_renda }}" placeholder="Origem"
                                    class="form-control form-control-border">
                            </div>
                        </div>

                    </div>
                    {{-- conjuge 1 --}}

                </div>

            @else
                <div class="card card-navy conjuge1" style="display:none;">
                    <div class="card-header">
                        <h3 class="card-title">
                            Dados Pessoais do cônjuge do Comprador 1
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-4">
                                <label>CPF cônjuge 1</label>
                                <input type="text" value="{{ old('conjuge.cpf') }}" name="conjuge[cpf]" placeholder="CPF"
                                    class="form-control form-control-border cpf">
                            </div>
                            <div class="col-4">
                                <label>Data de Nascimento</label>
                                <input type="date" value="{{ old('conjuge.data_nascimento') }}"
                                    name="conjuge[data_nascimento]" placeholder="Data de Nascimento"
                                    class="form-control form-control-border">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Nome</label>
                                <input type="text" value="{{ old('conjuge.nome') }}" name="conjuge[nome]"
                                    placeholder="Nome" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Sexo</label>
                                <select name="conjuge[sexo]" class="custom-select form-control form-control-border">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ old('conjuge.sexo') == 1 ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <option value="2" {{ old('conjuge.sexo') == 2 ? 'selected' : '' }}>
                                        Feminino
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Nome da mãe</label>
                                <input type="text" value="{{ old('conjuge.nome_mae') }}" name="conjuge[nome_mae]"
                                    placeholder="Nome da mãe" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label>Nacionalidade</label>
                                <input value="{{ old('conjuge.pais') }}" type="text" name="conjuge[pais]"
                                    placeholder="Nacionalidade" class="form-control form-control-border">

                            </div>
                            <div class="col-6">
                                <label>Naturalidade</label>
                                <input value="{{ old('conjuge.naturalidade') }}" type="text" name="conjuge[naturalidade]"
                                    placeholder="Naturalidade" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label>Documento</label>
                                <input value="{{ old('conjuge.tipo_documento') }}" type="text"
                                    name="comprador[tipo_documento]" placeholder="Documento"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-6">
                                <label>Nº Documento</label>
                                <input value="{{ old('conjuge.num_documento') }}" type="text"
                                    name="conjuge[num_documento]" placeholder="Nº Documento"
                                    class="form-control form-control-border">
                            </div>

                        </div>


                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Órgão expedidor</label>
                                <input value="{{ old('conjuge.orgao_emissor') }}" type="text"
                                    name="conjuge[orgao_emissor]" placeholder="Órgão expedidor"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>UF emissão</label>
                                <select name="conjuge[estado_documento]"
                                    class="custom-select form-control form-control-border">
                                    <option value="">Selecione</option>
                                    @foreach ($ufs as $k => $v)
                                        @if ($k == 'RS')
                                            <option value="{{ $k }}" selected>{{ $v }}
                                            </option>
                                        @else
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Data emissão</label>
                                <input type="date" value="{{ old('conjuge.data_emissao') }}" name="conjuge[data_emissao]"
                                    placeholder="Data emissão" class="form-control form-control-border">
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Telefone</label>
                                <input type="text" value="{{ old('conjuge.telefone') }}" name="conjuge[telefone]"
                                    placeholder="" class="form-control form-control-border telefone">
                            </div>

                            <div class="col-4">
                                <label>Celular</label>
                                <input type="text" value="{{ old('conjuge.celular') }}" name="conjuge[celular]"
                                    placeholder="" class="form-control form-control-border celular">
                            </div>

                            <div class="col-4">
                                <label>E-mail</label>
                                <input type="text" value="{{ old('conjuge.email') }}" name="conjuge[email]"
                                    placeholder="" class="form-control form-control-border">
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card card-navy conjuge1" style="display:none;">
                    <div class="card-header">
                        <h3 class="card-title">
                            Dados profissionais do cônjuge do comprador 1
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label>Nome da empresa</label>
                                <input type="text" value="{{ old('conjuge.nome_empresa') }}" name="conjuge[nome_empresa]"
                                    placeholder="Nome da empresa" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Tipo contratação</label>
                                <select name="conjuge[contratacao]" class="custom-select form-control form-control-border">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ old('conjuge.contratacao') == 1 ? 'selected' : '' }}>
                                        Assalariado</option>
                                    <option value="2" {{ old('conjuge.contratacao') == 2 ? 'selected' : '' }}>
                                        Aposentado</option>
                                    <option value="3" {{ old('conjuge.contratacao') == 3 ? 'selected' : '' }}>
                                        Sócio Proprietário</option>
                                    <option value="4" {{ old('conjuge.contratacao') == 4 ? 'selected' : '' }}>
                                        Autônomo</option>
                                    <option value="5" {{ old('conjuge.contratacao') == 5 ? 'selected' : '' }}>
                                        Profissional liberal</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Data admissão</label>
                                <input type="date" value="{{ old('conjuge.admissao') }}" name="conjuge[admissao]"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Cargo</label>
                                <input type="text" value="{{ old('conjuge.cargo') }}" name="conjuge[cargo]"
                                    placeholder="Cargo" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Renda mensal</label>
                                <input type="text" value="{{ old('conjuge.renda_mensal') }}"
                                    name="conjuge[renda_mensal]" placeholder="Renda mensal"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Outra renda mensal</label>
                                <input type="text" value="{{ old('conjuge.outra_renda_mensal') }}"
                                    name="conjuge[outra_renda_mensal]" placeholder="Outra renda mensal"
                                    class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Origem</label>
                                <input type="text" value="{{ old('conjuge.origem_renda') }}"
                                    name="conjuge[origem_renda]" placeholder="Origem"
                                    class="form-control form-control-border">
                            </div>
                        </div>

                    </div>
                </div>
                @endif
                {{-- conjuge 1 --}}
                {{-- comprador2 --}}
                @if ($comprador2)

                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Pessoais Comprador 2
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-3 col-lg-2">
                                    <a href="{{ route('excluir-comprador', $comprador2->id) }}"
                                        class="btn btn-block btn-outline-danger">Excluir Comprador</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>CPF</label>
                                    <input type="text" value="{{ $comprador2->cpf }}" name="comprador2[cpf]"
                                        placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Data de Nascimento</label>
                                    <input type="date" name="comprador2[nascimento]" placeholder="Data de Nascimento"
                                        class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Estado Civil</label>
                                    <select name="comprador2[estado_civil]" onchange="setEstadoCivil2()"
                                        class="custom-select form-control form-control-border" id="estado-civil-2">
                                        <option value="">Selecione</option>
                                        <option value="1" {{ $comprador2->estado_civil == 1 ? 'selected' : '' }}>
                                            Solteiro(a)</option>
                                        <option value="2" {{ $comprador2->estado_civil == 2 ? 'selected' : '' }}>
                                            Casado(a)</option>
                                        <option value="3" {{ $comprador2->estado_civil == 3 ? 'selected' : '' }}>
                                            União
                                            estável</option>
                                        <option value="4" {{ $comprador2->estado_civil == 4 ? 'selected' : '' }}>
                                            Divorciado(a)</option>
                                        <option value="5" {{ $comprador2->estado_civil == 5 ? 'selected' : '' }}>
                                            Viúvo(a)</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nome</label>
                                    <input type="text" value="{{ $comprador2->nome }}" name="comprador2[nome]"
                                        placeholder="Nome" class="form-control form-control-border">
                                </div>
                                <div class="col-6">
                                    <label>Sexo</label>
                                    <select name="comprador2[sexo]" class="custom-select form-control form-control-border">
                                        <option value="">Selecione</option>
                                        <option value="1" @if ($comprador2->sexo == 1) selected @endif>Masculino</option>
                                        <option value="2" @if ($comprador2->sexo == 2) selected @endif>Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nacionalidade</label>
                                    <input type="text" name="comprador2[pais]" value="{{ $comprador2->pais }}"
                                        placeholder="Nacionalidade" class="form-control form-control-border">

                                </div>
                                <div class="col-6">
                                    <label>Naturalidade</label>
                                    <input type="text" name="comprador2[naturalidade]"
                                        value="{{ $comprador2->naturalidade }}" placeholder="Naturalidade"
                                        class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Documento</label>
                                    <input type="text" name="comprador2[tipo_documento]"
                                        value="{{ $comprador2->tipo_documento }}" placeholder="Documento"
                                        class="form-control form-control-border">

                                </div>
                                <div class="col-6">
                                    <label>Nº Documento</label>
                                    <input type="text" name="comprador2[num_documento]"
                                        value="{{ $comprador2->num_documento }}" placeholder="Nº Documento"
                                        class="form-control form-control-border">
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Órgão expedidor</label>
                                    <input type="text" name="comprador2[orgao_emissor]"
                                        value="{{ $comprador2->orgao_emissor }}" placeholder="Órgão expedidor"
                                        class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>UF emissão</label>
                                    <select name="comprador2[estado_documento]"
                                        class="custom-select form-control form-control-border">
                                        @foreach ($ufs as $k => $v)
                                            @if ($comprador2->estado_documento == $k)
                                                <option value="{{ $k }}" selected>{{ $v }}
                                                </option>
                                            @else
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data emissão</label>
                                    <input type="date" name="comprador2[data_emissao]"
                                        value="{{ $comprador2->data_emissao }}" placeholder="Data emissão"
                                        class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3" @if ($comprador2->estado_civil != 2 || $comprador2->estado_civil != 3)
                                style="display:none;"
                @endif>
                <div class="col-6 dados-casamento-2">
                    <label>Regime de bens</label>
                    <select name="comprador2[regime_bens]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" @if ($comprador2->regime_bens == 1) selected @endif>Comunhão
                            parcial de bens</option>
                        <option value="2" @if ($comprador2->regime_bens == 2) selected @endif>Comunhão
                            Universal de Bens</option>
                        <option value="3" @if ($comprador2->regime_bens == 3) selected @endif>Separação
                            de bens</option>
                    </select>
                </div>

                <div class="col-6">
                    <label>Data casamento</label>
                    <input type="date" name="comprador2[data_casamento]" value="{{ $comprador2->data_casamento }}"
                        placeholder="" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3">
                    <label>CEP Residencial</label>
                    <input type="text" name="endereco_comprador2[cep]" value="{{ $enderecoComprador2->cep }}"
                        placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-5">
                    <label>Endereço residencial</label>
                    <input type="text" name="endereco_comprador2[logradouro]"
                        value="{{ $enderecoComprador2->logradouro }}" placeholder=""
                        class="form-control form-control-border">
                </div>

                <div class="col-2">
                    <label>Número</label>
                    <input type="text" name="endereco_comprador2[numero]" value="{{ $enderecoComprador2->numero }}"
                        placeholder="" class="form-control form-control-border">
                </div>
                <div class="col-2">
                    <label>Complemento</label>
                    <input type="text" name="endereco_comprador2[complemento]"
                        value="{{ $enderecoComprador2->complemento }}" placeholder=""
                        class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Bairro</label>
                    <input type="text" name="endereco_comprador2[bairro]" value="{{ $enderecoComprador2->bairro }}"
                        placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Cidade</label>
                    <input type="text" name="endereco_comprador2[cidade]" value="{{ $enderecoComprador2->cidade }}"
                        placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Estado</label>
                    <select name="endereco_comprador2[uf]" class="custom-select form-control form-control-border">
                        @foreach ($ufs as $k => $v)
                            @if ($enderecoComprador2->uf == $k)
                                <option value="{{ $k }}" selected>{{ $v }}
                                </option>
                            @else
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Telefone</label>
                    <input type="text" name="endereco_comprador2[telefone]" value="{{ $enderecoComprador2->telefone }}"
                        placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Celular</label>
                    <input type="text" name="endereco_comprador2[celular]" value="{{ $enderecoComprador2->celular }}"
                        placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>E-mail</label>
                    <input type="text" name="comprador2[email]" value="{{ $comprador2->email }}"
                        class="form-control form-control-border">
                </div>


            </div>


        </div>
    </div>

    <div class="card card-navy ">
        <div class="card-header">
            <h3 class="card-title">
                Dados Profissionais Comprador 2
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label>Nome da empresa</label>
                    <input type="text" name="profissao_comprador2[nome_empresa]"
                        value="{{ $profissaoComprador2->nome_empresa }}" placeholder="Nome da empresa"
                        class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Tipo contratação</label>
                    <select name="profissao_comprador2[contratacao]"
                        class="custom-select form-control form-control-border">
                        <option value="1" {{ $profissaoComprador2->contratacao == 1 ? 'selected' : '' }}>
                            Assalariado
                        </option>
                        <option value="2" {{ $profissaoComprador2->contratacao == 2 ? 'selected' : '' }}>
                            Aposentado
                        </option>
                        <option value="3" {{ $profissaoComprador2->contratacao == 3 ? 'selected' : '' }}>
                            Sócio
                            Proprietário</option>
                        <option value="4" {{ $profissaoComprador2->contratacao == 4 ? 'selected' : '' }}>
                            Autônomo
                        </option>
                        <option value="5" {{ $profissaoComprador2->contratacao == 5 ? 'selected' : '' }}>
                            Profissional
                            liberal</option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Data admissão</label>
                    <input type="date" name="profissao_comprador2[admissao]"
                        value="{{ $profissaoComprador2->admissao }}" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Cargo</label>
                    <input type="text" name="profissao_comprador2[cargo]" value="{{ $profissaoComprador2->cargo }}"
                        placeholder="Cargo" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Renda mensal</label>
                    <input type="text" name="profissao_comprador2[renda_mensal]"
                        value="{{ $profissaoComprador2->renda_mensal }}" placeholder="Renda mensal"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Outra renda mensal</label>
                    <input type="text" name="profissao_comprador2[outra_renda_mensal]"
                        value="{{ $profissaoComprador2->outra_renda_mensal }}" placeholder="Outra renda mensal"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Origem</label>
                    <input type="text" name="profissao_comprador2[origem_renda]"
                        value="{{ $profissaoComprador2->origem_renda }}" placeholder="Origem"
                        class="form-control form-control-border">
                </div>
            </div>

        </div>
    </div>

    @if ($conjugeComprador2)
        <div class="card card-navy conjuge2">
            <div class="card-header">
                <h3 class="card-title">
                    Dados Pessoais do cônjuge do Comprador 2
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label>Nome</label>
                        <input type="text" name="conjuge2[nome]" value="{{ $conjugeComprador2->nome }}"
                            placeholder="CPF" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Sexo</label>
                        <select name="conjuge2[sexo]" class="custom-select form-control form-control-border">
                            <option value="1" @if ($conjugeComprador2->sexo == 1) selected @endif>Masculino
                            </option>
                            <option value="2" @if ($conjugeComprador2->sexo == 2) selected @endif>Feminino
                            </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Nome da mãe</label>
                        <input type="text" name="conjuge2[nome_mae]" value="{{ $conjugeComprador2->nome_mae }}"
                            placeholder="Nome da mãe" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label>Nacionalidade</label>
                        <input type="text" name="conjuge2[pais]" value="{{ $conjugeComprador2->pais }}"
                            placeholder="Nacionalidade" class="form-control form-control-border">
                    </div>
                    <div class="col-6">
                        <label>Naturalidade</label>
                        <input type="text" name="conjuge2[naturalidade]" value="{{ $conjugeComprador2->naturalidade }}"
                            placeholder="Naturalidade" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label>Documento</label>
                        <input type="text" name="conjuge2[tipo_documento]"
                            value="{{ $conjugeComprador2->tipo_documento }}" placeholder="Documento"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-6">
                        <label>Nº Documento</label>
                        <input type="text" name="conjuge2[num_documento]"
                            value="{{ $conjugeComprador2->num_documento }}" placeholder="Nº Documento"
                            class="form-control form-control-border">
                    </div>

                </div>


                <div class="row mt-3">
                    <div class="col-4">
                        <label>Órgão expedidor</label>
                        <input type="text" name="conjuge2[orgao_emissor]"
                            value="{{ $conjugeComprador2->orgao_emissor }}" placeholder="Órgão expedidor"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>UF emissão</label>
                        <select name="conjuge2[estado_documento]" class="custom-select form-control form-control-border">
                            @foreach ($ufs as $k => $v)
                                @if ($conjugeComprador2->estado_documento == $k)
                                    <option value="{{ $k }}" selected>{{ $v }}
                                    </option>
                                @else
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Data emissão</label>
                        <input type="date" name="conjuge2[data_emissao]" value="{{ $conjugeComprador2->data_emissao }}"
                            placeholder="Data emissão" class="form-control form-control-border">
                    </div>
                </div>



                <div class="row mt-3">
                    <div class="col-4">
                        <label>Telefone</label>
                        <input type="text" name="conjuge2[telefone]" value="{{ $conjugeComprador2->telefone }}"
                            placeholder="Telefone" class="form-control form-control-border">
                    </div>

                    <div class="col-4">
                        <label>Celular</label>
                        <input type="text" name="conjuge2[celular]" value="{{ $conjugeComprador2->celular }}"
                            placeholder="Celular" class="form-control form-control-border">
                    </div>

                    <div class="col-4">
                        <label>E-mail</label>
                        <input type="text" name="conjuge2[email]" value="{{ $conjugeComprador2->email }}"
                            placeholder="E-mail" class="form-control form-control-border">
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
                        <input type="text" name="conjuge2[nome_empresa]" value="{{ $conjugeComprador2->nome_empresa }}"
                            placeholder="Nome da empresa" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label>Tipo contratação</label>
                        <select name="conjuge2[contratacao]" class="custom-select form-control form-control-border">
                            <option value="1" {{ $conjugeComprador2->contratacao == 1 ? 'selected' : '' }}>
                                Assalariado</option>
                            <option value="2" {{ $conjugeComprador2->contratacao == 2 ? 'selected' : '' }}>
                                Aposentado</option>
                            <option value="3" {{ $conjugeComprador2->contratacao == 3 ? 'selected' : '' }}>Sócio
                                Proprietário</option>
                            <option value="4" {{ $conjugeComprador2->contratacao == 4 ? 'selected' : '' }}>Autônomo
                            </option>
                            <option value="5" {{ $conjugeComprador2->contratacao == 6 ? 'selected' : '' }}>
                                Profissional liberal</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Data admissão</label>
                        <input type="date" name="conjuge2[admissao]" value="{{ $conjugeComprador2->admissao }}"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Cargo</label>
                        <input type="text" name="conjuge2[cargo]" value="{{ $conjugeComprador2->cargo }}"
                            placeholder="Cargo" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label>Renda mensal</label>
                        <input type="text" name="conjuge2[renda_mensal]" value="{{ $conjugeComprador2->renda_mensal }}"
                            placeholder="Renda mensal" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Outra renda mensal</label>
                        <input type="text" name="conjuge2[outra_renda_mensal]"
                            value="{{ $conjugeComprador2->outra_renda_mensal }}" placeholder="Outra renda mensal"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Origem</label>
                        <input type="text" name="conjuge2[origem_renda]" value="{{ $conjugeComprador2->origem_renda }}"
                            placeholder="Origem" class="form-control form-control-border">
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="card card-navy conjuge2" style="display:none;">
            <div class="card-header">
                <h3 class="card-title">
                    Dados Pessoais do cônjuge do Comprador 2
                </h3>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-4">
                        <label>CPF cônjuge 2</label>
                        <input type="text" value="{{ old('conjuge2.cpf') }}" name="conjuge2[cpf]" placeholder="CPF"
                            class="form-control form-control-border cpf">
                    </div>
                    <div class="col-4">
                        <label>Data de Nascimento</label>
                        <input type="date" value="{{ old('conjuge2.data_nascimento') }}"
                            name="conjuge2[data_nascimento]" placeholder="Data de Nascimento"
                            class="form-control form-control-border">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Nome</label>
                        <input type="text" value="{{ old('conjuge2.nome') }}" name="conjuge2[nome]" placeholder="Nome"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Sexo</label>
                        <select name="conjuge2[sexo]" class="custom-select form-control form-control-border">
                            <option value="">Selecione</option>
                            <option value="1" {{ old('conjuge2.sexo') == 1 ? 'selected' : '' }}>
                                Masculino</option>
                            <option value="2" {{ old('conjuge2.sexo') == 2 ? 'selected' : '' }}>Feminino
                            </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Nome da mãe</label>
                        <input type="text" value="{{ old('conjuge2.nome_mae') }}" name="conjuge2[nome_mae]"
                            placeholder="Nome da mãe" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label>Nacionalidade</label>
                        <input type="text" value="{{ old('conjuge2.pais') }}" name="conjuge2[pais]"
                            placeholder="Nacionalidade" class="form-control form-control-border">
                    </div>
                    <div class="col-6">
                        <label>Naturalidade</label>
                        <input type="text" value="{{ old('conjuge2.naturalidade') }}" name="conjuge2[naturalidade]"
                            placeholder="Naturalidade" class="form-control form-control-border">
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label>Documento</label>
                        <input type="text" value="{{ old('conjuge2.tipo_documento') }}" name="conjuge2[tipo_documento]"
                            placeholder="Documento" class="form-control form-control-border">
                    </div>
                    <div class="col-6">
                        <label>Nº Documento</label>
                        <input type="text" value="{{ old('conjuge2.num_documento') }}" name="conjuge2[num_documento]"
                            placeholder="Nº Documento" class="form-control form-control-border">
                    </div>

                </div>


                <div class="row mt-3">
                    <div class="col-4">
                        <label>Órgão expedidor</label>
                        <input type="text" value="{{ old('conjuge2.orgao_emissor') }}" name="conjuge2[orgao_emissor]"
                            placeholder="Órgão expedidor" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>UF emissão</label>
                        <select name="conjuge2[estado_documento]" class="custom-select form-control form-control-border">
                            <option value="">Selecione</option>
                            @foreach ($ufs as $k => $v)
                                @if ($k == 'RS')
                                    <option value="{{ $k }}" selected>{{ $v }}
                                    </option>
                                @else
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="col-4">
                        <label>Data emissão</label>
                        <input type="date" value="{{ old('conjuge2.data_emissao') }}" name="conjuge2[data_emissao]"
                            placeholder="Data emissão" class="form-control form-control-border">
                    </div>
                </div>



                <div class="row mt-3">
                    <div class="col-4">
                        <label>Telefone</label>
                        <input type="text" value="{{ old('conjuge2.telefone') }}" name="conjuge2[telefone]"
                            placeholder="" class="form-control form-control-border telefone">
                    </div>

                    <div class="col-4">
                        <label>Celular</label>
                        <input type="text" value="{{ old('conjuge2.celular') }}" name="conjuge2[celular]" placeholder=""
                            class="form-control form-control-border celular">
                    </div>

                    <div class="col-4">
                        <label>E-mail</label>
                        <input type="text" value="{{ old('conjuge2.email') }}" name="conjuge2[email]" placeholder=""
                            class="form-control form-control-border">
                    </div>
                </div>


            </div>
        </div>

        <div class="card card-navy conjuge2" style="display:none;">
            <div class="card-header">
                <h3 class="card-title">
                    Dados profissionais do cônjuge do comprador 2
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label>Nome da empresa</label>
                        <input type="text" value="{{ old('conjuge2.nome_empresa') }}" name="conjuge2[nome_empresa]"
                            placeholder="Nome da empresa" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label>Tipo contratação</label>
                        <select name="conjuge2[contratacao]" class="custom-select form-control form-control-border">
                            <option value="">Selecione</option>
                            <option value="1" {{ old('conjuge2.contratacao') == 1 ? 'selected' : '' }}>
                                Assalariado</option>
                            <option value="2" {{ old('conjuge2.contratacao') == 2 ? 'selected' : '' }}>
                                Aposentado</option>
                            <option value="3" {{ old('conjuge2.contratacao') == 3 ? 'selected' : '' }}>
                                Sócio Proprietário</option>
                            <option value="4" {{ old('conjuge2.contratacao') == 4 ? 'selected' : '' }}>
                                Autônomo</option>
                            <option value="5" {{ old('conjuge2.contratacao') == 5 ? 'selected' : '' }}>
                                Profissional liberal</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Data admissão</label>
                        <input type="date" value="{{ old('conjuge2.admissao') }}" name="conjuge2[admissao]"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Cargo</label>
                        <input type="text" value="{{ old('conjuge2.cargo') }}" name="conjuge2[cargo]"
                            placeholder="Cargo" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label>Renda mensal</label>
                        <input type="text" value="{{ old('conjuge2.renda_mensal') }}" name="conjuge2[renda_mensal]"
                            placeholder="Renda mensal" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Outra renda mensal</label>
                        <input type="text" value="{{ old('conjuge2.outra_renda_mensal') }}"
                            name="conjuge2[outra_renda_mensal]" placeholder="Outra renda mensal"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Origem</label>
                        <input type="text" value="{{ old('conjuge2.origem_renda') }}" name="conjuge2[origem_renda]"
                            placeholder="Origem" class="form-control form-control-border">
                    </div>
                </div>

            </div>
        </div>
    @endif

@else
    <div class="row justify-content-end mb-2">
        <div class="col-12 col-md-3 pull-right">
            <button type="button" class="btn btn-block btn-outline-primary" onclick="addComprador2()"><i
                    class='fas fa-plus'></i> Comprador</button>
        </div>
    </div>

    {{-- comprador 2 --}}
    <div class="card card-navy comprador2" style="display:none;">
        <div class="card-header">
            <h3 class="card-title">
                Dados Pessoais Comprador 2
            </h3>
        </div>
        <div class="card-body">
            <input type="hidden" value="{{ old('comprador2.ativo') }}" id="seleciona-comprador-2"
                name="comprador2[ativo]">
            <div class="row">
                <div class="col-4">
                    <label>CPF comprador </label>
                    <input type="text" value="{{ old('comprador2.cpf') }}" name="comprador2[cpf]" placeholder="CPF"
                        class="form-control form-control-border cpf">
                </div>
                <div class="col-4">
                    <label>Data de Nascimento</label>
                    <input type="date" value="{{ old('comprador2.nascimento') }}" name="comprador2[nascimento]"
                        placeholder="Data de Nascimento" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Estado Civil</label>
                    <select name="comprador2[estado_civil]" onchange="setEstadoCivil2()"
                        class="custom-select form-control form-control-border" id="estado-civil-2">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('comprador2.estado_civil') == 1 ? 'selected' : '' }}>
                            Solteiro(a)
                        </option>
                        <option value="2" {{ old('comprador2.estado_civil') == 2 ? 'selected' : '' }}>
                            Casado(a)</option>
                        <option value="3" {{ old('comprador2.estado_civil') == 3 ? 'selected' : '' }}>
                            União estável</option>
                        <option value="4" {{ old('comprador2.estado_civil') == 4 ? 'selected' : '' }}>
                            Divorciado(a)</option>
                        <option value="5" {{ old('comprador2.estado_civil') == 5 ? 'selected' : '' }}>
                            Viúvo(a)</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Nome</label>
                    <input type="text" value="{{ old('comprador2.nome') }}" name="comprador2[nome]" placeholder="Nome"
                        class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label>Sexo</label>
                    <select name="comprador2[sexo]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('comprador2.sexo') == 1 ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="2" {{ old('comprador2.sexo') == 2 ? 'selected' : '' }}>
                            Feminino</option>
                    </select>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label>Nacionalidade</label>
                    <input type="text" value="{{ old('comprador2.pais') }}" name="comprador2[pais]"
                        placeholder="Nacionalidade" class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label>Naturalidade</label>
                    <input type="text" value="{{ old('comprador2.naturalidade') }}" name="comprador2[naturalidade]"
                        placeholder="Naturalidade" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label>Documento</label>
                    <input type="text" value="{{ old('comprador2.tipo_documento') }}" name="comprador2[tipo_documento]"
                        placeholder="Documento" class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label>Nº Documento</label>
                    <input type="text" value="{{ old('comprador2.num_documento') }}" name="comprador2[num_documento]"
                        placeholder="Nº Documento" class="form-control form-control-border">
                </div>

            </div>


            <div class="row mt-3">
                <div class="col-4">
                    <label>Órgão expedidor</label>
                    <input type="text" value="{{ old('comprador2.orgao_emissor') }}" name="comprador2[orgao_emissor]"
                        placeholder="Órgão expedidor" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>UF emissão</label>
                    <select name="comprador2[estado_documento]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        @foreach ($ufs as $k => $v)
                            @if ($k == 'RS')
                                <option value="{{ $k }}" selected>{{ $v }}
                                </option>
                            @else
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label>Data emissão</label>
                    <input type="date" value="{{ old('comprador2.data_emissao') }}" name="comprador2[data_emissao]"
                        placeholder="Data emissão" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3 dados-casamento2" style="display:none;">
                <div class="col-6">
                    <label>Regime de bens</label>
                    <select name="comprador2[regime_bens]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('comprador2.regime_bens') == 1 ? 'selected' : '' }}>
                            Comunhão
                            parcial de bens</option>
                        <option value="2" {{ old('comprador2.regime_bens') == 2 ? 'selected' : '' }}>
                            Comunhão
                            Universal de Bens</option>
                        <option value="3" {{ old('comprador2.regime_bens') == 3 ? 'selected' : '' }}>
                            Separação de
                            bens</option>
                    </select>
                </div>

                <div class="col-6">
                    <label>Data casamento</label>
                    <input type="date" value="{{ old('comprador2.data_casamento') }}" name="comprador2[data_casamento]"
                        placeholder="" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3">
                    <label>CEP Residencial</label>
                    <input type="text" value="{{ old('endereco_comprador2.cep') }}" onkeyup="pesquisacep(1)"
                        name="endereco_comprador2[cep]" id="cep1" placeholder="" class="form-control form-control-border">
                </div>

                <div class="col-5">
                    <label>Endereço residencial</label>
                    <input type="text" value="{{ old('endereco_comprador2.logradouro') }}"
                        name="endereco_comprador2[logradouro]" id="rua1" placeholder=""
                        class="form-control form-control-border">
                </div>

                <div class="col-2">
                    <label>Número</label>
                    <input type="text" value="{{ old('endereco_comprador2.numero') }}"
                        name="endereco_comprador2[numero]" id="numero1" placeholder=""
                        class="form-control form-control-border">
                </div>
                <div class="col-2">
                    <label>Complemento</label>
                    <input type="text" value="{{ old('endereco_comprador2.complemento') }}"
                        name="endereco_comprador2[complemento]" placeholder="" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Bairro</label>
                    <input type="text" value="{{ old('endereco_comprador2.bairro') }}"
                        name="endereco_comprador2[bairro]" id="bairro1" placeholder=""
                        class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Cidade</label>
                    <input type="text" value="{{ old('endereco_comprador2.cidade') }}"
                        name="endereco_comprador2[cidade]" id="cidade1" placeholder=""
                        class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Estado</label>
                    <select name="endereco_comprador2[uf]" class="custom-select form-control form-control-border" id="uf1">
                        @foreach ($ufs as $k => $v)
                            <option {{ old('endereco_comprador2.uf') == $k ? 'selected' : '' }}
                                value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Telefone</label>
                    <input type="text" value="{{ old('endereco_comprador2.telefone') }}"
                        name="endereco_comprador2[telefone]" id="telefone" placeholder=""
                        class="form-control form-control-border telefone">
                </div>

                <div class="col-4">
                    <label>Celular</label>
                    <input type="text" value="{{ old('endereco_comprador2.celular') }}"
                        name="endereco_comprador2[celular]" placeholder=""
                        class="form-control form-control-border celular">
                </div>

                <div class="col-4">
                    <label>E-mail</label>
                    <input type="text" value="{{ old('endereco_comprador2.email') }}" name="comprador2[email]"
                        placeholder="" class="form-control form-control-border">
                </div>


            </div>


        </div>
    </div>

    <div class="card card-navy comprador2" style="display:none;">
        <div class="card-header">
            <h3 class="card-title">
                Dados Profissionais Comprador 2
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label>Nome da empresa</label>
                    <input type="text" value="{{ old('profissao_comprador2.nome_empresa') }}"
                        name="profissao_comprador2[nome_empresa]" placeholder="Nome da empresa"
                        class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Tipo contratação</label>
                    <select name="profissao_comprador2[contratacao]"
                        class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('profissao_comprador2.contratacao') == 1 ? 'selected' : '' }}>
                            Assalariado</option>
                        <option value="2" {{ old('profissao_comprador2.contratacao') == 2 ? 'selected' : '' }}>
                            Aposentado</option>
                        <option value="3" {{ old('profissao_comprador2.contratacao') == 3 ? 'selected' : '' }}>
                            Sócio Proprietário</option>
                        <option value="4" {{ old('profissao_comprador2.contratacao') == 4 ? 'selected' : '' }}>
                            Autônomo</option>
                        <option value="5" {{ old('profissao_comprador2.contratacao') == 5 ? 'selected' : '' }}>
                            Profissional liberal</option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Data admissão</label>
                    <input type="date" value="{{ old('profissao_comprador2.admissao') }}"
                        name="profissao_comprador2[admissao]" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Cargo</label>
                    <input type="text" value="{{ old('profissao_comprador2.cargo') }}"
                        name="profissao_comprador2[cargo]" placeholder="Cargo" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Renda mensal</label>
                    <input type="text" value="{{ old('profissao_comprador2.renda_mensal') }}"
                        name="profissao_comprador2[renda_mensal]" placeholder="Renda mensal"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Outra renda mensal</label>
                    <input type="text" value="{{ old('profissao_comprador2.outra_renda_mensal') }}"
                        name="profissao_comprador2[outra_renda_mensal]" placeholder="Outra renda mensal"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Origem</label>
                    <input type="text" value="{{ old('profissao_comprador2.origem_renda') }}"
                        name="profissao_comprador2[origem_renda]" placeholder="Origem"
                        class="form-control form-control-border">
                </div>
            </div>

        </div>
    </div>

    <div class="card card-navy conjuge2" style="display:none;">
        <div class="card-header">
            <h3 class="card-title">
                Dados Pessoais do cônjuge do Comprador 2
            </h3>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-4">
                    <label>CPF cônjuge 2</label>
                    <input type="text" value="{{ old('conjuge2.cpf') }}" name="conjuge2[cpf]" placeholder="CPF"
                        class="form-control form-control-border cpf">
                </div>
                <div class="col-4">
                    <label>Data de Nascimento</label>
                    <input type="date" value="{{ old('conjuge2.data_nascimento') }}" name="conjuge2[data_nascimento]"
                        placeholder="Data de Nascimento" class="form-control form-control-border">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label>Nome</label>
                    <input type="text" value="{{ old('conjuge2.nome') }}" name="conjuge2[nome]" placeholder="Nome"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Sexo</label>
                    <select name="conjuge2[sexo]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('conjuge2.sexo') == 1 ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="2" {{ old('conjuge2.sexo') == 2 ? 'selected' : '' }}>Feminino
                        </option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Nome da mãe</label>
                    <input type="text" value="{{ old('conjuge2.nome_mae') }}" name="conjuge2[nome_mae]"
                        placeholder="Nome da mãe" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label>Nacionalidade</label>
                    <input type="text" value="{{ old('conjuge2.pais') }}" name="conjuge2[pais]"
                        placeholder="Nacionalidade" class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label>Naturalidade</label>
                    <input type="text" value="{{ old('conjuge2.naturalidade') }}" name="conjuge2[naturalidade]"
                        placeholder="Naturalidade" class="form-control form-control-border">
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label>Documento</label>
                    <input type="text" value="{{ old('conjuge2.tipo_documento') }}" name="conjuge2[tipo_documento]"
                        placeholder="Documento" class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label>Nº Documento</label>
                    <input type="text" value="{{ old('conjuge2.num_documento') }}" name="conjuge2[num_documento]"
                        placeholder="Nº Documento" class="form-control form-control-border">
                </div>

            </div>


            <div class="row mt-3">
                <div class="col-4">
                    <label>Órgão expedidor</label>
                    <input type="text" value="{{ old('conjuge2.orgao_emissor') }}" name="conjuge2[orgao_emissor]"
                        placeholder="Órgão expedidor" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>UF emissão</label>
                    <select name="conjuge2[estado_documento]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        @foreach ($ufs as $k => $v)
                            @if ($k == 'RS')
                                <option value="{{ $k }}" selected>{{ $v }}
                                </option>
                            @else
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="col-4">
                    <label>Data emissão</label>
                    <input type="date" value="{{ old('conjuge2.data_emissao') }}" name="conjuge2[data_emissao]"
                        placeholder="Data emissão" class="form-control form-control-border">
                </div>
            </div>



            <div class="row mt-3">
                <div class="col-4">
                    <label>Telefone</label>
                    <input type="text" value="{{ old('conjuge2.telefone') }}" name="conjuge2[telefone]" placeholder=""
                        class="form-control form-control-border telefone">
                </div>

                <div class="col-4">
                    <label>Celular</label>
                    <input type="text" value="{{ old('conjuge2.celular') }}" name="conjuge2[celular]" placeholder=""
                        class="form-control form-control-border celular">
                </div>

                <div class="col-4">
                    <label>E-mail</label>
                    <input type="text" value="{{ old('conjuge2.email') }}" name="conjuge2[email]" placeholder=""
                        class="form-control form-control-border">
                </div>
            </div>


        </div>
    </div>

    <div class="card card-navy conjuge2" style="display:none;">
        <div class="card-header">
            <h3 class="card-title">
                Dados profissionais do cônjuge do comprador 2
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label>Nome da empresa</label>
                    <input type="text" value="{{ old('conjuge2.nome_empresa') }}" name="conjuge2[nome_empresa]"
                        placeholder="Nome da empresa" class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Tipo contratação</label>
                    <select name="conjuge2[contratacao]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('conjuge2.contratacao') == 1 ? 'selected' : '' }}>
                            Assalariado</option>
                        <option value="2" {{ old('conjuge2.contratacao') == 2 ? 'selected' : '' }}>
                            Aposentado</option>
                        <option value="3" {{ old('conjuge2.contratacao') == 3 ? 'selected' : '' }}>
                            Sócio Proprietário</option>
                        <option value="4" {{ old('conjuge2.contratacao') == 4 ? 'selected' : '' }}>
                            Autônomo</option>
                        <option value="5" {{ old('conjuge2.contratacao') == 5 ? 'selected' : '' }}>
                            Profissional liberal</option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Data admissão</label>
                    <input type="date" value="{{ old('conjuge2.admissao') }}" name="conjuge2[admissao]"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Cargo</label>
                    <input type="text" value="{{ old('conjuge2.cargo') }}" name="conjuge2[cargo]" placeholder="Cargo"
                        class="form-control form-control-border">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label>Renda mensal</label>
                    <input type="text" value="{{ old('conjuge2.renda_mensal') }}" name="conjuge2[renda_mensal]"
                        placeholder="Renda mensal" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Outra renda mensal</label>
                    <input type="text" value="{{ old('conjuge2.outra_renda_mensal') }}"
                        name="conjuge2[outra_renda_mensal]" placeholder="Outra renda mensal"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Origem</label>
                    <input type="text" value="{{ old('conjuge2.origem_renda') }}" name="conjuge2[origem_renda]"
                        placeholder="Origem" class="form-control form-control-border">
                </div>
            </div>

        </div>
    </div>
    {{-- comprador 2 --}}

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
                    <input type="text" value="{{ $processo->valor_operacao }}" name="processo[valor_operacao]"
                        placeholder="R$" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Valor a financiar</label>
                    <input type="text" name="processo[valor_financiar]" value="{{ $processo->valor_financiar }}"
                        placeholder="R$" class="form-control form-control-border">
                </div>
                <div class="col-2">
                    <div class="custom-control custom-checkbox">
                        @if ($processo->utiliza_fgts == 1)
                            <input class="custom-control-input" type="checkbox" id="utilizar_fgts"
                                name="processo[utiliza_fgts]" value="1" checked>
                        @else
                            <input class="custom-control-input" type="checkbox" id="utilizar_fgts"
                                name="processo[utiliza_fgts]" value="1">
                        @endif
                        <label for="utilizar_fgts" class="custom-control-label">Utilizar FGTS</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="custom-control custom-checkbox">
                        @if ($processo->financiar_despesas == 1)
                            <input class="custom-control-input" type="checkbox" id="financiar_despesas"
                                name="processo[financiar_despesas]" value="1" checked>
                        @else
                            <input class="custom-control-input" type="checkbox" id="financiar_despesas"
                                name="processo[financiar_despesas]" value="1">
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
                                name="processo[financiar_avaliacao]" value="1" checked>
                        @else
                            <input class="custom-control-input" type="checkbox" id="financiar_tarifa"
                                name="processo[financiar_avaliacao]" value="1">
                        @endif
                        <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa de
                            Avaliação</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">

                <div class="col-4">
                    <label>Recursos Próprios</label>
                    <input type="text" name="processo[recursos_proprios]" value="{{ $processo->recursos_proprios }}"
                        placeholder="Valor Recursos Próprios" class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Valor FGTS</label>
                    <input type="text" name="processo[fgts]" placeholder="Valor FGTS" value="{{ $processo->fgts }}"
                        class="form-control form-control-border">
                </div>

            </div>


            <div class="row mt-2">

                <div class="col-5">
                    <label>Valor total financiado</label>
                    <input type="text" name="processo[valor_total_financiado]"
                        value="{{ $processo->valor_total_financiado }}" placeholder="Valor total financiado"
                        class="form-control form-control-border">
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


                        <input class="custom-control-input" type="radio" id="tipo_imovel1" name="processo[tipo_imovel]"
                            value="1" {{ $checked1 }}>
                        <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="tipo_imovel2" name="processo[tipo_imovel]"
                            value="2" {{ $checked2 }}>
                        <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                    </div>
                </div>

                <div class="col-1">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="tipo_imovel3" name="processo[tipo_imovel]"
                            value="3" {{ $checked3 }}>
                        <label for="tipo_imovel3" class="custom-control-label">Terreno</label>
                    </div>
                </div>

                <div class="col-1">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="tipo_imovel4" name="processo[tipo_imovel]"
                            value="4" {{ $checked4 }}>
                        <label for="tipo_imovel4" class="custom-control-label">Construção</label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="tipo_imovel5" name="processo[tipo_imovel]"
                            value="5" {{ $checked5 }}>
                        <label for="tipo_imovel5" class="custom-control-label">Terreno +
                            Construção</label>
                    </div>
                </div>

            </div>

            <div class="row mt-3">


                <div class="col-6">
                    <label>Prazo</label>
                    <input type="text" name="processo[meses_financiamento]" value="{{ $processo->meses_financiamento }}"
                        placeholder="Meses" class="form-control form-control-border">
                </div>


            </div>

        </div>
    </div>





    <div class="card card-navy ">
        <div class="card-header">
            <h3 class="card-title">
                Dados do vendedor
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <label>Tipo de vendedor</label>
                    <select name="vendedor[tipo]" onchange="tipoVendedor()" id="vendedor_tipo"
                        class="custom-select form-control form-control-border">
                        <option value="1" @if ($vendedor->tipo == 1) selected @endif>Pessoa Física
                        </option>
                        <option value="2" @if ($vendedor->tipo == 2) selected @endif>Pessoa Jurídica
                        </option>
                    </select>
                </div>
            </div>

            <div class="pessoa-fisica" @if ($vendedor->tipo == 2)  style="display: none;" @endif>
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Nome</label>
                        <input type="text" name="vendedor[nome]" value="{{ $vendedor->nome }}"
                            placeholder="Nome do vendedor" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Estado Civil</label>
                        <select name="vendedor[estado_civil]" class="custom-select form-control form-control-border">
                            <option value="1" @if ($vendedor->estado_civil == 1)
                                selected
                                @endif>Solteiro(a)</option>
                            <option value="2" @if ($vendedor->estado_civil == 2)
                                selected
                                @endif>Casado(a)</option>
                            <option value="3" @if ($vendedor->estado_civil == 3) selected @endif>União
                                estável</option>
                            <option value="4" @if ($vendedor->estado_civil == 4)
                                selected
                                @endif>Divorciado(a)</option>
                            <option value="5" @if ($vendedor->estado_civil == 5)
                                selected
                                @endif>Viúvo(a)</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>CPF</label>
                        <input type="text" name="vendedor[cpf]" value="{{ $vendedor->cpf }}" placeholder="CPF"
                            class="form-control form-control-border">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-6">
                        <label>Telefone</label>
                        <input type="text" name="vendedor[telefone]" value="{{ $vendedor->telefone }}"
                            placeholder="Telefone" class="form-control form-control-border">
                    </div>

                    <div class="col-6">
                        <label>Profissão</label>
                        <input type="text" name="vendedor[profissao]" value="{{ $vendedor->profissao }}"
                            placeholder="Profissão" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label for="banco">Banco</label>
                        <input type="text" name="vendedor[banco]" value="{{ $vendedor->banco }}" placeholder="Banco"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="agencia">Agência</label>
                        <input type="text" name="vendedor[agencia]" value="{{ $vendedor->agencia }}"
                            placeholder="Agência" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="conta">Conta</label>
                        <input type="text" name="vendedor[conta]" value="{{ $vendedor->conta }}" placeholder="Conta"
                            class="form-control form-control-border">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Possui procurador?</label>
                        <select onchange="selectProcurador(1)" id="possui-procurador" name="vendedor[procurador]"
                            class="custom-select form-control form-control-border">
                            <option>Selecione</option>
                            <option value="1" @if ($vendedor->procurador == 1) selected @endif>Sim</option>
                            <option value="0" @if ($vendedor->procurador == 0) selected @endif>Não</option>
                        </select>
                    </div>
                </div>
                <div class="sessao-procurador-1" @if ($vendedor->procurador == 0)
                    style="display:none;" @endif>


                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Nome Procurador</label>
                            <input type="text" name="vendedor[nome_procurador]" value="{{ $vendedor->nome_procurador }}"
                                placeholder="Nome Procurador" class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">CPF Procurador</label>
                            <input type="text" name="vendedor[cpf_procurador]" value="{{ $vendedor->cpf_procurador }}"
                                placeholder="CPF Procurador" class="form-control form-control-border cpf">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">E-mail Procurador</label>
                            <input type="email" name="vendedor[email_procurador]"
                                value="{{ $vendedor->email_procurador }}" placeholder="E-mail Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">Telefone Procurador</label>
                            <input type="text" name="vendedor[telefone_procurador]"
                                value="{{ $vendedor->telefone_procurador }}" placeholder="Telefone Procurador"
                                class="form-control form-control-border telefone">
                        </div>
                    </div>
                </div>




            </div>

            <div class="pessoa-juridica" @if ($vendedor->tipo == 1) style="display: none;" @endif>
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Razão social</label>
                        <input type="text" name="vendedor_cnpj[nome]" value={{ $vendedor->nome }}
                            placeholder="Razão Social" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>CNPJ</label>
                        <input type="text" name="vendedor_cnpj[cnpj]" value={{ $vendedor->cnpj }} placeholder="CPF"
                            class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Telefone</label>
                        <input type="text" name="vendedor_cnpj[telefone]" value={{ $vendedor->telefone }}
                            placeholder="Telefone" class="form-control form-control-border">
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label for="banco">Banco</label>
                        <input type="text" name="vendedor_cnpj[banco]" value="{{ $vendedor->banco }}"
                            placeholder="Banco" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="agencia">Agência</label>
                        <input type="text" name="vendedor_cnpj[agencia]" value="{{ $vendedor->agencia }}"
                            placeholder="Agência" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="conta">Conta</label>
                        <input type="text" name="vendedor_cnpj[conta]" value="{{ $vendedor->conta }}"
                            placeholder="Conta" class="form-control form-control-border">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Possui procurador?</label>
                        <select name="vendedor_cnpj[procurador]" onchange="selectProcurador(2)" id="possui-procurador2"
                            class="custom-select form-control form-control-border">
                            <option>Selecione</option>
                            <option value="1" @if ($vendedor->procurador == 1) selected @endif>Sim</option>
                            <option value="0" @if ($vendedor->procurador == 0) selected @endif>Não</option>
                        </select>
                    </div>
                </div>

                <div class="sessao-procurador-2" @if ($vendedor->procurador == 0)
                    style="display:none;" @endif>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Nome Procurador</label>
                            <input type="text" name="vendedor_cnpj[nome_procurador]"
                                value="{{ $vendedor->nome_procurador }}" placeholder="Nome Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">CPF Procurador</label>
                            <input type="text" name="vendedor_cnpj[cpf_procurador]"
                                value="{{ $vendedor->cpf_procurador }}" placeholder="CPF Procurador"
                                class="form-control form-control-border cpf">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">E-mail Procurador</label>
                            <input type="email" name="vendedor_cnpj[email_procurador]"
                                value="{{ $vendedor->email_procurador }}" placeholder="E-mail Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">Telefone Procurador</label>
                            <input type="text" name="vendedor_cnpj[telefone_procurador]"
                                value="{{ $vendedor->telefone_procurador }}" placeholder="Telefone Procurador"
                                class="form-control form-control-border telefone">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (!$vendedor2)
        <div class="row justify-content-end mb-2">
            <div class="col-12 col-md-3 pull-right">

                <button type="button" class="btn btn-block btn-outline-primary" onclick="addVendedor2()"><i
                        class='fas fa-plus'></i> Vendedor</button>
            </div>
        </div>
    @endif
    @if ($vendedor2)
        <div class="card card-navy ">
            <div class="card-header">
                <h3 class="card-title">
                    Dados do Vendedor 2
                </h3>
                <input type="hidden" name="vendedor2[ativo]" id="set-vendedor2">

            </div>
            <div class="card-body">
                <div class="row justify-content-end">
                    <div class="col-12 col-md-3 col-lg-2">
                        <a href="{{ route('excluir-vendedor', $processo->id) }}"
                            class="btn btn-block btn-outline-danger">Excluir Vendedor</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Tipo de vendedor</label>
                        <select name="vendedor2[tipo]" onchange="tipoVendedor()" id="vendedor_tipo"
                            class="custom-select form-control form-control-border">
                            <option value="1" @if ($vendedor2->tipo == 1) selected @endif>Pessoa Física
                            </option>
                            <option value="2" @if ($vendedor2->tipo == 2) selected @endif>Pessoa Jurídica
                            </option>
                        </select>
                    </div>
                </div>

                <div class="pessoa-fisica" @if ($vendedor2->tipo == 2)  style="display: none;" @endif>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label>Nome</label>
                            <input type="text" name="vendedor2[nome]" value="{{ $vendedor2->nome }}"
                                placeholder="Nome do vendedor" class="form-control form-control-border">
                        </div>
                        <div class="col-4">
                            <label>Estado Civil</label>
                            <select name="vendedor2[estado_civil]" class="custom-select form-control form-control-border">
                                <option value="1" @if ($vendedor2->estado_civil == 1)
                                    selected
    @endif>Solteiro(a)</option>
    <option value="2" @if ($vendedor2->estado_civil == 2)
        selected
        @endif>Casado(a)</option>
    <option value="3" @if ($vendedor2->estado_civil == 3) selected @endif>União
        estável</option>
    <option value="4" @if ($vendedor2->estado_civil == 4)
        selected
        @endif>Divorciado(a)</option>
    <option value="5" @if ($vendedor2->estado_civil == 5)
        selected
        @endif>Viúvo(a)</option>
    </select>
    </div>
    <div class="col-4">
        <label>CPF</label>
        <input type="text" name="vendedor2[cpf]" value="{{ $vendedor2->cpf }}" placeholder="CPF"
            class="form-control form-control-border">
    </div>
    </div>


    <div class="row mt-3">
        <div class="col-6">
            <label>Telefone</label>
            <input type="text" name="vendedor2[telefone]" value="{{ $vendedor2->telefone }}" placeholder="Telefone"
                class="form-control form-control-border">
        </div>

        <div class="col-6">
            <label>Profissão</label>
            <input type="text" name="vendedor2[profissao]" value="{{ $vendedor2->profissao }}" placeholder="Profissão"
                class="form-control form-control-border">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            <label for="banco">Banco</label>
            <input type="text" name="vendedor2[banco]" value="{{ $vendedor2->banco }}" placeholder="Banco"
                class="form-control form-control-border">
        </div>
        <div class="col-4">
            <label for="agencia">Agência</label>
            <input type="text" name="vendedor2[agencia]" value="{{ $vendedor2->agencia }}" placeholder="Agência"
                class="form-control form-control-border">
        </div>
        <div class="col-4">
            <label for="conta">Conta</label>
            <input type="text" name="vendedor2[conta]" value="{{ $vendedor2->conta }}" placeholder="Conta"
                class="form-control form-control-border">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <label for="">Possui procurador?</label>
            <select onchange="selectProcurador(1)" id="possui-procurador" name="vendedor2[procurador]"
                class="custom-select form-control form-control-border">
                <option>Selecione</option>
                <option value="1" @if ($vendedor2->procurador == 1) selected @endif>Sim</option>
                <option value="0" @if ($vendedor2->procurador == 0) selected @endif>Não</option>
            </select>
        </div>
    </div>
    <div class="sessao-procurador-1" @if ($vendedor2->procurador == 0)
        style="display:none;" @endif>


        <div class="row mt-3">
            <div class="col-6">
                <label for="">Nome Procurador</label>
                <input type="text" name="vendedor2[nome_procurador]" value="{{ $vendedor2->nome_procurador }}"
                    placeholder="Nome Procurador" class="form-control form-control-border">
            </div>
            <div class="col-6">
                <label for="">CPF Procurador</label>
                <input type="text" name="vendedor2[cpf_procurador]" value="{{ $vendedor2->cpf_procurador }}"
                    placeholder="CPF Procurador" class="form-control form-control-border cpf">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <label for="">E-mail Procurador</label>
                <input type="email" name="vendedor2[email_procurador]" value="{{ $vendedor2->email_procurador }}"
                    placeholder="E-mail Procurador" class="form-control form-control-border">
            </div>
            <div class="col-6">
                <label for="">Telefone Procurador</label>
                <input type="text" name="vendedor2[telefone_procurador]" value="{{ $vendedor2->telefone_procurador }}"
                    placeholder="Telefone Procurador" class="form-control form-control-border telefone">
            </div>
        </div>
    </div>




    </div>

    <div class="pessoa-juridica" @if ($vendedor2->tipo == 1) style="display: none;" @endif>
        <div class="row mt-3">
            <div class="col-4">
                <label>Razão social</label>
                <input type="text" name="vendedor2_cnpj[nome]" value={{ $vendedor2->nome }} placeholder="Razão Social"
                    class="form-control form-control-border">
            </div>
            <div class="col-4">
                <label>CNPJ</label>
                <input type="text" name="vendedor2_cnpj[cnpj]" value={{ $vendedor2->cnpj }} placeholder="CPF"
                    class="form-control form-control-border">
            </div>
            <div class="col-4">
                <label>Telefone</label>
                <input type="text" name="vendedor2_cnpj[telefone]" value={{ $vendedor2->telefone }}
                    placeholder="Telefone" class="form-control form-control-border">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="banco">Banco</label>
                <input type="text" name="vendedor2_cnpj[banco]" value="{{ $vendedor2->banco }}" placeholder="Banco"
                    class="form-control form-control-border">
            </div>
            <div class="col-4">
                <label for="agencia">Agência</label>
                <input type="text" name="vendedor2_cnpj[agencia]" value="{{ $vendedor2->agencia }}"
                    placeholder="Agência" class="form-control form-control-border">
            </div>
            <div class="col-4">
                <label for="conta">Conta</label>
                <input type="text" name="vendedor2_cnpj[conta]" value="{{ $vendedor2->conta }}" placeholder="Conta"
                    class="form-control form-control-border">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="">Possui procurador?</label>
                <select name="vendedor2_cnpj[procurador]" onchange="selectProcurador(2)" id="possui-procurador2"
                    class="custom-select form-control form-control-border">
                    <option>Selecione</option>
                    <option value="1" @if ($vendedor2->procurador == 1) selected @endif>Sim</option>
                    <option value="0" @if ($vendedor2->procurador == 0) selected @endif>Não</option>
                </select>
            </div>
        </div>

        <div class="sessao-procurador-2" @if ($vendedor2->procurador == 0)
            style="display:none;" @endif>

            <div class="row mt-3">
                <div class="col-6">
                    <label for="">Nome Procurador</label>
                    <input type="text" name="vendedor2_cnpj[nome_procurador]" value="{{ $vendedor2->nome_procurador }}"
                        placeholder="Nome Procurador" class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label for="">CPF Procurador</label>
                    <input type="text" name="vendedor2_cnpj[cpf_procurador]" value="{{ $vendedor2->cpf_procurador }}"
                        placeholder="CPF Procurador" class="form-control form-control-border cpf">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label for="">E-mail Procurador</label>
                    <input type="email" name="vendedor2_cnpj[email_procurador]"
                        value="{{ $vendedor2->email_procurador }}" placeholder="E-mail Procurador"
                        class="form-control form-control-border">
                </div>
                <div class="col-6">
                    <label for="">Telefone Procurador</label>
                    <input type="text" name="vendedor2_cnpj[telefone_procurador]"
                        value="{{ $vendedor2->telefone_procurador }}" placeholder="Telefone Procurador"
                        class="form-control form-control-border telefone">
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@else

    <div class="card card-navy " id="vendedor2" style="display: none;">
        <input type="hidden" name="vendedor2[ativo]" id="set-vendedor2">
        <div class="card-header">
            <h3 class="card-title">
                Dados do Vendedor 2
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <label>Tipo de vendedor</label>
                    <select name="vendedor2[tipo]" onchange="tipoVendedor2()" id="vendedor_tipo"
                        class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1">Pessoa Física</option>
                        <option value="2">Pessoa Jurídica</option>
                    </select>
                </div>
            </div>

            <div class="pessoa-fisica" style="display: none;">
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Nome</label>
                        <input type="text" value="{{ old('vendedor2.nome') }}" name="vendedor2[nome]"
                            placeholder="Nome do vendedor" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>Estado Civil</label>
                        <select name="vendedor2[estado_civil]" class="custom-select form-control form-control-border">
                            <option value="">Selecione</option>
                            <option value="1" {{ old('vendedor2.estado_civil') == 1 ? 'selected' : '' }}>
                                Solteiro(a)</option>
                            <option value="2" {{ old('vendedor2.estado_civil') == 2 ? 'selected' : '' }}>Casado(a)
                            </option>
                            <option value="3" {{ old('vendedor2.estado_civil') == 3 ? 'selected' : '' }}>União
                                estável</option>
                            <option value="4" {{ old('vendedor2.estado_civil') == 4 ? 'selected' : '' }}>
                                Divorciado(a)</option>
                            <option value="5" {{ old('vendedor2.estado_civil') == 5 ? 'selected' : '' }}>Viúvo(a)
                            </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>CPF</label>
                        <input type="text" value="{{ old('vendedor2.cpf') }}" name="vendedor2[cpf]" placeholder="CPF"
                            class="form-control form-control-border cpf">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label>Telefone</label>
                        <input type="text" value="{{ old('vendedor2.telefone') }}" name="vendedor2[telefone]"
                            placeholder="Telefone" class="form-control form-control-border telefone">
                    </div>

                    <div class="col-6">
                        <label>Profissão</label>
                        <input type="text" value="{{ old('vendedor2.profissao') }}" name="vendedor2[profissao]"
                            placeholder="Profissão" class="form-control form-control-border">
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label for="banco">Banco</label>
                        <input type="text" value="{{ old('vendedor2.banco') }}" name="vendedor2[banco]"
                            placeholder="Banco" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="agencia">Agência</label>
                        <input type="text" value="{{ old('vendedor2.agencia') }}" name="vendedor2[agencia]"
                            placeholder="Agência" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="conta">Conta</label>
                        <input type="text" value="{{ old('vendedor2.conta') }}" name="vendedor2[conta]"
                            placeholder="Conta" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Possui procurador?</label>
                        <select name="vendedor2[procurador]" onchange="selectProcurador(1)"
                            class="custom-select form-control form-control-border" id="possui-procurador">
                            <option>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                <div class="sessao-procurador-1" style="display: none;">
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Nome Procurador</label>
                            <input type="text" value="{{ old('vendedor2.nome_procurador') }}"
                                name="vendedor2[nome_procurador]" placeholder="Nome Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">CPF Procurador</label>
                            <input type="text" value="{{ old('vendedor2.cpf_procurador') }}"
                                name="vendedor2[cpf_procurador]" placeholder="CPF Procurador"
                                class="form-control form-control-border cpf">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">E-mail Procurador</label>
                            <input type="email" value="{{ old('vendedor2.email_procurador') }}"
                                name="vendedor2[email_procurador]" placeholder="E-mail Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">Telefone</label>
                            <input type="text" value="{{ old('vendedor2.telefone_procurador') }}"
                                name="vendedor2[telefone_procurador]" placeholder="Telefone Procurador"
                                class="form-control form-control-border telefone">
                        </div>
                    </div>
                </div>



            </div>

            <div class="pessoa-juridica" style="display: none;">
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Razão social</label>
                        <input type="text" value="{{ old('vendedor2_cnpj.nome') }}" name="vendedor2_cnpj[nome]"
                            placeholder="Razão Social" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label>CNPJ</label>
                        <input type="text" value="{{ old('vendedor2_cnpj.cnpj') }}" name="vendedor2_cnpj[cnpj]"
                            placeholder="CPF" class="form-control form-control-border cpf">
                    </div>
                    <div class="col-4">
                        <label>Telefone</label>
                        <input type="text" value="{{ old('vendedor2.telefone') }}" name="vendedor2_cnpj[telefone]"
                            placeholder="Telefone" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label for="banco">Banco</label>
                        <input type="text" value="{{ old('vendedor2.banco') }}" name="vendedor2_cnpj[banco]"
                            placeholder="Banco" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="agencia">Agência</label>
                        <input type="text" value="{{ old('vendedor2.agencia') }}" name="vendedor2_cnpj[agencia]"
                            placeholder="Agência" class="form-control form-control-border">
                    </div>
                    <div class="col-4">
                        <label for="conta">Conta</label>
                        <input type="text" value="{{ old('vendedor2.conta') }}" name="vendedor2_cnpj[conta]"
                            placeholder="Conta" class="form-control form-control-border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="">Possui procurador?</label>
                        <select name="vendedor2_cnpj[procurador]" class="custom-select form-control form-control-border"
                            onchange="selectProcurador(2)" id="possui-procurador-2">
                            <option>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                <div class="sessao-procurador-2" style="display: none;">
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">Nome Procurador</label>
                            <input type="text" value="{{ old('vendedor2.nome_procurador') }}"
                                name="vendedor2_cnpj[nome_procurador]" placeholder="Nome Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">CPF Procurador</label>
                            <input type="text" value="{{ old('vendedor2.cpf_procurador') }}"
                                name="vendedor2_cnpj[cpf_procurador]" placeholder="CPF Procurador"
                                class="form-control form-control-border cpf">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="">E-mail Procurador</label>
                            <input type="email" value="{{ old('vendedor2.email_procurador') }}"
                                name="vendedor2_cnpj[email_procurador]" placeholder="E-mail Procurador"
                                class="form-control form-control-border">
                        </div>
                        <div class="col-6">
                            <label for="">Telefone</label>
                            <input type="text" value="{{ old('vendedor2.telefone_procurador') }}"
                                name="vendedor2_cnpj[telefone_procurador]" placeholder="Telefone Procurador"
                                class="form-control form-control-border telefone">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endif
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
                    <input type="text" name="imovel[cep]" value="{{ $imovel->cep }}" placeholder="CEP do imóvel"
                        class="form-control form-control-border">
                </div>
                <div class="col-5">
                    <label>Endereço</label>
                    <input type="text" name="imovel[endereco]" value="{{ $imovel->endereco }}"
                        placeholder="Endereço do imóvel" class="form-control form-control-border">
                </div>
                <div class="col-2">
                    <label>Número</label>
                    <input type="text" name="imovel[numero]" value="{{ $imovel->numero }}" placeholder="Número"
                        class="form-control form-control-border">
                </div>
                <div class="col-2">
                    <label>Complemento</label>
                    <input type="text" name="imovel[complemento]" value="{{ $imovel->complemento }}"
                        placeholder="Complemento" class="form-control form-control-border">
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-4">
                    <label>Bairro</label>
                    <input type="text" name="imovel[bairro]" value="{{ $imovel->bairro }}" placeholder="Bairro"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Cidade</label>
                    <input type="text" name="imovel[cidade]" value="{{ $imovel->cidade }}" placeholder="Cidade"
                        class="form-control form-control-border">
                </div>
                <div class="col-4">
                    <label>Estado</label>
                    <select name="imovel[estado]" class="custom-select form-control form-control-border">
                        @foreach ($ufs as $k => $v)
                            @if ($imovel->estado == $k)
                                <option value="{{ $k }}" selected>{{ $v }}</option>
                            @else
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-6">
                    <label>Vagas na garagem</label>
                    <input type="number" name="imovel[vagas]" value="{{ $imovel->vagas }}"
                        placeholder="Quantidade de vagas" min="0" class="form-control form-control-border">
                </div>

                <div class="col-6">
                    <label>Número(s) vaga(s)</label>
                    <input type="text" name="imovel[numero_vaga]" value="{{ $imovel->numero_vaga }}"
                        placeholder="Número(s) vaga(s)" class="form-control form-control-border">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label>Contato de avaliação</label>
                    <input type="text" name="imovel[contato_avaliacao]" value="{{ $imovel->contato_avaliacao }}"
                        placeholder="Contato de avaliação" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Telefone do contato</label>
                    <input type="text" name="imovel[telefone_contato]" value="{{ $imovel->telefone_contato }}"
                        placeholder="Contato de avaliação" class="form-control form-control-border">
                </div>

                <div class="col-4">
                    <label>Tipo </label>
                    <select name="imovel[novo_usado]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" @if ($imovel->novo_usado == 1) selected @endif>Novo</option>
                        <option value="2" @if ($imovel->novo_usado == 2) selected @endif>Usado</option>
                    </select>
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
                    <select name="processo[banco]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" @if ($processo->banco == 1) selected @endif>Itaú</option>
                        <option value="2" @if ($processo->banco == 2) selected @endif>Bradesco</option>
                        <option value="3" @if ($processo->banco == 3) selected @endif>Santander</option>
                    </select>
                </div>
                <div class="col-6">
                    <label>Dia da prestação</label>
                    <input type="number" min="1" max="31" name="processo[dia_prestacao]"
                        value="{{ $processo->dia_prestacao }}" placeholder="Dia da prestação"
                        class="form-control form-control-border">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Sistema de amortização</label>
                    <select name="processo[amortizacao]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="sac" @if ($processo->amortizacao == 'sac') selected @endif>Sac
                        </option>
                        <option value="price" @if ($processo->amortizacao == 'price')
                            selected
                            @endif>Price</option>
                    </select>
                </div>
                <div class="col-6">
                    <label>Indexador</label>
                    <select name="processo[indexador]" class="custom-select form-control form-control-border">
                        <option value="">Selecione</option>
                        <option value="1" @if ($processo->indexador == 1) selected @endif>Poupança</option>
                        <option value="2" @if ($processo->indexador == 2) selected @endif>TR</option>
                        <option value="3" @if ($processo->indexador == 3) selected @endif>IPCA</option>
                        <option value="4" @if ($processo->indexador == 4) selected @endif>Taxa Fixa</option>
                    </select>
                </div>


            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Parceiro</label>
                    <select name="processo[id_parceiro]" class="custom-select form-control form-control-border"
                        onchange="buscaCorretores()" id="id_parceiro" required>
                        <option value="">Selecione</option>
                        @foreach ($parceiros as $p)
                            @if ($p->id != 1)
                                @if ($processo->id_parceiro == $p->id)
                                    <option value="{{ $p->id }}" selected>{{ $p->apelido }}
                                    </option>
                                @else
                                    <option value="{{ $p->id }}">{{ $p->apelido }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-6">
                    <label>Corretor</label>
                    <select name="processo[id_corretor]" class="custom-select form-control form-control-border"
                        id="id_corretor">
                        <option value="">Selecione</option>
                        @foreach ($corretores as $c)
                            @if ($processo->id_corretor == $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->name }}</option>

                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-end mb-2">
        <div class="col-12 col-md-3 col-lg-2 pull-left mt-3">
            <a href="{{ route('excluir-proposta', $processo->id) }}"
                class="btn btn-block btn-outline-danger">Excluir</a>
        </div>
        <div class="col-12 col-md-3 col-lg-2 pull-right mt-3">
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
        function selectProcurador(tipo) {
            if (tipo == 1) {
                if ($('#possui-procurador').val() == 1) {
                    $('.sessao-procurador-1').show();
                } else {
                    $('.sessao-procurador-1').hide();
                }
            } else {
                if ($('#possui-procurador2').val() == 1) {
                    $('.sessao-procurador-2').show();
                } else {
                    $('.sessao-procurador-2').hide();
                }
            }

        }

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

        function tipoVendedor2() {
            var tipoVendedor = document.querySelector('#vendedor2 #vendedor_tipo')

            if (tipoVendedor.value == 1) {
                document.querySelector('#vendedor2 .pessoa-juridica').setAttribute('style', 'display:none;')
                $('#vendedor2 .pessoa-juridica .form-control').attr('disabled', true)
                $('#vendedor2 .pessoa-fisica .form-control').removeAttr('disabled');
                document.querySelector('#vendedor2 .pessoa-fisica').removeAttribute('style')
            } else {
                document.querySelector('#vendedor2 .pessoa-fisica').setAttribute('style', 'display:none;')
                document.querySelector('#vendedor2 .pessoa-juridica').removeAttribute('style')
                $('#vendedor2 .pessoa-fisica .form-control').attr('disabled', true)
                $('#vendedor2 .pessoa-juridica .form-control').removeAttr('disabled');
            }
        }

        function setEstadoCivil() {
            console.log("estado civil");
            let value = $('#estado-civil-1').val();
            if (value == 2 || value == 3) {
                $('.dados-casamento-1').show();
                $('.conjuge1').show();
            } else {
                $('.conjuge1').hide();
                $('.dados-casamento-1').hide();

            }
        }

        function setEstadoCivil2() {
            let value = $('#estado-civil-2').val();
            console.warn(value);
            if (value == 2 || value == 3) {
                $('.conjuge2').show();
                $('.dados-casamento-2').show();

            } else {
                $('.conjuge2').hide();
                $('.dados-casamento-2').hide();
            }
        }

        function setEstadoCivil3() {
            let value = $('#estado-civil-3').val();
            if (value == 2 || value == 3) {
                $('.conjuge3').show();
                $('.dados-casamento-3').show();

            } else {
                $('.conjuge3').hide();
                $('.dados-casamento-3').hide();

            }
        }

        function buscaCorretores() {
            let parceiro = $('#id_parceiro').val();

            if (parceiro == "") return;


            let optionTemp = document.createElement('option');
            optionTemp.setAttribute('selected', 'selected');
            optionTemp.innerHTML = "Buscando corretores...";
            $('#id_corretor').append(optionTemp);


            $.ajax({
                    method: "GET",
                    url: "{{ url('') }}/busca-corretor/" + parceiro,
                })
                .done(function(data) {
                    data.map((el) => {
                        optionTemp.remove();
                        console.log(el)
                        let option = document.createElement('option');
                        option.setAttribute('value', el.id);
                        option.innerHTML = el.name;
                        $('#id_corretor').append(option);
                    })
                });
        }

        function addComprador2() {
            $('.comprador2').show();
            $(".btn-comprador3").show();
            $('#seleciona-comprador-2').val(1);
        }

        function addVendedor2() {
            $('#set-vendedor2').val(1);
            $('#vendedor2').show()
        }

        jQuery(function($) {
            $(".telefone").each(function() {
                $(this).mask('(99) 9999-9999');
            })
            $(".celular").each(function() {
                $(this).mask('(99) 99999-9999');
            })
            $(".cpf").each(function() {
                $(this).mask('999.999.999-99');
            })
        });
    </script>
@endsection
