@extends('layouts.master')


@section('breadcrumb')
              <li class="breadcrumb-item active">Nova Proposta</li>
@endsection

@section('content')
 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           
                <div class="col-12">
                 <form method="POST" enctype="multipart/form-data" action="{{ route('salvar-proposta') }}">
                    @csrf
                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Cliente(s)
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>CPF comprador 1</label>
                                    <input type="text" name="comprador[cpf]" id="" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Data de Nascimento</label>
                                    <input type="date" name="comprador[nascimento]" placeholder="Data de Nascimento" id="" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Estado Civil</label>
                                    <select name="comprador[estado_civil]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1">Solteiro(a)</option>
                                        <option value="2">Casado(a)</option>
                                        <option value="3">União estável</option>
                                        <option value="4">Divorciado(a)</option>
                                        <option value="5">Viúvo(a)</option>
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
                                    <input type="text" name="processo[valor_operacao]" id="" placeholder="R$" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Valor a financiar</label>
                                    <input type="text" name="processo[valor_financiar]" placeholder="R$" id="" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="utilizar_fgts" name="processo[utiliza_fgts]" value="1">
                                        <label for="utilizar_fgts" class="custom-control-label">Utilizar FGTS</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="financiar_despesas" name="processo[financiar_despesas]" value="1">
                                        <label for="financiar_despesas" class="custom-control-label">Financiar Despesas</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                
                                <div class="col-3">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="financiar_tarifa" name="processo[financiar_tarifa]" value="1">
                                        <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa de Avaliação</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                
                                <div class="col-4">
                                    <label>Recursos Próprios</label>
                                    <input type="text" name="processo[recursos_proprios]" placeholder="Valor Recursos Próprios" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>Valor FGTS</label>
                                    <input type="text" name="processo[fgts]" placeholder="Valor FGTS" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>Valor de entrada total</label>
                                    <input type="text" name="processo[valor_total_entrada]" placeholder="Valor Total Entrada" id="" class="form-control form-control-border">
                                </div>
                            </div>


                            <div class="row mt-2">
                                
                                <div class="col-5">
                                    <label>Valor total financiado</label>
                                    <input type="text" name="processo[valor_total_financiado]" placeholder="Valor total financiado" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-4">
                                    <label>LTV</label>
                                    <input type="text" name="processo[ltv]" placeholder="LTV" id="" class="form-control form-control-border"> 
                                </div>
                                <div class="col-1 mr-2">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="tipo_imovel1" name="processo[tipo_imovel]" value="1">
                                        <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="tipo_imovel2" name="processo[tipo_imovel]" value="2">
                                        <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="row mt-3">
                                
                                
                                <div class="col-6">
                                    <label>Meses</label>
                                    <input type="text" name="processo[meses_financiamento]" placeholder="Meses" id="" class="form-control form-control-border"> 
                                </div>
                                
                                <div class="col-6">
                                    <label for="">Estado</label>
                                    <select name="processo[estado]" class="custom-select form-control form-control-border" id="">
                                        <option value="RS">Rio Grande do Sul</option>
                                    </select>
                                </div>
                            </div>

                        </div>  
                    </div>   



                    <div class="card card-navy ">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Pessoais Comprador 1
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label>Nome</label>
                                    <input type="text" name="comprador[nome]" id="" placeholder="CPF" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Sexo</label>
                                    <select name="comprador[sexo]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Nome da mãe</label>
                                    <input type="text" name="comprador[nome_mae]" id="" placeholder="Nome da mãe" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Nacionalidade</label>
                                    <select name="comprador[pais]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1">Brasileiro</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Naturalidade</label>
                                    <input type="text" name="comprador[naturalidade]" id="" placeholder="Naturalidade" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Documento</label>
                                    <select name="comprador[tipo_documento]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="rg">RG</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Nº Documento</label>
                                    <input type="text" name="comprador[num_documento]" id="" placeholder="Nº Documento" class="form-control form-control-border">
                                </div>
                                
                            </div>


                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Órgão expedidor</label>
                                    <input type="text" name="comprador[orgao_emissor]" id="" placeholder="Órgão expedidor" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>UF emissão</label>
                                    <select name="comprador[estado_documento]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1">RS</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Data emissão</label>
                                    <input type="date" name="comprador[data_emissao]" id="" placeholder="Data emissão" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label>Regime de bens</label>
                                    <select name="comprador[regime_bens]" class="custom-select form-control form-control-border" id="">
                                        <option value="">Selecione</option>
                                        <option value="1">Comunhão parcial de bens</option>
                                        <option value="2">Comunhão Universal de Bens</option>
                                        <option value="3">Separação de bens</option>
                                    </select>
                                </div>
                                
                                <div class="col-6">
                                    <label>Data casamento</label>
                                    <input type="date" name="comprador[data_casamento]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3">
                                    <label>CEP Residencial</label>
                                    <input type="text" name="endereco_comprador[cep]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-5">
                                    <label>Endereço residencial</label>
                                    <input type="text" name="endereco_comprador[logradouro]" id="" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-2">
                                    <label>Número</label>
                                    <input type="text" name="endereco_comprador[numero]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Complemento</label>
                                    <input type="text" name="endereco_comprador[complemento]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Bairro</label>
                                    <input type="text" name="endereco_comprador[bairro]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-4">
                                    <label>Cidade</label>
                                    <input type="text" name="endereco_comprador[cidade]" id="" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>Estado</label>
                                    <select name="endereco_comprador[uf]" class="custom-select form-control form-control-border" id="">
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
                                    <input type="text" name="endereco_comprador[telefone]" id="" placeholder="" class="form-control form-control-border">
                                </div>
                                
                                <div class="col-4">
                                    <label>Celular</label>
                                    <input type="text" name="endereco_comprador[celular]" id="" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="col-4">
                                    <label>E-mail</label>
                                    <input type="text" name="comprador[email]" id="" placeholder="" class="form-control form-control-border">
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
                                    <input type="text" name="profissao_comprador[nome_empresa]" id="" placeholder="Nome da empresa" class="form-control form-control-border">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Tipo contratação</label>
                                    <select name="profissao_comprador[contratacao]" class="custom-select form-control form-control-border" id="">
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
                                    <input type="date" name="profissao_comprador[admissao]" id="" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Cargo</label>
                                    <input type="text" name="profissao_comprador[cargo]" id="" placeholder="Cargo" class="form-control form-control-border">
                                </div>
                            </div>

                             <div class="row mt-3">
                                <div class="col-4">
                                    <label>Renda mensal</label>
                                    <input type="text" name="profissao_comprador[renda_mensal]" id="" placeholder="Renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Outra renda mensal</label>
                                    <input type="text" name="profissao_comprador[outra_renda_mensal]" id="" placeholder="Outra renda mensal" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Origem</label>
                                    <input type="text" name="profissao_comprador[origem_renda]" id="" placeholder="Origem" class="form-control form-control-border">
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
                                    <select name="tipo_vendedor" onchange="tipoVendedor()" id="vendedor_tipo" class="custom-select form-control form-control-border" id="">
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
                                        <input type="text" name="nome_vendedor" id="" placeholder="Nome do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado Civil</label>
                                        <select name="estado_civil_vendedor" class="custom-select form-control form-control-border" id="">
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
                                        <input type="text" name="cpf_vendedor" id="" placeholder="CPF" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>CEP</label>
                                        <input type="text" name="cep_vendedor" id="" placeholder="CEP do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco_vendedor" id="" placeholder="Endereço do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Número</label>
                                        <input type="text" name="numero_vendedor" id="" placeholder="Número" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento_vendedor" id="" placeholder="Complemento" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro_vendedor" id="" placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade_vendedor" id="" placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Estado</label>
                                        <select name="estado" class="custom-select form-control form-control-border" id="">
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
                                        <input type="text" name="telefone_vendedor" id="" placeholder="Telefone" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Correntista Bradesco</label>
                                        <select name="correntista_bradesco_vendedor" class="custom-select form-control form-control-border" id="">
                                            <option value="">Selecione</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Profissão</label>
                                        <input type="text" name="profissao_vendedor" id="" placeholder="Profissão" class="form-control form-control-border">
                                    </div>
                                </div>






                            </div>

                            <div class="pessoa-juridica" style="display: none;">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Razão social</label>
                                        <input type="text" name="razao_social_vendedor" id="" placeholder="Razão Social" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>CNPJ</label>
                                        <input type="text" name="cpf_vendedor" id="" placeholder="CPF" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>CEP</label>
                                        <input type="text" name="cep_vendedor" id="" placeholder="CEP do vendedor" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco_vendedor" id="" placeholder="Endereço do vendedor" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Número</label>
                                        <input type="text" name="numero_vendedor" id="" placeholder="Número" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento_vendedor" id="" placeholder="Complemento" class="form-control form-control-border">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    
                                    <div class="col-3">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro_vendedor" id="" placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade_vendedor" id="" placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-3">
                                        <label>Estado</label>
                                        <select name="estado" class="custom-select form-control form-control-border" id="">
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
                                    <div class="col-3">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone_vendedor" id="" placeholder="Telefone" class="form-control form-control-border">
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
                                    <input type="text" name="imovel[cep]" id="" placeholder="CEP do imóvel" class="form-control form-control-border">
                                </div>
                                <div class="col-5">
                                    <label>Endereço</label>
                                    <input type="text" name="imovel[endereco]" id="" placeholder="Endereço do imóvel" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Número</label>
                                    <input type="text" name="imovel[numero]" id="" placeholder="Número" class="form-control form-control-border">
                                </div>
                                <div class="col-2">
                                    <label>Complemento</label>
                                    <input type="text" name="imovel[complemento]" id="" placeholder="Complemento" class="form-control form-control-border">
                                </div>
                            </div>
                            <div class="row mt-3">
                                    
                                    <div class="col-4">
                                        <label>Bairro</label>
                                        <input type="text" name="imovel[bairro]" id="" placeholder="Bairro" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Cidade</label>
                                        <input type="text" name="imovel[cidade]" id="" placeholder="Cidade" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Estado</label>
                                        <select name="imovel[estado]" class="custom-select form-control form-control-border" id="">
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
                                        <label>Vagas na garagem</label>
                                        <input type="number" name="imovel[vagas]" id="" placeholder="Quantidade de vagas" min="0" class="form-control form-control-border">
                                    </div>
                                    <div class="col-4">
                                        <label>Contato de avaliação</label>
                                        <input type="text" name="imovel[contato_avaliacao]" id="" placeholder="Contato de avaliação" class="form-control form-control-border">
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
            document.querySelector('.pessoa-fisica').removeAttribute('style')
        } else {
            document.querySelector('.pessoa-fisica').setAttribute('style','display:none;')
            document.querySelector('.pessoa-juridica').removeAttribute('style')
        }
    }
</script>