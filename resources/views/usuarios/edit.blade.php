@extends('layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item active">Editar usuário</li>
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
                                Dados Usuário
                            </h3>
                        </div>
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data"
                                action="{{ route('atualizar-usuario', $usuario->id) }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $usuario->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Status</label>
                                        <select name="status" class="custom-select form-control form-control-border"
                                            required>
                                            @if ($usuario->status == 1)
                                                <option value="1" selected>Ativo</option>
                                                <option value="0">Inativo</option>
                                            @else
                                                <option value="1">Ativo</option>
                                                <option value="0" selected>Inativo</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label>CPF</label>
                                        <input type="text" name="cpf" placeholder="CPF" value="{{ $usuario->cpf }}"
                                            class="form-control form-control-border cpf" required>
                                    </div>
                                    <div class="col-9">
                                        <label>Permissão</label>
                                        <select name="id_permissao" onchange="parceiro()" id="id_permissao"
                                            class="custom-select form-control form-control-border" required>
                                            <option value="">Selecione</option>
                                            @foreach ($permissoes as $p)
                                                @if ($usuario->id_permissao == $p->id)
                                                    <option value="{{ $p->id }}" selected>{{ $p->permissao }}
                                                    </option>
                                                @else
                                                    <option value="{{ $p->id }}">{{ $p->permissao }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    @if ($usuario->id_permissao == 3)
                                        <div class="col-12" id="row-gerente">
                                            <label>Gerente</label>
                                            <select name="id_gerente" id="id_gerente"
                                                class="custom-select form-control form-control-border">
                                                <option value="">Selecione</option>
                                                @foreach ($gerentes as $g)
                                                    @if ($vinculo)
                                                        @if ($g->id == $vinculo->id_gerente)
                                                            <option value="{{ $g->id }}" selected>{{ $g->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $g->id }}">{{ $g->name }}
                                                            </option>
                                                        @endif
                                                    @else
                                                        <option value="{{ $g->id }}">{{ $g->name }}</option>

                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                @if (auth()->user()->id_parceiro == 1 && $usuario->id_parceiro != 1)
                                    <div class="row mt-2" id="row-parceiro">
                                        <div class="col-12">
                                            <label>Parceiro</label>
                                            <select name="id_parceiro" id="id_parceiro"
                                                class="custom-select form-control form-control-border" required>
                                                <option value="">Selecione</option>
                                                @foreach ($parceiros as $p)
                                                    @if ($usuario->id_parceiro == $p->id)
                                                        <option value="{{ $p->id }}" selected>{{ $p->apelido }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $p->id }}">{{ $p->apelido }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label>Nome</label>
                                        <input type="text" name="name" placeholder="Nome completo"
                                            value={{ $usuario->name }} class="form-control form-control-border" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Data de nascimento</label>
                                        <input type="date" name="data_nascimento" value={{ $usuario->data_nascimento }}
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label>Sexo</label>
                                        <select name="sexo" class="custom-select form-control form-control-border" required>
                                            <option value="{{ $usuario->sexo }}" selected>{{ $usuario->sexo }}
                                            </option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>E-mail</label>
                                        <input type="text" name="email" placeholder="E-mail"
                                            value="{{ $usuario->email }}" class="form-control form-control-border"
                                            required>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" placeholder="Telefone"
                                            value="{{ $usuario->telefone }}" class="form-control form-control-border"
                                            required>
                                    </div>
                                    <div class="col-6">
                                        <label>Celular</label>
                                        <input type="text" name="celular" placeholder="Celular"
                                            value="{{ $usuario->celular }}" class="form-control form-control-border"
                                            required>
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

    function parceiro() {
        var valor = document.getElementById('id_permissao').value;
        if (valor == 3) {
            var el = document.getElementById('row-gerente');
            el.removeAttribute('style');

            var el2 = document.getElementById('row-parceiro');
            el2.removeAttribute('style');
        } else if (valor == 1) {
            var el = document.getElementById('row-parceiro');
            el.setAttribute('style', 'display:none');

            var el2 = document.getElementById('row-gerente');
            el2.setAttribute('style', 'display:none');
            document.getElementById('id_permissao').value == "";

            var el2 = document.getElementById('id_parceiro');
            el2.removeAttribute('required');
        } else {
            var el = document.getElementById('row-parceiro');
            el.removeAttribute('style');
            var el2 = document.getElementById('row-gerente');
            el2.setAttribute('style', 'display:none');
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
