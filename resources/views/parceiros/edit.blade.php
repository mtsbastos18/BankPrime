@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Editar parceiro</li>
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
                            <form method="POST" enctype="multipart/form-data"
                                action="{{ route('atualizar-parceiro', $parceiro->id) }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $parceiro->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Status</label>
                                        <select name="status" class="custom-select form-control form-control-border"
                                            required>
                                            @if ($parceiro->status == 1)
                                                <option value="1" selected>Ativo</option>
                                                <option value="2">Inativo</option>
                                            @else
                                                <option value="1">Ativo</option>
                                                <option value="2" selected>Inativo</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Tipo Parceiro</label>
                                        <select name="tipo" onchange="tipoParceiro()" id="tipo-parceiro"
                                            class="custom-select form-control form-control-border" required>
                                            @if ($parceiro->tipo == 1)
                                                <option value="1" selected>Pessoa Física</option>
                                            @else
                                                <option value="2" selected>Pessoa Jurídica</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-2" id="target-tipo-parceiro">
                                    @if ($parceiro->tipo == 1)
                                        <div class="col-4">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" value="{{ $parceiro->cpf }}" placeholder="CPF"
                                                class="form-control form-control-border" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Apelido (Exibido no sistema)</label>
                                            <input type="text" name="apelido" value="{{ $parceiro->apelido }}"
                                                placeholder="Apelido" class="form-control form-control-border" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Nome </label>
                                            <input type="text" name="nome_fantasia" value="{{ $parceiro->nome_fantasia }}"
                                                placeholder="Apelido" class="form-control form-control-border" required>
                                        </div>
                                    @else
                                        <div class="col-6">
                                            <label>CNPJ</label>
                                            <input type="text" name="cnpj" value="{{ $parceiro->cnpj }}" placeholder="CNPJ"
                                                class="form-control form-control-border" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Apelido (Exibido no sistema)</label>
                                            <input type="text" name="apelido" value="{{ $parceiro->apelido }}"
                                                placeholder="Apelido" class="form-control form-control-border" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Nome Fantasia</label>
                                            <input type="text" name="nome_fantasia" value="{{ $parceiro->nome_fantasia }}"
                                                placeholder="Apelido" class="form-control form-control-border" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Razão social</label>
                                            <input type="text" name="razao_social" value="{{ $parceiro->razao_social }}"
                                                placeholder="CNPJ" class="form-control form-control-border" required>
                                        </div>
                                    @endif
                                </div>

                                <div class="row mt-2">

                                    <div class="col-6">
                                        <label>E-mail</label>
                                        <input type="text" name="email" placeholder="E-mail" value="{{ $parceiro->email }}"
                                            class="form-control form-control-border" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Telefone (Ou celular caso o parceiro não possua telefone fixo)</label>
                                        <input type="text" name="telefone" placeholder="Telefone"
                                            value="{{ $parceiro->telefone }}" class="form-control form-control-border"
                                            required>
                                    </div>

                                </div>

                                <div class="row mt-2">

                                    <div class="col-4">
                                        <label>Celular</label>
                                        <input type="text" name="celular" placeholder="Celular"
                                            value="{{ $parceiro->celular }}" class="form-control form-control-border"
                                            required>
                                    </div>
                                    <div class="col-4">
                                        <label>Nome de contato</label>
                                        <input type="text" name="nome_contato" placeholder="Nome de contato"
                                            value="{{ $parceiro->nome_contato }}" class="form-control form-control-border"
                                            required>
                                    </div>
                                    <div class="col-4">
                                        <label>Telefone do contato</label>
                                        <input type="text" name="telefone_contato" placeholder="Nome de contato"
                                            value="{{ $parceiro->telefone_contato }}"
                                            class="form-control form-control-border" required>
                                    </div>

                                </div>

                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label>Banco</label>
                                        <input type="text" name="banco" placeholder="Banco" value="{{ $parceiro->banco }}"
                                            class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Agência</label>
                                        <input type="text" name="agencia" placeholder="Agência"
                                            value="{{ $parceiro->agencia }}" class="form-control form-control-border">
                                    </div>
                                    <div class="col-6">
                                        <label>Conta</label>
                                        <input type="text" name="conta" placeholder="Conta" value="{{ $parceiro->conta }}"
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <label>Observações</label>
                                        <textarea name="observacoes" id="" cols="30" rows="5"
                                            class='form-control form-control-border'>{{ $parceiro->observacoes }}</textarea>
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
    var templateJuridica = ` 
        
    `;

    var templateFisica = `
                        
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
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('uf').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('uf').value = (conteudo.uf);
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
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

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
