@extends('layouts.master')


@section('breadcrumb')
              <li class="breadcrumb-item active">Vincular usuário</li>
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
                            Vincular Usuário
                        </h3>
                    </div>
                    <div class="card-body">
                    
                        <form method="POST" enctype="multipart/form-data" action="{{ route('salvar-vinculo',$idUsuario)}}">
                            @csrf
                            <input type="hidden" name="idUsuario" value={{$idUsuario}}>
                            <div class="row">
                                
                                <div class="col-12">
                                    <label>Gerente</label>
                                    <select name="id_gerente" id="id_gerente" class="custom-select form-control form-control-border"  required>
                                        <option value="">Selecione</option>
                                        @foreach ($gerentes as $g)
                                            <option value="{{$g->id}}">{{$g->name}}</option> 
                                        @endforeach
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
    function parceiro() {
        var valor = document.getElementById('id_permissao').value;
        if (valor == 1) {
            var el = document.getElementById('row-parceiro');
            el.setAttribute('style','display:none');
            document.getElementById('id_permissao').value == "";
           
            var el2 = document.getElementById('id_parceiro');
            el2.removeAttribute('required');
        } else {
            var el = document.getElementById('row-parceiro');
            el.removeAttribute('style');
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