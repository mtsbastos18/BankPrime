@extends ('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Nova Proposta</li>
@endsection

@section('content')
    <!--Main content-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('salvar-proposta') }}">
                        @csrf

                        <div class="card card-navy ">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Pessoais Comprador 1
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label>CPF comprador </label>
                                        <input type="text" name="comprador[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
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
                                            <option value="1">Solteiro(a)</option>
                                            <option value="2">Casado(a)</option>
                                            <option value="3">União estável</option>
                                            <option value="4">Divorciado(a)</option>
                                            <option value="5">Viúvo(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nome</label>
                                        <input type="text" name="comprador[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Sexo</label>
                                        <select name="comprador[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="comprador[pais]" placeholder="Nacionalidade"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="comprador[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <input type="text" name="comprador[tipo_documento]" placeholder="Documento"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="comprador[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="comprador[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="comprador[estado_documento]"
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
                                        <input type="date" name="comprador[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3 dados-casamento" style="display:none;">
                                    <div class="col-6">
                                        <label>Regime de bens</label>
                                        <select name="comprador[regime_bens]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Comunhão parcial de bens</option>
                                            <option value="2">Comunhão Universal de Bens</option>
                                            <option value="3">Separação de bens</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Data casamento</label>
                                        <input type="date" name="comprador[data_casamento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CEP Residencial</label>
                                        <input type="text" onkeyup="pesquisacep(1)" name="endereco_comprador[cep]" id="cep1"
                                            placeholder="" class="form-control form-control-border">
                                    </div>

                                    <div class="col-5">
                                        <label>Endereço residencial</label>
                                        <input type="text" name="endereco_comprador[logradouro]" id="rua1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-2">
                                        <label>Número</label>
                                        <input type="text" name="endereco_comprador[numero]" id="numero1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <input type="text" name="endereco_comprador[complemento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="endereco_comprador[bairro]" id="bairro1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="endereco_comprador[cidade]" id="cidade1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="endereco_comprador[uf]"
                                            class="custom-select form-control form-control-border" id="uf1">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="endereco_comprador[telefone]" id="telefone" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="endereco_comprador[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="comprador[email]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>


                                </div>


                            </div>
                        </div>

                        <div class="card card-navy ">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Profissionais Comprador 1
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nome da empresa</label>
                                        <input type="text" name="profissao_comprador[nome_empresa]"
                                            placeholder="Nome da empresa" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="profissao_comprador[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="profissao_comprador[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="profissao_comprador[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="profissao_comprador[renda_mensal]"
                                            placeholder="Renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="profissao_comprador[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="profissao_comprador[origem_renda]" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>

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
                                        <input type="text" name="conjuge[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
                                    </div>
                                    <div class="col-4">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="conjuge[data_nascimento]" placeholder="Data de Nascimento"
                                            class="form-control form-control-border">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Nome</label>
                                        <input type="text" name="conjuge[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Sexo</label>
                                        <select name="conjuge[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Nome da mãe</label>
                                        <input type="text" name="conjuge[nome_mae]" placeholder="Nome da mãe"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <select name="conjuge[pais]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Brasileiro</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="conjuge[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <select name="conjuge[tipo_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="rg">RG</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="conjuge[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="conjuge[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="conjuge[estado_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">RS</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data emissão</label>
                                        <input type="date" name="conjuge[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="conjuge[telefone]" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="conjuge[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="conjuge[email]" placeholder=""
                                            class="form-control form-control-border">
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
                                        <input type="text" name="conjuge[nome_empresa]" placeholder="Nome da empresa"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="conjuge[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="conjuge[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="conjuge[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="conjuge[renda_mensal]" placeholder="Renda mensal"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="conjuge[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="conjuge[origem_renda]" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row justify-content-end mb-2">
                            <div class="col-12 col-md-3 pull-right">
                                <input type="button" class="btn btn-block btn-outline-primary" onclick="addComprador2()"
                                    value="Adicionar Comprador">
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
                                <input type="hidden" id="seleciona-comprador-2" name="comprador2[ativo]">
                                <div class="row">
                                    <div class="col-4">
                                        <label>CPF comprador </label>
                                        <input type="text" name="comprador2[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
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
                                            <option value="1">Solteiro(a)</option>
                                            <option value="2">Casado(a)</option>
                                            <option value="3">União estável</option>
                                            <option value="4">Divorciado(a)</option>
                                            <option value="5">Viúvo(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nome</label>
                                        <input type="text" name="comprador2[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Sexo</label>
                                        <select name="comprador2[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="comprador2[pais]" placeholder="Nacionalidade"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="comprador2[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <input type="text" name="comprador2[tipo_documento]" placeholder="Documento"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="comprador2[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="comprador2[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="comprador2[estado_documento]"
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
                                        <input type="date" name="comprador2[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3 dados-casamento2" style="display:none;">
                                    <div class="col-6">
                                        <label>Regime de bens</label>
                                        <select name="comprador2[regime_bens]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Comunhão parcial de bens</option>
                                            <option value="2">Comunhão Universal de Bens</option>
                                            <option value="3">Separação de bens</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Data casamento</label>
                                        <input type="date" name="comprador2[data_casamento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CEP Residencial</label>
                                        <input type="text" onkeyup="pesquisacep(1)" name="endereco_comprador2[cep]"
                                            id="cep1" placeholder="" class="form-control form-control-border">
                                    </div>

                                    <div class="col-5">
                                        <label>Endereço residencial</label>
                                        <input type="text" name="endereco_comprador2[logradouro]" id="rua1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-2">
                                        <label>Número</label>
                                        <input type="text" name="endereco_comprador2[numero]" id="numero1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <input type="text" name="endereco_comprador2[complemento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="endereco_comprador2[bairro]" id="bairro1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="endereco_comprador2[cidade]" id="cidade1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="endereco_comprador2[uf]"
                                            class="custom-select form-control form-control-border" id="uf1">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="endereco_comprador2[telefone]" id="telefone" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="endereco_comprador2[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="comprador2[email]" placeholder=""
                                            class="form-control form-control-border">
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
                                        <input type="text" name="profissao_comprador2[nome_empresa]"
                                            placeholder="Nome da empresa" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="profissao_comprador2[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="profissao_comprador2[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="profissao_comprador2[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="profissao_comprador2[renda_mensal]"
                                            placeholder="Renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="profissao_comprador2[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="profissao_comprador2[origem_renda]" placeholder="Origem"
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
                                        <input type="text" name="conjuge2[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
                                    </div>
                                    <div class="col-4">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="conjuge2[data_nascimento]" placeholder="Data de Nascimento"
                                            class="form-control form-control-border">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Nome</label>
                                        <input type="text" name="conjuge2[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Sexo</label>
                                        <select name="conjuge2[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Nome da mãe</label>
                                        <input type="text" name="conjuge2[nome_mae]" placeholder="Nome da mãe"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <select name="conjuge2[pais]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Brasileiro</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="conjuge2[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <select name="conjuge2[tipo_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="rg">RG</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="conjuge2[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="conjuge2[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="conjuge2[estado_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">RS</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data emissão</label>
                                        <input type="date" name="conjuge2[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="conjuge2[telefone]" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="conjuge2[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="conjuge2[email]" placeholder=""
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
                                        <input type="text" name="conjuge2[nome_empresa]" placeholder="Nome da empresa"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="conjuge2[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="conjuge2[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="conjuge2[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="conjuge2[renda_mensal]" placeholder="Renda mensal"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="conjuge2[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="conjuge2[origem_renda]" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- comprador 2 --}}

                        <div class="row justify-content-end mb-2 btn-comprador3" style="display:none;">
                            <div class="col-12 col-md-3 pull-right">
                                <input type="button" class="btn btn-block btn-outline-primary" onclick="addComprador3()"
                                    value="Adicionar Comprador">
                            </div>
                        </div>

                        {{-- comprador 3 --}}
                        <div class="card card-navy comprador3" style="display:none;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Pessoais Comprador 3
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="hidden" id="seleciona-comprador-3" name="comprador3[ativo]">

                                        <label>CPF comprador </label>
                                        <input type="text" name="comprador3[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
                                    </div>
                                    <div class="col-4">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="comprador3[nascimento]" placeholder="Data de Nascimento"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado Civil</label>
                                        <select name="comprador3[estado_civil]" onchange="setEstadoCivil3()"
                                            class="custom-select form-control form-control-border" id="estado-civil-3">
                                            <option value="">Selecione</option>
                                            <option value="1">Solteiro(a)</option>
                                            <option value="2">Casado(a)</option>
                                            <option value="3">União estável</option>
                                            <option value="4">Divorciado(a)</option>
                                            <option value="5">Viúvo(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nome</label>
                                        <input type="text" name="comprador3[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Sexo</label>
                                        <select name="comprador3[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="comprador3[pais]" placeholder="Nacionalidade"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="comprador3[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <input type="text" name="comprador3[tipo_documento]" placeholder="Documento"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="comprador3[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="comprador3[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="comprador3[estado_documento]"
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
                                        <input type="date" name="comprador3[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3 dados-casamento3" style="display:none;">
                                    <div class="col-6">
                                        <label>Regime de bens</label>
                                        <select name="comprador3[regime_bens]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Comunhão parcial de bens</option>
                                            <option value="2">Comunhão Universal de Bens</option>
                                            <option value="3">Separação de bens</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Data casamento</label>
                                        <input type="date" name="comprador3[data_casamento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CEP Residencial</label>
                                        <input type="text" onkeyup="pesquisacep(1)" name="endereco_comprador3[cep]"
                                            id="cep1" placeholder="" class="form-control form-control-border">
                                    </div>

                                    <div class="col-5">
                                        <label>Endereço residencial</label>
                                        <input type="text" name="endereco_comprador3[logradouro]" id="rua1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-2">
                                        <label>Número</label>
                                        <input type="text" name="endereco_comprador3[numero]" id="numero1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <input type="text" name="endereco_comprador3[complemento]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="endereco_comprador3[bairro]" id="bairro1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="endereco_comprador3[cidade]" id="cidade1" placeholder=""
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="endereco_comprador3[uf]"
                                            class="custom-select form-control form-control-border" id="uf1">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="endereco_comprador3[telefone]" id="telefone" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="endereco_comprador3[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="comprador3[email]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>


                                </div>


                            </div>
                        </div>

                        <div class="card card-navy comprador3" style="display:none;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Profissionais Comprador 3
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nome da empresa</label>
                                        <input type="text" name="profissao_comprador3[nome_empresa]"
                                            placeholder="Nome da empresa" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="profissao_comprador3[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="profissao_comprador3[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="profissao_comprador3[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="profissao_comprador3[renda_mensal]"
                                            placeholder="Renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="profissao_comprador3[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="profissao_comprador3[origem_renda]" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card card-navy conjuge3" style="display:none;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados Pessoais do cônjuge do Comprador 3
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label>CPF cônjuge 1</label>
                                        <input type="text" name="conjuge3[cpf]" placeholder="CPF"
                                            class="form-control form-control-border cpf">
                                    </div>
                                    <div class="col-4">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="conjuge3[data_nascimento]" placeholder="Data de Nascimento"
                                            class="form-control form-control-border">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Nome</label>
                                        <input type="text" name="conjuge3[nome]" placeholder="Nome"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Sexo</label>
                                        <select name="conjuge3[sexo]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Nome da mãe</label>
                                        <input type="text" name="conjuge3[nome_mae]" placeholder="Nome da mãe"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Nacionalidade</label>
                                        <select name="conjuge3[pais]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Brasileiro</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Naturalidade</label>
                                        <input type="text" name="conjuge3[naturalidade]" placeholder="Naturalidade"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Documento</label>
                                        <select name="conjuge3[tipo_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="rg">RG</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Nº Documento</label>
                                        <input type="text" name="conjuge3[num_documento]" placeholder="Nº Documento"
                                            class="form-control form-control-border">
                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Órgão expedidor</label>
                                        <input type="text" name="conjuge3[orgao_emissor]" placeholder="Órgão expedidor"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>UF emissão</label>
                                        <select name="conjuge3[estado_documento]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">RS</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data emissão</label>
                                        <input type="date" name="conjuge3[data_emissao]" placeholder="Data emissão"
                                            class="form-control form-control-border">
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Telefone</label>
                                        <input type="text" name="conjuge3[telefone]" placeholder=""
                                            class="form-control form-control-border telefone">
                                    </div>

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="conjuge3[celular]" placeholder=""
                                            class="form-control form-control-border celular">
                                    </div>

                                    <div class="col-4">
                                        <label>E-mail</label>
                                        <input type="text" name="conjuge3[email]" placeholder=""
                                            class="form-control form-control-border">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card card-navy conjuge3" style="display:none;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados profissionais do cônjuge do comprador 3
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nome da empresa</label>
                                        <input type="text" name="conjuge3[nome_empresa]" placeholder="Nome da empresa"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Tipo contratação</label>
                                        <select name="conjuge3[contratacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Assalariado</option>
                                            <option value="2">Aposentado</option>
                                            <option value="3">Sócio Proprietário</option>
                                            <option value="4">Autônomo</option>
                                            <option value="5">Profissional liberal</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Data admissão</label>
                                        <input type="date" name="conjuge3[admissao]"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cargo</label>
                                        <input type="text" name="conjuge3[cargo]" placeholder="Cargo"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Renda mensal</label>
                                        <input type="text" name="conjuge3[renda_mensal]" placeholder="Renda mensal"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Outra renda mensal</label>
                                        <input type="text" name="conjuge3[outra_renda_mensal]"
                                            placeholder="Outra renda mensal" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Origem</label>
                                        <input type="text" name="conjuge3[origem_renda]" placeholder="Origem"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- comprador 3 --}}


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
                                        <input type="text" name="processo[valor_operacao]" placeholder="R$"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Valor a financiar</label>
                                        <input type="text" name="processo[valor_financiar]" placeholder="R$"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" onchange="campoFgts()" type="checkbox"
                                                id="utilizar_fgts" name="processo[utiliza_fgts]" value="1">
                                            <label for="utilizar_fgts" class="custom-control-label">Utilizar
                                                FGTS</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" onchange="campoDespesas()"
                                                id="financiar_despesas" name="processo[financiar_despesas]" value="1">
                                            <label for="financiar_despesas" class="custom-control-label">Financiar
                                                Despesas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">

                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="financiar_tarifa"
                                                name="processo[financiar_tarifa]" value="1">
                                            <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa
                                                de
                                                Avaliação</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-4 valor_fgts" style="display:none">
                                        <label>Valor FGTS</label>
                                        <input type="text" name="processo[fgts]" placeholder="Valor FGTS"
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-4 valor_despesas" style="display:none">
                                        <label>Valor Despesas</label>
                                        <input type="text" name="processo[despesas]" placeholder="Valor Despesas"
                                            class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="col-4">
                                        <label>Recursos Próprios</label>
                                        <input type="text" name="processo[recursos_proprios]"
                                            placeholder="Valor Recursos Próprios" class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Valor de entrada total</label>
                                        <input type="text" name="processo[valor_total_entrada]"
                                            placeholder="Valor Total Entrada" class="form-control form-control-border">
                                    </div>
                                </div>


                                <div class="row mt-2">

                                    <div class="col-5">
                                        <label>Valor total financiado</label>
                                        <input type="text" name="processo[valor_total_financiado]"
                                            placeholder="Valor total financiado" class="form-control form-control-border">
                                    </div>

                                    <div class="col-1 mr-2">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel1"
                                                name="processo[tipo_imovel]" value="1">
                                            <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel2"
                                                name="processo[tipo_imovel]" value="2">
                                            <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel3"
                                                name="processo[tipo_imovel]" value="3">
                                            <label for="tipo_imovel3" class="custom-control-label">Terreno</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel4"
                                                name="processo[tipo_imovel]" value="4">
                                            <label for="tipo_imovel4" class="custom-control-label">Construção</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="tipo_imovel5"
                                                name="processo[tipo_imovel]" value="5">
                                            <label for="tipo_imovel5" class="custom-control-label">Terreno +
                                                Construção</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">


                                    <div class="col-6">
                                        <label>Meses</label>
                                        <input type="text" name="processo[meses_financiamento]" placeholder="Meses"
                                            class="form-control form-control-border">
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="card card-navy " id="vendedor1">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Dados do Vendedor
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tipo de vendedor</label>
                                        <select name="vendedor[tipo]" onchange="tipoVendedor()" id="vendedor_tipo"
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
                                            <input type="text" name="vendedor[nome]" placeholder="Nome do vendedor"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label>Estado Civil</label>
                                            <select name="vendedor[estado_civil]"
                                                class="custom-select form-control form-control-border">
                                                <option value="">Selecione</option>
                                                <option value="1">Solteiro(a)</option>
                                                <option value="2">Casado(a)</option>
                                                <option value="3">União estável</option>
                                                <option value="4">Divorciado(a)</option>
                                                <option value="5">Viúvo(a)</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>CPF</label>
                                            <input type="text" name="vendedor[cpf]" placeholder="CPF"
                                                class="form-control form-control-border cpf">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Telefone</label>
                                            <input type="text" name="vendedor[telefone]" placeholder="Telefone"
                                                class="form-control form-control-border telefone">
                                        </div>

                                        <div class="col-6">
                                            <label>Profissão</label>
                                            <input type="text" name="vendedor[profissao]" placeholder="Profissão"
                                                class="form-control form-control-border">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <input type="text" name="vendedor[banco]" placeholder="Banco"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <input type="text" name="vendedor[agencia]" placeholder="Agência"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <input type="text" name="vendedor[conta]" placeholder="Conta"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>
                                            <select name="vendedor[procurador]" onchange="selectProcurador(1)"
                                                class="custom-select form-control form-control-border"
                                                id="possui-procurador">
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
                                                <input type="text" name="vendedor[nome_procurador]"
                                                    placeholder="Nome Procurador" class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <input type="text" name="vendedor[cpf_procurador]"
                                                    placeholder="CPF Procurador"
                                                    class="form-control form-control-border cpf">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <input type="email" name="vendedor[email_procurador]"
                                                    placeholder="E-mail Procurador"
                                                    class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone</label>
                                                <input type="text" name="vendedor[telefone_procurador]"
                                                    placeholder="Telefone Procurador"
                                                    class="form-control form-control-border telefone">
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="pessoa-juridica" style="display: none;">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Razão social</label>
                                            <input type="text" name="vendedor[nome]" placeholder="Razão Social"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label>CNPJ</label>
                                            <input type="text" name="vendedor[cnpj]" placeholder="CPF"
                                                class="form-control form-control-border cpf">
                                        </div>
                                        <div class="col-4">
                                            <label>Telefone</label>
                                            <input type="text" name="vendedor[telefone]" placeholder="Telefone"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <input type="text" name="vendedor[banco]" placeholder="Banco"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <input type="text" name="vendedor[agencia]" placeholder="Agência"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <input type="text" name="vendedor[conta]" placeholder="Conta"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>
                                            <select name="vendedor[procurador]"
                                                class="custom-select form-control form-control-border"
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
                                                <input type="text" name="vendedor[nome_procurador]"
                                                    placeholder="Nome Procurador" class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <input type="text" name="vendedor[cpf_procurador]"
                                                    placeholder="CPF Procurador"
                                                    class="form-control form-control-border cpf">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <input type="email" name="vendedor[email_procurador]"
                                                    placeholder="E-mail Procurador"
                                                    class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone</label>
                                                <input type="text" name="vendedor[telefone_procurador]"
                                                    placeholder="Telefone Procurador"
                                                    class="form-control form-control-border telefone">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mb-2">
                            <div class="col-12 col-md-3 pull-right">
                                <input type="button" class="btn btn-block btn-outline-primary" onclick="addVendedor2()"
                                    value="Adicionar Vendedor">
                            </div>
                        </div>

                        <div class="card card-navy " id="vendedor2" style="display: none;">
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
                                            <input type="text" name="vendedor2[nome]" placeholder="Nome do vendedor"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label>Estado Civil</label>
                                            <select name="vendedor2[estado_civil]"
                                                class="custom-select form-control form-control-border">
                                                <option value="">Selecione</option>
                                                <option value="1">Solteiro(a)</option>
                                                <option value="2">Casado(a)</option>
                                                <option value="3">União estável</option>
                                                <option value="4">Divorciado(a)</option>
                                                <option value="5">Viúvo(a)</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>CPF</label>
                                            <input type="text" name="vendedor2[cpf]" placeholder="CPF"
                                                class="form-control form-control-border cpf">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Telefone</label>
                                            <input type="text" name="vendedor2[telefone]" placeholder="Telefone"
                                                class="form-control form-control-border telefone">
                                        </div>

                                        <div class="col-6">
                                            <label>Profissão</label>
                                            <input type="text" name="vendedor2[profissao]" placeholder="Profissão"
                                                class="form-control form-control-border">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <input type="text" name="vendedor2[banco]" placeholder="Banco"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <input type="text" name="vendedor2[agencia]" placeholder="Agência"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <input type="text" name="vendedor2[conta]" placeholder="Conta"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>
                                            <select name="vendedor2[procurador]" onchange="selectProcurador(1)"
                                                class="custom-select form-control form-control-border"
                                                id="possui-procurador">
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
                                                <input type="text" name="vendedor2[nome_procurador]"
                                                    placeholder="Nome Procurador" class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <input type="text" name="vendedor2[cpf_procurador]"
                                                    placeholder="CPF Procurador"
                                                    class="form-control form-control-border cpf">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <input type="email" name="vendedor2[email_procurador]"
                                                    placeholder="E-mail Procurador"
                                                    class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone</label>
                                                <input type="text" name="vendedor2[telefone_procurador]"
                                                    placeholder="Telefone Procurador"
                                                    class="form-control form-control-border telefone">
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="pessoa-juridica" style="display: none;">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label>Razão social</label>
                                            <input type="text" name="vendedor2[nome]" placeholder="Razão Social"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label>CNPJ</label>
                                            <input type="text" name="vendedor2[cnpj]" placeholder="CPF"
                                                class="form-control form-control-border cpf">
                                        </div>
                                        <div class="col-4">
                                            <label>Telefone</label>
                                            <input type="text" name="vendedor2[telefone]" placeholder="Telefone"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="banco">Banco</label>
                                            <input type="text" name="vendedor2[banco]" placeholder="Banco"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="agencia">Agência</label>
                                            <input type="text" name="vendedor2[agencia]" placeholder="Agência"
                                                class="form-control form-control-border">
                                        </div>
                                        <div class="col-4">
                                            <label for="conta">Conta</label>
                                            <input type="text" name="vendedor2[conta]" placeholder="Conta"
                                                class="form-control form-control-border">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">Possui procurador?</label>
                                            <select name="vendedor2[procurador]"
                                                class="custom-select form-control form-control-border"
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
                                                <input type="text" name="vendedor2[nome_procurador]"
                                                    placeholder="Nome Procurador" class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">CPF Procurador</label>
                                                <input type="text" name="vendedor2[cpf_procurador]"
                                                    placeholder="CPF Procurador"
                                                    class="form-control form-control-border cpf">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <label for="">E-mail Procurador</label>
                                                <input type="email" name="vendedor2[email_procurador]"
                                                    placeholder="E-mail Procurador"
                                                    class="form-control form-control-border">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Telefone</label>
                                                <input type="text" name="vendedor2[telefone_procurador]"
                                                    placeholder="Telefone Procurador"
                                                    class="form-control form-control-border telefone">
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
                                        <input type="text" name="imovel[cep]" placeholder="CEP do imóvel"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-5">
                                        <label>Endereço</label>
                                        <input type="text" name="imovel[endereco]" placeholder="Endereço do imóvel"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Número</label>
                                        <input type="text" name="imovel[numero]" placeholder="Número"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-2">
                                        <label>Complemento</label>
                                        <input type="text" name="imovel[complemento]" placeholder="Complemento"
                                            class="form-control form-control-border">
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="imovel[bairro]" placeholder="Bairro"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="imovel[cidade]" placeholder="Cidade"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="imovel[estado]"
                                            class="custom-select form-control form-control-border">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <div class="col-6">
                                        <label>Vagas na garagem</label>
                                        <input type="number" name="imovel[vagas]" placeholder="Quantidade de vagas" min="0"
                                            class="form-control form-control-border">
                                    </div>

                                    <div class="col-6">
                                        <label>Número(s) vaga(s)</label>
                                        <input type="text" name="imovel[numero_vaga]" placeholder="Número(s) vaga(s)"
                                            class="form-control form-control-border">
                                    </div>



                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Contato de avaliação</label>
                                        <input type="text" name="imovel[contato_avaliacao]"
                                            placeholder="Contato de avaliação" class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Telefone do contato</label>
                                        <input type="text" name="imovel[telefone_contato]"
                                            placeholder="Contato de avaliação" class="form-control form-control-border">
                                    </div>

                                    <div class="col-4">
                                        <label>Tipo </label>
                                        <select name="imovel[novo_usado]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Novo</option>
                                            <option value="2">Usado</option>
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
                                        <select name="processo[banco]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Itaú</option>
                                            <option value="2">Bradesco</option>
                                            <option value="3">Santander</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Dia da prestação</label>
                                        <input type="number" min="1" max="31" name="processo[dia_prestacao]"
                                            placeholder="Dia da prestação" class="form-control form-control-border">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Sistema de amortização</label>
                                        <select name="processo[amortizacao]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="sac">Sac</option>
                                            <option value="price">Price</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Indexador</label>
                                        <select name="processo[indexador]"
                                            class="custom-select form-control form-control-border">
                                            <option value="">Selecione</option>
                                            <option value="1">Poupança</option>
                                            <option value="2">TR</option>
                                            <option value="3">IPCA</option>
                                            <option value="4">Taxa Fixa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Parceiro</label>
                                        <select name="processo[id_parceiro]"
                                            class="custom-select form-control form-control-border"
                                            onchange="buscaCorretores()" id="id_parceiro" required>
                                            <option value="">Selecione</option>
                                            @foreach ($parceiros as $p)
                                                @if ($p->id != 1)
                                                    <option value="{{ $p->id }}">{{ $p->apelido }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Corretor</label>
                                        <select name="processo[id_corretor]"
                                            class="custom-select form-control form-control-border" id="id_corretor"
                                            required>
                                            <option value="">Selecione</option>

                                        </select>
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
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <style>
        .card - header {
            padding - bottom: 0 !important;
        }

        .card - title {
            font - size: 13px !important;
        }

        label {
            font - size: 12px !important;
        }

    </style>

    <script>
        let target;

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

        function campoFgts() {
            if ($('#utilizar_fgts').is(':checked')) {
                $('.valor_fgts').show()
            } else {
                $('.valor_fgts').hide()

            }
        }

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

        function addComprador2() {
            $('.comprador2').show();
            $(".btn-comprador3").show();
            $('#seleciona-comprador-2').val(1);
        }

        function addComprador3() {
            $('.comprador3').show();
            $('#seleciona-comprador-3').val(2);
        }

        function campoDespesas() {
            if ($('#financiar_despesas').is(':checked')) {
                $('.valor_despesas').show()
            } else {
                $('.valor_despesas').hide()

            }
        }

        function setEstadoCivil() {
            let value = $('#estado-civil-1').val();
            if (value == 2 || value == 3) {
                $('.conjuge1').show();
            } else {
                $('.conjuge1').hide();
            }
        }

        function setEstadoCivil2() {
            let value = $('#estado-civil-2').val();
            if (value == 2 || value == 3) {
                $('.conjuge2').show();
            } else {
                $('.conjuge2').hide();
            }
        }

        function setEstadoCivil3() {
            let value = $('#estado-civil-3').val();
            if (value == 2 || value == 3) {
                $('.conjuge3').show();
            } else {
                $('.conjuge3').hide();
            }
        }

        function tipoVendedor() {
            var tipoVendedor = document.querySelector('#vendedor1 #vendedor_tipo')

            if (tipoVendedor.value == 1) {
                document.querySelector('#vendedor1 .pessoa-juridica').setAttribute('style', 'display:none;')
                $('#vendedor1 .pessoa-juridica .form-control').attr('disabled', true)
                $('#vendedor1 .pessoa-fisica .form-control').removeAttr('disabled');
                document.querySelector('#vendedor1 .pessoa-fisica').removeAttribute('style')
            } else {
                document.querySelector('#vendedor1 .pessoa-fisica').setAttribute('style', 'display:none;')
                document.querySelector('#vendedor1 .pessoa-juridica').removeAttribute('style')
                $('#vendedor1 .pessoa-fisica .form-control').attr('disabled', true)
                $('#vendedor1 .pessoa-juridica .form-control').removeAttr('disabled');
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

        function limpa_formulário_cep(target) {
            //Limpa valores do formulário de cep.
            document.getElementById('rua' + target).value = ("");
            document.getElementById('bairro' + target).value = ("");
            document.getElementById('cidade' + target).value = ("");
            document.getElementById('uf' + target).value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua' + this.target).value = (conteudo.logradouro);
                document.getElementById('bairro' + this.target).value = (conteudo.bairro);
                document.getElementById('cidade' + this.target).value = (conteudo.localidade);
                document.getElementById('uf' + this.target).value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(target) {
            this.target = target;
            var valor = document.getElementById('cep' + target);
            console.log(valor.value)
            //Nova variável "cep" somente com dígitos.
            var cep = valor.value.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua' + target).value = "...";
                    document.getElementById('bairro' + target).value = "...";
                    document.getElementById('cidade' + target).value = "...";
                    document.getElementById('uf' + target).value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep(target);
                    // alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

        function buscaCorretores() {
            let parceiro = $('#id_parceiro').val();

            if (isNaN(parceiro)) return;


            let optionTemp = document.createElement('option');
            optionTemp.setAttribute('selected', 'selected');
            optionTemp.innerHTML = "Buscando corretores...";
            $('#id_corretor').append(optionTemp);


            $.ajax({
                    method: "GET",
                    url: "busca-corretor/" + parceiro,
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

        function addVendedor2() {
            $('#vendedor2').show()
        }
    </script>

@endsection
