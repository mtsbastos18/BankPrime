<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uf;
use App\Models\PermissaoUsuario;
use App\Models\User;
use App\Models\Parceiro;
use Illuminate\Support\Facades\Hash;

use DateTime;

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
            
            return redirect('usuarios')->with('success','Usuário criado com sucesso');
            

        // } catch (\Throwable $th) {
        //     exit($th);
        //     return redirect('usuarios')->with('error','Erro ao salvar usuário');
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
