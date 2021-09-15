<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use App\Models\Comprador;
use App\Models\ConjugeComprador;
use App\Models\EnderecoComprador;
use App\Models\EstadoCivil;
use App\Models\Imovel;
use App\Models\Processo;
use App\Models\ProfissaoComprador;
use App\Models\RelCompradorProcesso;
use App\Models\Uf;
use App\Models\Vendedor;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class PropostaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filtro = null)
    {

        if (auth()->user()->id_parceiro > 1) {
            if ($filtro != null) {
                if (auth()->user()->id_permissao == 4) {
                    $lista = DB::table('processos')
                        ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                        ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                        ->join('users', 'processos.id_usuario_criacao', '=', 'users.id')
                        ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                        ->where('processos.id_parceiro', '=', auth()->user()->id)
                        ->where('compradores.nome', 'like', '%' . $filtro . '%')
                        ->orWhere('compradores.cpf', 'like', '%' . $filtro . '%')
                        ->groupBy('processos.id')
                        ->get();
                } else {
                    $lista = DB::table('processos')
                        ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                        ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                        ->join('users', 'processos.id_usuario_criacao', '=', 'users.id')
                        ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                        ->where('processos.id_corretor', '=', auth()->user()->id)
                        ->where('compradores.nome', 'like', '%' . $filtro . '%')
                        ->orWhere('compradores.cpf', 'like', '%' . $filtro . '%')
                        ->groupBy('processos.id')
                        ->get();
                }
            } else {
                if (auth()->user()->id_permissao == 4) {
                    $lista = DB::table('processos')
                        ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                        ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                        ->join('users', 'processos.id_usuario_criacao', '=', 'users.id')
                        ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                        ->where('processos.id_parceiro', '=', auth()->user()->id)
                        ->groupBy('processos.id')
                        ->get();
                } else {
                    $lista = DB::table('processos')
                        ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                        ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                        ->join('users', 'processos.id_usuario_criacao', '=', 'users.id')
                        ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                        ->where('processos.id_corretor', '=', auth()->user()->id)
                        ->groupBy('processos.id')
                        ->get();
                }
            }

            return view("proposta.list", ['lista' => $lista]);
        }

        if ($filtro != null) {
            $lista = DB::table('processos')
                ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                ->where('compradores.nome', 'like', '%' . $filtro . '%')
                ->orWhere('compradores.cpf', 'like', '%' . $filtro . '%')
                ->groupBy('processos.id')
                ->get();
        } else {
            $lista = DB::table('processos')
                ->join('rel_comprador_imovel', 'processos.id', '=', 'rel_comprador_imovel.id_processo')
                ->join('compradores', 'rel_comprador_imovel.id_comprador', '=', 'compradores.id')
                ->select('processos.id', 'processos.banco', 'processos.status', 'processos.updated_at', 'compradores.nome', 'compradores.cpf')
                ->groupBy('processos.id')
                ->get();
        }


        return view("proposta.list", ['lista' => $lista]);
    }

    // DB::table('users')
    //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //         ->join('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('users.*', 'contacts.phone', 'orders.price')
    //         ->get();

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parceiros = Parceiro::all();
        $ufs = Uf::getEstados();
        return view('proposta.create', [
            "parceiros" => $parceiros,
            "ufs" => $ufs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
        $data = $request->all();

        $compradorData = $data['comprador'];
        $enderecoCompradorData = $data['endereco_comprador'];
        $processoData = $data['processo'];
        $imovelData = $data['imovel'];
        $profissaoCompradorData = $data['profissao_comprador'];
        $conjugeData = $data['conjuge'];
        $vendedorData = $data['vendedor'];

        $comprador2Data = $data['comprador2'];
        $enderecoComprador2Data = $data['endereco_comprador2'];
        $profissaoComprador2Data = $data['profissao_comprador2'];
        $conjuge2Data = $data['conjuge2'];

        $comprador3Data = $data['comprador3'];
        $enderecoComprador3Data = $data['endereco_comprador3'];
        $profissaoComprador3Data = $data['profissao_comprador3'];
        $conjuge3Data = $data['conjuge3'];

        $comprador = Comprador::create($compradorData);

        // $senha = date_format($comprador->nascimento, 'd-m-Y');

        // $senha = str_replace("-","",$senha);

        // $usuarioParceiro = [
        //     'name' => $comprador->nome,
        //     'email' => $comprador->email,
        //     'login' => $comprador->cpf,
        //     'id_permissao' => 5,
        //     'password' => Hash::make($senha),
        //     'id_parceiro' => auth()->user()->id_parceiro
        // ];


        // User::create($usuarioParceiro);

        $enderecoCompradorData['id_comprador'] = $comprador['id'];
        $enderecoComprador = EnderecoComprador::create($enderecoCompradorData);

        $profissaoCompradorData['id_comprador'] = $comprador['id'];
        $profissaoComprador = ProfissaoComprador::create($profissaoCompradorData);


        if ($compradorData['estado_civil'] == 2 || $compradorData['estado_civil'] == 3) {
            $conjugeData['id_comprador'] = $comprador['id'];
            $conjuge = ConjugeComprador::create($conjugeData);
        }


        $imovel = Imovel::create($imovelData);

        $vendedor = Vendedor::create($vendedorData);


        $processoData['id_imovel'] = $imovel['id'];
        $processoData['id_usuario_criacao'] = auth()->user()->id;
        $processoData['id_vendedor'] = $vendedor['id'];

        $processo = Processo::create($processoData);

        $relProcessoComprador = RelCompradorProcesso::create([
            'id_processo' => $processo['id'],
            'id_comprador' => $comprador['id']
        ]);

        if ($comprador2Data['ativo'] == 1) {
            $comprador2 = Comprador::create($comprador2Data);
            $enderecoComprador2Data['id_comprador'] = $comprador2['id'];
            $enderecoComprador2 = EnderecoComprador::create($enderecoComprador2Data);

            $profissaoComprador2Data['id_comprador'] = $comprador2['id'];
            $profissaoComprador2 = ProfissaoComprador::create($profissaoComprador2Data);

            if ($comprador2Data['estado_civil'] == 2 || $comprador2Data['estado_civil'] == 3) {
                $conjuge2Data['id_comprador'] = $comprador2['id'];
                $conjuge2 = ConjugeComprador::create($conjuge2Data);
            }

            $relProcessoComprador2 = RelCompradorProcesso::create([
                'id_processo' => $processo['id'],
                'id_comprador' => $comprador2['id']
            ]);
        }

        if ($comprador3Data['ativo'] == 1) {
            $comprador3 = Comprador::create($comprador3Data);
            $enderecoComprador3Data['id_comprador'] = $comprador3['id'];
            $enderecoComprador3 = EnderecoComprador::create($enderecoComprador3Data);

            $profissaoComprador3Data['id_comprador'] = $comprador3['id'];
            $profissaoComprador3 = ProfissaoComprador::create($profissaoComprador3Data);

            if ($comprador3Data['estado_civil'] == 2 || $comprador3Data['estado_civil'] == 3) {
                $conjuge3Data['id_comprador'] = $comprador3['id'];
                $conjuge3 = ConjugeComprador::create($conjuge3Data);
            }

            $relProcessoComprador3 = RelCompradorProcesso::create([
                'id_processo' => $processo['id'],
                'id_comprador' => $comprador3['id']
            ]);
        }

        return Redirect('propostas');
        // } catch (\Throwable $th) {
        //     return Redirect('propostas')->with('message', 'Erro ao inserir proposta');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id > 0) {
            $processo = Processo::find($id);
            $imovel = Imovel::find($processo['id_imovel']);
            $vendedor = Vendedor::find($processo['id_vendedor']);

            $idComprador = RelCompradorProcesso::where('id_processo', $processo['id'])->select('id_comprador')->get();
            $comprador = Comprador::find($idComprador[0]['id_comprador']);


            $enderecoComprador = EnderecoComprador::where('id_comprador', $comprador['id'])->first();
            $profissaoComprador = ProfissaoComprador::where('id_comprador', $comprador['id'])->first();

            $conjugeComprador = ConjugeComprador::where('id_comprador', $comprador['id'])->first();

            $data = [
                'estadoCivil' => EstadoCivil::getEstadoCivil(),
                'ufs' => Uf::getEstados(),
                'processo' => $processo,
                'imovel' => $imovel,
                'vendedor' => $vendedor,
                'comprador' => $comprador,
                'enderecoComprador' => $enderecoComprador,
                'profissaoComprador' => $profissaoComprador,
                'conjugeComprador' => $conjugeComprador,
                'comprador2' => false,
                'comprador3' => false
            ];

            if (count($idComprador) > 1) {
                $comprador2 = Comprador::find($idComprador[1]['id_comprador']);


                $enderecoComprador2 = EnderecoComprador::where('id_comprador', $comprador2['id'])->first();
                $profissaoComprador2 = ProfissaoComprador::where('id_comprador', $comprador2['id'])->first();

                $conjugeComprador2 = ConjugeComprador::where('id_comprador', $comprador2['id'])->first();

                $data['comprador2'] = $comprador2;
                $data['enderecoComprador2'] = $enderecoComprador2;
                $data['profissaoComprador2'] = $profissaoComprador2;
                $data['conjugeComprador2'] = $conjugeComprador2;
            }

            if (count($idComprador) > 2) {
                $comprador3 = Comprador::find($idComprador[2]['id_comprador']);


                $enderecoComprador3 = EnderecoComprador::where('id_comprador', $comprador3['id'])->first();
                $profissaoComprador3 = ProfissaoComprador::where('id_comprador', $comprador3['id'])->first();

                $conjugeComprador3 = ConjugeComprador::where('id_comprador', $comprador3['id'])->first();

                $data['comprador3'] = $comprador3;
                $data['enderecoComprador3'] = $enderecoComprador3;
                $data['profissaoComprador3'] = $profissaoComprador3;
                $data['conjugeComprador3'] = $conjugeComprador3;
            }
            $parceiros = Parceiro::all();
            $data['parceiros'] = $parceiros;

            $listaCorretores = User::where([
                ['id_permissao', '=', '2'],
                ['id_parceiro', '=', $processo['id_parceiro']],
            ])
                ->orWhere([
                    ['id_permissao', '=', '3'],
                    ['id_parceiro', '=', $processo['id_parceiro']],
                ])
                ->get();

            $data['corretores'] = $listaCorretores;

            return view('proposta.view', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id > 0) {
            $processo = Processo::find($id);
            $imovel = Imovel::find($processo['id_imovel']);
            $vendedor = Vendedor::find($processo['id_vendedor']);

            $idComprador = RelCompradorProcesso::where('id_processo', $processo['id'])->select('id_comprador')->get();
            $comprador = Comprador::find($idComprador[0]['id_comprador']);


            $enderecoComprador = EnderecoComprador::where('id_comprador', $comprador['id'])->first();
            $profissaoComprador = ProfissaoComprador::where('id_comprador', $comprador['id'])->first();

            $conjugeComprador = ConjugeComprador::where('id_comprador', $comprador['id'])->first();

            $data = [
                'estadoCivil' => EstadoCivil::getEstadoCivil(),
                'ufs' => Uf::getEstados(),
                'processo' => $processo,
                'imovel' => $imovel,
                'vendedor' => $vendedor,
                'comprador' => $comprador,
                'enderecoComprador' => $enderecoComprador,
                'profissaoComprador' => $profissaoComprador,
                'conjugeComprador' => $conjugeComprador,
                'comprador2' => false,
                'comprador3' => false
            ];

            if (count($idComprador) > 1) {
                $comprador2 = Comprador::find($idComprador[1]['id_comprador']);


                $enderecoComprador2 = EnderecoComprador::where('id_comprador', $comprador2['id'])->first();
                $profissaoComprador2 = ProfissaoComprador::where('id_comprador', $comprador2['id'])->first();

                $conjugeComprador2 = ConjugeComprador::where('id_comprador', $comprador2['id'])->first();

                $data['comprador2'] = $comprador2;
                $data['enderecoComprador2'] = $enderecoComprador2;
                $data['profissaoComprador2'] = $profissaoComprador2;
                $data['conjugeComprador2'] = $conjugeComprador2;
            }

            if (count($idComprador) > 2) {
                $comprador3 = Comprador::find($idComprador[2]['id_comprador']);


                $enderecoComprador3 = EnderecoComprador::where('id_comprador', $comprador3['id'])->first();
                $profissaoComprador3 = ProfissaoComprador::where('id_comprador', $comprador3['id'])->first();

                $conjugeComprador3 = ConjugeComprador::where('id_comprador', $comprador3['id'])->first();

                $data['comprador3'] = $comprador3;
                $data['enderecoComprador3'] = $enderecoComprador3;
                $data['profissaoComprador3'] = $profissaoComprador3;
                $data['conjugeComprador3'] = $conjugeComprador3;
            }

            $parceiros = Parceiro::all();
            $data['parceiros'] = $parceiros;


            $listaCorretores = User::where([
                ['id_permissao', '=', '2'],
                ['id_parceiro', '=', $processo['id_parceiro']],
            ])
                ->orWhere([
                    ['id_permissao', '=', '3'],
                    ['id_parceiro', '=', $processo['id_parceiro']],
                ])
                ->get();

            $data['corretores'] = $listaCorretores;

            return view('proposta.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $compradorData = $data['comprador'];
        $enderecoCompradorData = $data['endereco_comprador'];
        $processoData = $data['processo'];
        $imovelData = $data['imovel'];
        $profissaoCompradorData = $data['profissao_comprador'];
        if (isset($data['conjuge'])) {
            $conjugeData = $data['conjuge'];
        }
        $vendedorData = $data['vendedor'];
        if ($vendedorData['tipo'] == 2) {
            $tipo = $vendedorData['tipo'];
            $vendedorData = $data['vendedor_cnpj'];
            $vendedorData['tipo'] = $tipo;
        }

        try {
            $processo = Processo::findOrFail($processoData['id']);
            $processo->update($processoData);

            $comprador = Comprador::findOrFail($compradorData['id']);
            $comprador->update($compradorData);

            $enderecoComprador = EnderecoComprador::findOrFail($enderecoCompradorData['id']);
            $enderecoComprador->update($enderecoCompradorData);

            $imovel = Imovel::findOrFail($imovelData['id']);
            $imovel->update($imovelData);

            $profissaoComprador = ProfissaoComprador::findOrFail($profissaoCompradorData['id']);
            $profissaoComprador->update($profissaoCompradorData);

            if (isset($conjugeData)) {
                $conjuge = ConjugeComprador::findOrFail($conjugeData['id']);
                $conjuge->update($conjugeData);
            }
            $vendedor = Vendedor::findOrFail($vendedorData['id']);
            $vendedor->update($vendedorData);

            if (isset($data['comprador2'])) {
                $comprador2Data = $data['comprador2'];
                $enderecoComprador2Data = $data['endereco_comprador2'];
                $profissaoComprador2Data = $data['profissao_comprador2'];

                $comprador2 = Comprador::findOrFail($comprador2Data['id']);
                $comprador2->update($comprador2Data);

                $enderecoComprador2 = EnderecoComprador::findOrFail($enderecoComprador2Data['id']);
                $enderecoComprador2->update($enderecoComprador2Data);

                $profissaoComprador2 = ProfissaoComprador::findOrFail($profissaoComprador2Data['id']);
                $profissaoComprador2->update($profissaoComprador2Data);
            }

            if (isset($data['comprador3'])) {
                $comprador3Data = $data['comprador3'];
                $enderecoComprador3Data = $data['endereco_comprador3'];
                $profissaoComprador3Data = $data['profissao_comprador3'];

                $comprador3 = Comprador::findOrFail($comprador3Data['id']);
                $comprador3->update($comprador3Data);

                $enderecoComprador3 = EnderecoComprador::findOrFail($enderecoComprador3Data['id']);
                $enderecoComprador3->update($enderecoComprador3Data);

                $profissaoComprador3 = ProfissaoComprador::findOrFail($profissaoComprador3Data['id']);
                $profissaoComprador3->update($profissaoComprador3Data);
            }


            return Redirect('propostas')->with('message', 'Proposta atualizada com sucesso');
        } catch (\Throwable $th) {
            return Redirect('propostas')->with('message', 'Erro ao atualizar proposta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
