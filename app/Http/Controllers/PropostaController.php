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
                $lista = DB::table('processos')
                        ->join('rel_comprador_imovel','processos.id','=','rel_comprador_imovel.id_processo')
                        ->join('compradores','rel_comprador_imovel.id_comprador','=','compradores.id')
                        ->join('users','processos.id_usuario_criacao','=','users.id')
                        ->select('processos.*', 'compradores.nome', 'compradores.cpf')
                        ->where('compradores.nome','like','%'.$filtro.'%')
                        ->orWhere('compradores.cpf','like','%'.$filtro.'%')
                        ->get();
            } else {
                $lista = DB::table('processos')
                ->join('rel_comprador_imovel','processos.id','=','rel_comprador_imovel.id_processo')
                ->join('compradores','rel_comprador_imovel.id_comprador','=','compradores.id')
                ->join('users','processos.id_usuario_criacao','=','users.id')
                ->select('processos.*', 'compradores.nome', 'compradores.cpf')
                ->where('users.id_parceiro','=',auth()->user()->id_parceiro)
                ->get();
            }

            return view("proposta.list", ['lista'=>$lista]);
        }

        if ($filtro != null) {
            $lista = DB::table('processos')
                    ->join('rel_comprador_imovel','processos.id','=','rel_comprador_imovel.id_processo')
                    ->join('compradores','rel_comprador_imovel.id_comprador','=','compradores.id')
                    ->select('processos.*', 'compradores.nome', 'compradores.cpf')
                    ->where('compradores.nome','like','%'.$filtro.'%')
                    ->orWhere('compradores.cpf','like','%'.$filtro.'%')
                    ->get();
        } else {
            $lista = DB::table('processos')
            ->join('rel_comprador_imovel','processos.id','=','rel_comprador_imovel.id_processo')
            ->join('compradores','rel_comprador_imovel.id_comprador','=','compradores.id')
            ->select('processos.*', 'compradores.nome', 'compradores.cpf')
            ->get();
        }

        

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
        $profissaoCompradorData = $data['profissao_comprador'];
        $conjugeData = $data['conjuge'];
        $vendedorData = $data['vendedor'];

        $comprador = Comprador::create($compradorData);

        $senha = date_format($comprador->nascimento,'d-m-Y');

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

        $conjugeData['id_comprador'] = $comprador['id'];
        $conjuge = ConjugeComprador::create($conjugeData);

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
        if ($id > 0) {
            $processo = Processo::find($id);
            $imovel = Imovel::find($processo['id_imovel']);
            $vendedor = Vendedor::find($processo['id_vendedor']);

            $idComprador = RelCompradorProcesso::where('id_processo',$processo['id'])->select('id_comprador')->first();
            $comprador = Comprador::find($idComprador['id_comprador']);


            $enderecoComprador = EnderecoComprador::where('id_comprador',$comprador['id'])->first();
            $profissaoComprador = ProfissaoComprador::where('id_comprador',$comprador['id'])->first();
            
            $conjugeComprador = ConjugeComprador::where('id_comprador',$comprador['id'])->first();

            return view('proposta.edit',[
                'estadoCivil' => EstadoCivil::getEstadoCivil(),
                'ufs' => Uf::getEstados(),
                'processo' => $processo,
                'imovel' => $imovel,
                'vendedor' => $vendedor,
                'comprador' => $comprador,
                'enderecoComprador' => $enderecoComprador,
                'profissaoComprador' => $profissaoComprador,
                'conjugeComprador' => $conjugeComprador,
            ]);
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
        $conjugeData = $data['conjuge'];
        $vendedorData = $data['vendedor'];

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

            $conjuge = ConjugeComprador::findOrFail($conjugeData['id']);
            $conjuge->update($conjugeData);

            $vendedor = Vendedor::findOrFail($vendedorData['id']);
            $vendedor->update($vendedorData);

            return Redirect('propostas')->with('message','Proposta atualizada com sucesso');
        } catch (\Throwable $th) {
            return Redirect('propostas')->with('message','Erro ao atualizar proposta');
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
