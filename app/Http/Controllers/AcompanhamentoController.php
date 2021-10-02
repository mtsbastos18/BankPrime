<?php

namespace App\Http\Controllers;

use App\Models\Acompanhamentos;
use App\Models\Processo;
use App\Models\RelCompradorProcesso;
use App\Models\ObservacaoAcompanhamentos;
use App\Models\TipoAcompanhamentos;
use App\Models\User;
use App\Models\Comprador;
use DateTime;
use Illuminate\Http\Request;

class AcompanhamentoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($IdProposta)
    {
        $lista = Acompanhamentos::where([
            ['id_processo', $IdProposta]
        ])->with('observacao')->get();
        foreach ($lista as $l) {
            foreach ($l['observacao'] as $o) {
                $o['nomeUsuario'] = User::find($o['id_usuario_criacao']);
            }
            $l['tipo_acompanhamento'] = TipoAcompanhamentos::find($l['id_tipo_acompanhamento']);
        }

        return view('acompanhamentos.list', [
            'lista' => $lista,
            'idProposta' => $IdProposta
        ]);
    }

    public function validaCliente($IdProposta)
    {
        return view('acompanhamentos.login', [
            'idProposta' => $IdProposta
        ]);
    }

    public function indexCliente(Request $request)
    {
        $data = $request->all();

        $processo = RelCompradorProcesso::where([
            ['id_processo', '=', $data['idProposta']],
        ])->get();

        foreach ($processo as $p) {
            $comprador = Comprador::where([
                ['id', '=', $p['id_comprador']],
            ])->first();

            $cpf = str_replace('-', '', $comprador['cpf']);
            $cpf = str_replace('.', '', $cpf);

            $aux = new DateTime($comprador['nascimento']);
            $nascimento = date_format($aux, 'd-m-Y');
            $nascimento = str_replace('-', '', $nascimento);

            if ($data['cpf'] == $cpf && $data['senha'] == $nascimento) {
                $acompanhamentoAtual = Acompanhamentos::where([
                    ['id_processo', '=', $data['idProposta']],
                ])->orderBy('created_at', 'desc')->first();

                if (!$acompanhamentoAtual) {
                    $acompanhamentoAtual['id_tipo_acompanhamento'] = 0;
                }
                return view('acompanhamentos.cliente', [
                    'atual' => $acompanhamentoAtual
                ]);
            }
        }

        return Redirect('acompanhamento-cliente/' . $data['idProposta']);
        // $acompanhamentoAtual = Acompanhamentos::where([
        //     ['id_processo', '=', $IdProposta],
        // ])->orderBy('created_at', 'desc')->first();

        // return view('acompanhamentos.cliente', [
        //     'atual' => $acompanhamentoAtual
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($IdProposta)
    {
        $acompanhamentoAtual = Acompanhamentos::where([
            ['id_processo', '=', $IdProposta],
        ])->orderBy('created_at', 'desc')->first();

        $tipos = TipoAcompanhamentos::all();

        return view('acompanhamentos.create', [
            'tipos' => $tipos,
            'idProposta' => $IdProposta,
            'atual' => $acompanhamentoAtual
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
        try {
            $data = $request->all();

            $check = Acompanhamentos::where([
                ['id_tipo_acompanhamento', '=', $data['id_tipo_acompanhamento']],
                ['id_processo', '=', $data['id_processo']]
            ])->get();


            if (count($check) == 0) {
                $dataAcompanhamento = [
                    'id_tipo_acompanhamento' => $data['id_tipo_acompanhamento'],
                    'id_processo' => $data['id_processo'],
                    'id_usuario_criacao' => auth()->user()->id,
                    'data' => $data['data']
                ];

                if ($data['data'] == "") {
                    $dataAcompanhamento['data'] = date("Y-m-d");
                }

                $acompanhamento = Acompanhamentos::create($dataAcompanhamento);
                if ($data['observacoes'] != "") {
                    $observacao = [
                        'id_acompanhamento' => $acompanhamento['id'],
                        'observacao' => $data['observacoes'],
                        'id_usuario_criacao' => auth()->user()->id,
                        'data' => $data['data']
                    ];

                    if ($data['data'] == "") {
                        $observacao['data'] = date("Y-m-d");
                    }

                    ObservacaoAcompanhamentos::create($observacao);
                }


                return Redirect('acompanhamentos/' . $data['id_processo']);
            } else {
                $acompanhamentoAtual = Acompanhamentos::where([
                    ['id_processo', '=', $data['id_processo']],
                ])->orderBy('created_at', 'desc')->first();

                if ($data['observacoes'] != "") {
                    $observacao = [
                        'id_acompanhamento' => $acompanhamentoAtual['id'],
                        'observacao' => $data['observacoes'],
                        'id_usuario_criacao' => auth()->user()->id
                    ];

                    if ($data['data'] == "") {
                        $observacao['data'] = date("Y-m-d");
                    }

                    ObservacaoAcompanhamentos::create($observacao);
                    return Redirect('acompanhamentos/' . $data['id_processo']);
                }
            }
            return Redirect('propostas')->with('message', 'Erro ao atualizar proposta');
        } catch (\Throwable $th) {
            return Redirect('propostas')->with('message', 'Erro ao atualizar proposta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProposta, $id)
    {
        $observacao = ObservacaoAcompanhamentos::find($id);

        return view('acompanhamentos.edit', [
            'observacao' => $observacao,
            'idProposta' => $idProposta
        ]);
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

        if ($id == $data['id_observacao']) {
            $observacao = ObservacaoAcompanhamentos::find($id);

            $observacao->update($data);

            return redirect('acompanhamentos/' . $data['id_processo']);
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
