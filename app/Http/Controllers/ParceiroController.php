<?php

namespace App\Http\Controllers;

use App\Models\Parceiro;
use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ParceiroController extends Controller
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
    public function index($filtro = null)
    {
        if ($filtro) {
            $listaParceiros = Parceiro::where('status', $filtro)->orWhere('apelido', $filtro)->get();
        } else {
            $listaParceiros = Parceiro::all();
        }

        return view('parceiros.list', ['parceiros' => $listaParceiros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parceiros.create');
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

        try {
            $parceiro = Parceiro::create($data);


            $usuarioParceiro = [
                'name' => $parceiro->apelido,
                'email' => $parceiro->email,
                'login' => $parceiro->cnpj,
                'id_permissao' => 4,
                'password' => Hash::make($this->limpaTelefone($parceiro->telefone)),
                'id_parceiro' => $parceiro->id
            ];

            if ($parceiro->tipo == 1) {
                $usuarioParceiro['login'] = $parceiro->cpf;
            }

            $usuarioParceiro['login'] = $this->limpaCPF_CNPJ($usuarioParceiro['login']);

            $user = User::create($usuarioParceiro);

            $parceiro->update(['id_usuario' => $user['id']]);

            return Redirect('parceiros')->with('message', 'Parceiro adicionado com sucesso');
        } catch (\Throwable $th) {
            return Redirect('parceiros')->with('error', 'Erro ao salvar parceiro');
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
    public function edit($id)
    {
        if ($id > 0) {
            try {
                $parceiro = Parceiro::find($id);
                $estados = Uf::getEstados();

                return view('parceiros.edit', ["parceiro" => $parceiro, "estados" => $estados]);
            } catch (\Throwable $th) {
                return Redirect('parceiros')->with('error', 'Parceiro não encontrado');
            }
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
        if ($id == $data['id']) {
            $parceiro = Parceiro::findOrFail($id);

            $statusParceiro = $parceiro->status;

            $parceiro->update($data);

            if ($statusParceiro == 1 && $data['status'] == 2) {
                User::where('id_parceiro', $parceiro->id)->update(['status' => 0]);
            }

            if ($statusParceiro == 2 && $data['status'] == 1) {
                User::where('id_parceiro', $parceiro->id)->update(['status' => 1]);
            }

            $user = User::find($parceiro['id_usuario']);

            if ($user) {
                $userNovo['login'] = $this->limpaCPF_CNPJ($parceiro['tipo'] == 1 ? $parceiro['cpf'] : $parceiro['cnpj']);
                $userNovo['password'] = Hash::make($this->limpaTelefone($parceiro['telefone']));
                $user->update($userNovo);
            }

            return Redirect('parceiros')->with('message', 'Parceiro atualizado com sucesso');
        }
        return Redirect('parceiros')->with('error', 'Erro ao atualizar parceiro');
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

    function limpaCPF_CNPJ($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace(" ", "", $valor);

        return $valor;
    }

    function limpaTelefone($valor)
    {
        $valor = trim($valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace(" ", "", $valor);

        return $valor;
    }
}
