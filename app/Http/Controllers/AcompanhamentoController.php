<?php

namespace App\Http\Controllers;

use App\Models\Acompanhamentos;
use App\Models\ObservacaoAcompanhamentos;
use App\Models\TipoAcompanhamentos;
use App\Models\User;
use Illuminate\Http\Request;

class AcompanhamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($IdProposta)
    {
        $lista = Acompanhamentos::where([
            ['id_processo',$IdProposta]
        ])->with('observacao')->get();
        foreach ($lista as $l) {
            foreach ($l['observacao'] as $o) {
                $o['nomeUsuario'] = User::find($o['id_usuario_criacao']);
            }
            $l['tipo_acompanhamento'] = TipoAcompanhamentos::find($l['id_tipo_acompanhamento']);
        }

        return view('acompanhamentos.list',[
            'lista'=>$lista,
            'idProposta' => $IdProposta
        ]);
    }

    public function indexCliente($IdProposta)
    {
        $acompanhamentoAtual = Acompanhamentos::where([
            ['id_processo','=',$IdProposta],
        ])->orderBy('created_at', 'desc')->first();

        return view('acompanhamentos.cliente',[
            'atual' => $acompanhamentoAtual
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($IdProposta)
    {
        $acompanhamentoAtual = Acompanhamentos::where([
            ['id_processo','=',$IdProposta],
        ])->orderBy('created_at', 'desc')->first();
        
        $tipos = TipoAcompanhamentos::where([
            ['id','>=',$acompanhamentoAtual['id_tipo_acompanhamento']]
        ])->get();
        
        return view('acompanhamentos.create',[
            'tipos'=>$tipos,
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
        $data = $request->all();

        $check = Acompanhamentos::where([
                ['id_tipo_acompanhamento','=',$data['id_tipo_acompanhamento']],
                ['id_processo','=',$data['id_processo']]
        ])->get();
        
           
        if(count($check) == 0) {
            $dataAcompanhamento = [
                'id_tipo_acompanhamento' => $data['id_tipo_acompanhamento'],
                'id_processo' => $data['id_processo'],
                'id_usuario_criacao' => auth()->user()->id
            ];

            $acompanhamento = Acompanhamentos::create($dataAcompanhamento);
            if ($data['observacoes'] != "") {
                $observacao = [
                    'id_acompanhamento' => $acompanhamento['id'],
                    'observacao' => $data['observacao'],
                    'id_usuario_criacao' => auth()->user()->id
                ];

                ObservacaoAcompanhamentos::create($observacao);
            }


            return Redirect('acompanhamentos/'.$data['id_processo']);
        } else {
            $acompanhamentoAtual = Acompanhamentos::where([
                ['id_processo','=',$data['id_processo']],
            ])->orderBy('created_at', 'desc')->first();

            if ($data['observacoes'] != "") {
                $observacao = [
                    'id_acompanhamento' => $acompanhamentoAtual['id'],
                    'observacao' => $data['observacoes'],
                    'id_usuario_criacao' => auth()->user()->id
                ];
                
                ObservacaoAcompanhamentos::create($observacao);
                return Redirect('acompanhamentos/'.$data['id_processo']);
            }
            
        }
        return Redirect('propostas')->with('message','Erro ao atualizar proposta');
    

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
    public function edit($id)
    {
        //
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
        //
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
