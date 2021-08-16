<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use App\Models\Comprador;
use App\Models\EnderecoComprador;
use App\Models\Imovel;
use App\Models\Processo;
use App\Models\RelCompradorProcesso;
use DB;

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
    public function index()
    {   
        $lista = DB::table('processos')
                    ->join('rel_comprador_imovel','processos.id','=','rel_comprador_imovel.id_processo')
                    ->join('compradores','rel_comprador_imovel.id_comprador','=','compradores.id')
                    ->select('processos.*', 'compradores.nome', 'compradores.cpf')
                    ->get();

        return view("proposta.list", ['lista'=>$lista]);
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
        return view('proposta.create');

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

        $compradorData = $data['comprador'];
        $enderecoCompradorData = $data['endereco_comprador'];
        $processoData = $data['processo'];
        $imovelData = $data['imovel'];

        $comprador = Comprador::create($compradorData);

        $enderecoCompradorData['id_comprador'] = $comprador['id'];
        $enderecoComprador = EnderecoComprador::create($enderecoCompradorData);

        $imovel = Imovel::create($imovelData);

        $processoData['id_imovel'] = $imovel['id'];
        $processoData['id_usuario_criacao'] = auth()->user()->id;

        $processo = Processo::create($processoData);

        $relProcessoComprador = RelCompradorProcesso::create([
            'id_processo' => $processo['id'],
            'id_comprador' => $comprador['id']
        ]);

        return Redirect('propostas');

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
