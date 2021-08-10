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