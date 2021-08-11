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
                                <input type="text" name="cpf1" id="" placeholder="CPF" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Data de Nascimento</label>
                                <input type="date" name="nascimento1" placeholder="Data de Nascimento" id="" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Estado Civil</label>
                                <select name="estado_civil1" class="custom-select form-control form-control-border" id="">
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
                                <input type="text" name="cpf_conjuge1" id="" placeholder="CPF" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Data de Nascimento</label>
                                <input type="date" name="nascimento_conjuge1" placeholder="Data de Nascimento" id="" class="form-control form-control-border">
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
                                <input type="text" name="valor_imovel" id="" placeholder="R$" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Valor a financiar</label>
                                <input type="date" name="valor_financiar" placeholder="R$" id="" class="form-control form-control-border">
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="utilizar_fgts" name="utilizar_fgts" value="true">
                                    <label for="utilizar_fgts" class="custom-control-label">Utilizar FGTS</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="financiar_despesas" name="financiar_despesas" value="true">
                                    <label for="financiar_despesas" class="custom-control-label">Financiar Despesas</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="financiar_tarifa" name="financiar_tarifa" value="true">
                                    <label for="financiar_tarifa" class="custom-control-label">Financiar Tarifa de Avaliação</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            
                            <div class="col-4">
                                <label>Recursos Próprios</label>
                                <input type="text" name="recursos_próprios" placeholder="Valor Recursos Próprios" id="" class="form-control form-control-border"> 
                            </div>
                            <div class="col-4">
                                <label>Valor FGTS</label>
                                <input type="text" name="valor_fgts" placeholder="Valor FGTS" id="" class="form-control form-control-border"> 
                            </div>
                            <div class="col-4">
                                <label>Valor de entrada total</label>
                                <input type="text" name="valor_total_entrada" placeholder="Valor Total Entrada" id="" class="form-control form-control-border">
                            </div>
                        </div>


                        <div class="row mt-2">
                            
                            <div class="col-8">
                                <label>Valor total financiado</label>
                                <input type="text" name="valor_total_financiado" placeholder="Valor total financiado" id="" class="form-control form-control-border"> 
                            </div>
                            <div class="col-4">
                                <label>LTV</label>
                                <input type="text" name="ltv" placeholder="LTV" id="" class="form-control form-control-border"> 
                            </div>
                           
                        </div>

                        <div class="row mt-3">
                            
                            <div class="col-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tipo_imovel1" name="tipo_imovel" value="residencial">
                                    <label for="tipo_imovel1" class="custom-control-label">Residencial</label>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tipo_imovel2" name="tipo_imovel" value="comercial">
                                    <label for="tipo_imovel2" class="custom-control-label">Comercial</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <label>Meses</label>
                                <input type="text" name="meses" placeholder="Meses" id="" class="form-control form-control-border"> 
                            </div>
                            
                            <div class="col-5">
                                <label for="">Estado</label>
                                <select name="estado" class="custom-select form-control form-control-border" id="">
                                    <option value="">Rio Grande do Sul</option>
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
                                <input type="text" name="cpf1" id="" placeholder="CPF" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>Sexo</label>
                                <select name="sexo" class="custom-select form-control form-control-border" id="">
                                    <option value="">Selecione</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Nome da mãe</label>
                                <input type="text" name="nome_mae" id="" placeholder="Nome da mãe" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label>Nacionalidade</label>
                                <select name="nacionalidade" class="custom-select form-control form-control-border" id="">
                                    <option value="">Selecione</option>
                                    <option value="1">Brasileiro</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Naturalidade</label>
                                <input type="text" name="Naturalidade" id="" placeholder="Naturalidade" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label>Documento</label>
                                <select name="nacionalidade" class="custom-select form-control form-control-border" id="">
                                    <option value="">Selecione</option>
                                    <option value="1">RG</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Nº Documento</label>
                                <input type="text" name="numero_documento" id="" placeholder="Nº Documento" class="form-control form-control-border">
                            </div>
                            
                        </div>


                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Órgão expedidor</label>
                                <input type="text" name="orgao_expedidor" id="" placeholder="Órgão expedidor" class="form-control form-control-border">
                            </div>
                            <div class="col-4">
                                <label>UF emissão</label>
                                <select name="uf_emissao" class="custom-select form-control form-control-border" id="">
                                    <option value="">Selecione</option>
                                    <option value="1">RS</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Data emissão</label>
                                <input type="date" name="data_emissao" id="" placeholder="Data emissão" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label>Regime de bens</label>
                                <select name="regime_bens" class="custom-select form-control form-control-border" id="">
                                    <option value="">Selecione</option>
                                    <option value="1">Comunhão parcial de bens</option>
                                    <option value="2">Comunhão Universal de Bens</option>
                                    <option value="3">Separação de bens</option>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label>Data casamento</label>
                                <input type="date" name="data_casamento" id="" placeholder="" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <label>CEP Residencial</label>
                                <input type="text" name="cep_residencial" id="" placeholder="" class="form-control form-control-border">
                            </div>
                            
                            <div class="col-5">
                                <label>Endereço residencial</label>
                                <input type="text" name="endereco_residencial" id="" placeholder="" class="form-control form-control-border">
                            </div>

                            <div class="col-2">
                                <label>Número</label>
                                <input type="text" name="numero" id="" placeholder="" class="form-control form-control-border">
                            </div>
                            <div class="col-2">
                                <label>Complemento</label>
                                <input type="text" name="complemento" id="" placeholder="" class="form-control form-control-border">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="" placeholder="" class="form-control form-control-border">
                            </div>
                            
                            <div class="col-4">
                                <label>Cidade</label>
                                <input type="text" name="cidade" id="" placeholder="" class="form-control form-control-border">
                            </div>

                            <div class="col-4">
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
                                <input type="text" name="telefone" id="" placeholder="" class="form-control form-control-border">
                            </div>
                            
                            <div class="col-4">
                                <label>Celular</label>
                                <input type="text" name="celular" id="" placeholder="" class="form-control form-control-border">
                            </div>

                            <div class="col-4">
                                <label>E-mail</label>
                                <input type="text" name="email" id="" placeholder="" class="form-control form-control-border">
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
                                <input type="text" name="cep_imovel" id="" placeholder="CEP do imóvel" class="form-control form-control-border">
                            </div>
                            <div class="col-5">
                                <label>Endereço</label>
                                <input type="text" name="endereco_imovelr" id="" placeholder="Endereço do imóvel" class="form-control form-control-border">
                            </div>
                            <div class="col-2">
                                <label>Número</label>
                                <input type="text" name="numero_imovel" id="" placeholder="Número" class="form-control form-control-border">
                            </div>
                            <div class="col-2">
                                <label>Complemento</label>
                                <input type="text" name="complemento_imovel" id="" placeholder="Complemento" class="form-control form-control-border">
                            </div>
                        </div>
                        <div class="row mt-3">
                                
                                <div class="col-4">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro_vendedor" id="" placeholder="Bairro" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade_vendedor" id="" placeholder="Cidade" class="form-control form-control-border">
                                </div>
                                <div class="col-4">
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