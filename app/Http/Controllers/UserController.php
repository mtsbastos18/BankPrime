<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uf;
use App\Models\PermissaoUsuario;
use App\Models\User;
use App\Models\Parceiro;
use Illuminate\Support\Facades\Hash;
use App\Models;
use App\Models\RelCorretorGerente;
use DateTime;
use RelCompradorProcesso;

class UserController extends Controller
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
        $usuarios = User::where([
            ['id', '>',1],
        ])->with('permissao')->get();



        return view('usuarios.list', [
            'usuarios' => $usuarios,
        ]);
    }


    // ['permissao' => 'Master'], 1
    // ['permissao' => 'Gerente'], 2
    // ['permissao' => 'Corretor'], 3
    // ['permissao' => 'Parceiro'], 4
    // ['permissao' => 'Cliente'], 5

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ufs = Uf::getEstados();
        $permissoes = PermissaoUsuario::limit(3)->get();
        $parceiros = Parceiro::where('id','>',1)->get();

        if (auth()->user()->id_permissao != 1) {
            if (auth()->user()->id_permissao == 2) {
                $permissoes2[] = $permissoes[2];// bolar um jeito de fazer isso direito

                return view('usuarios.create', [
                    'ufs' => $ufs,
                    'permissoes' => $permissoes2
                ]);
            } else {
                unset($permissoes[0]); // bolar um jeito de fazer isso direito
            }
        }

        return view('usuarios.create', [
            'ufs' => $ufs,
            'permissoes' => $permissoes,
            'parceiros' => $parceiros
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

        if (auth()->user()->id_permissao != 1 && $data['id_permissao'] == 1) {
            return redirect('usuarios')->with('error','Você não possui permissão para criar esse tipo de usuário');
        }

        // try {

            if ($data['id_permissao'] == 1) {
                $data['id_parceiro'] = 1;
            }

            $data['login'] = $data['cpf'];
            $senha = date_format(new DateTime($data['data_nascimento']),'d-m-Y');

            $senha = str_replace("-","",$senha);
            $data['password'] = Hash::make($senha);

            $usuario = User::create($data);
            
            if ($usuario['id_permissao'] == 3) {
                return redirect('vincular-usuario/' . $usuario['id']);
            }

            return redirect('usuarios')->with('success','Usuário criado com sucesso');
            

        // } catch (\Throwable $th) {
        //     exit($th);
        //     return redirect('usuarios')->with('error','Erro ao salvar usuário');
        // }


    }

    public function vincularGerente($IdUsuario) 
    {
        $usuario = User::find($IdUsuario);
        if ($usuario['id_permissao'] == 3) {
            $gerentes = User::where('id_permissao',2)->where('id_parceiro', $usuario['id_parceiro'])->get();

            return view('usuarios.vincular',['gerentes'=> $gerentes,'idUsuario' => $IdUsuario]);
        }

        return redirect('usuarios')->with('error','Usuário não pode ser vinculado à um gerente');    
    }

    public function salvarVinculo($IdUsuario, Request $request) 
    {
        $data = $request->all();
        if ($IdUsuario == $data['idUsuario']) {
            $relCorretorGerente = [
                "id_corretor" => $IdUsuario,
                "id_gerente" => $data['id_gerente']
            ];

            // try {
                RelCorretorGerente::where('id_corretor', $IdUsuario)->where('id_gerente',$data['id_gerente'])->delete();

                RelCorretorGerente::create($relCorretorGerente);
                
                return redirect('usuarios')->with('success','Usuário vinculado com sucesso');
            // } catch (\Throwable $th) {
            //     return redirect('usuarios')->with('error','Erro ao vincular usuário ao gerente'); 
            // }
            
        }

        return redirect('usuarios')->with('error','Erro ao vincular usuário ao gerente'); 
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
