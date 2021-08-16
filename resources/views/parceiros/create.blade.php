@extends('layouts.master')


@section('breadcrumb')
              <li class="breadcrumb-item active">Novo parceiro</li>
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
                            Dados Parceiro
                        </h3>
                    </div>
                    <div class="card-body">
                    
                        <form method="POST" enctype="multipart/form-data" action="{{ route('salvar-parceiro') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label>Tipo Parceiro</label>
                                    <select name="tipo" onchange="tipoParceiro()" id="tipo-parceiro" class="custom-select form-control form-control-border"  required>
                                        <option value="">Selecione</option>
                                        <option value="1">Pessoa Física</option>
                                        <option value="2" selected>Pessoa Jurídica</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row mt-2" id="target-tipo-parceiro">
                                
                            </div>
                            
                            <div class="row mt-2">
                                
                                <div class="col-6">
                                    <label>E-mail</label>
                                    <input type="text" name="email" placeholder="Apelido"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-6">
                                    <label>E-mail do financeiro</label>
                                    <input type="text" name="email_financeiro" placeholder="Apelido"  class="form-control form-control-border" required>
                                </div>
                                
                            </div>

                            <div class="row mt-2">
                                <div class="col-4">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" placeholder="Telefone"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-4">
                                    <label>Celular</label>
                                    <input type="text" name="celular" placeholder="Celular"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-4">
                                    <label>Nome de contato</label>
                                    <input type="text" name="nome_contato" placeholder="Nome de contato"  class="form-control form-control-border" required>
                                </div>
                                
                            </div>

                            <div class="row mt-2">
                                <div class="col-4">
                                    <label>CEP</label>
                                    <input type="text" onkeyup="pesquisacep()" name="cep" placeholder="CEP" id="busca_cep" class="form-control form-control-border" required>
                                </div>
                                <div class="col-6">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco" placeholder="Endereço" id="rua" class="form-control form-control-border" required>
                                </div>
                                <div class="col-2">
                                    <label>Número</label>
                                    <input type="text" name="numero" placeholder="Número"  class="form-control form-control-border" required>
                                </div>
                                
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label>Complemento</label>
                                    <input type="text" name="complemento" placeholder="Complemento"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-6">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" placeholder="Bairro" id="bairro" class="form-control form-control-border" required>
                                </div>
                            
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" placeholder="Cidade" id="cidade"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-6">
                                    <label>Estado</label>
                                    <select name="estado" id="uf" class="custom-select form-control form-control-border"  required>
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
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-3 pull-right mt-3">
                                    <input type="submit" class="btn btn-block btn-outline-primary" value="Salvar">
                                </div>
                            </div>
                        </form>
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
    var templateJuridica = ` 
        <div class="col-6">
            <label>CNPJ</label>
            <input type="text" name="cnpj" placeholder="CNPJ"  class="form-control form-control-border" required>
        </div>
        <div class="col-6">
            <label>Apelido (Exibido no sistema)</label>
            <input type="text" name="apelido" placeholder="Apelido"  class="form-control form-control-border" required>
        </div>
        <div class="col-6">
            <label>Nome Fantasia</label>
            <input type="text" name="nome_fantasia" placeholder="Apelido"  class="form-control form-control-border" required>
        </div>
        <div class="col-6">
            <label>Razão social</label>
            <input type="text" name="razao_social" placeholder="CNPJ"  class="form-control form-control-border" required>
        </div>
    `;

    var templateFisica = `
                        <div class="col-4">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" placeholder="CPF"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-4">
                                    <label>Apelido (Exibido no sistema)</label>
                                    <input type="text" name="apelido" placeholder="Apelido"  class="form-control form-control-border" required>
                                </div>
                                <div class="col-4">
                                    <label>Nome </label>
                                    <input type="text" name="nome_fantasia" placeholder="Apelido"  class="form-control form-control-border" required>
                                </div>
    `

    function tipoParceiro() {
        var tipoVendedor = document.getElementById('tipo-parceiro')

        if (tipoVendedor.value == 1) {
            document.querySelector('#target-tipo-parceiro').innerHTML = '';
            document.querySelector('#target-tipo-parceiro').innerHTML = templateFisica;
        } else {
            document.querySelector('#target-tipo-parceiro').innerHTML = '';
            document.querySelector('#target-tipo-parceiro').innerHTML = templateJuridica;
        }
    }

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep() {

        var valor = document.getElementById('busca_cep');
        console.log(valor.value)
        //Nova variável "cep" somente com dígitos.
        var cep = valor.value.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                // alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>