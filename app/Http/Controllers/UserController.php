<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
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
    public function index($idParceiro = null)
    {
        if ($idParceiro > 0) {
            $usuarios = User::where([
                ['id_parceiro', '=', $idParceiro],
                ['id_permissao', '<', 4]
            ])->with('permissao')->get();
        } else {
            $usuarios = User::where([
                ['id', '>', 1],
                ['id_permissao', '<', 4],
                ['id_parceiro', auth()->user()->id_parceiro]
            ])->with('permissao')->get();
        }

        $parceiros = Parceiro::where([
            ['id', '>', 1],
        ])->get();

        return view('usuarios.list', [
            "idParceiro" => $idParceiro,
            'parceiros' => $parceiros,
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
        $parceiros = Parceiro::where('id', '>', 1)->get();

        if (auth()->user()->id_permissao != 1) {
            if (auth()->user()->id_permissao == 2) {
                $permissoes2[] = $permissoes[2]; // bolar um jeito de fazer isso direito

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

    private function buscaPermissoes()
    {
        $permissoes = PermissaoUsuario::limit(3)->get();

        if (auth()->user()->id_permissao != 1) {
            if (auth()->user()->id_permissao == 2) {
                $permissoes2[] = $permissoes[2]; // bolar um jeito de fazer isso direito

                return $permissoes2;
            } else {
                unset($permissoes[0]); // bolar um jeito de fazer isso direito
            }
        }
        return $permissoes;
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
            return Redirect()->back()->withInput($request->input())->with('error', 'Voc?? n??o possui permiss??o para criar esse tipo de usu??rio');
        }

        try {

            if ($data['id_permissao'] == 1) {
                $data['id_parceiro'] = 1;
            }
            $cpf = str_replace('-', '', $data['cpf']);
            $data['login'] = str_replace('.', '', $cpf);
            $senha = date_format(new DateTime($data['data_nascimento']), 'd-m-Y');

            $senha = str_replace("-", "", $senha);
            $data['password'] = Hash::make($senha);

            $usuario = User::create($data);

            if ($usuario['id_permissao'] == 3) {
                return redirect('vincular-usuario/' . $usuario['id']);
            }

            return redirect('usuarios')->with('success', 'Usu??rio criado com sucesso');
        } catch (\Throwable $th) {
            return Redirect()->back()->withInput($request->input())->with('error', 'Erro ao salvar usu??rio');
        }
    }

    public function vincularGerente($IdUsuario)
    {
        $usuario = User::find($IdUsuario);
        if ($usuario['id_permissao'] == 3) {
            $gerentes = User::where('id_permissao', 2)->where('id_parceiro', $usuario['id_parceiro'])->get();

            return view('usuarios.vincular', ['gerentes' => $gerentes, 'idUsuario' => $IdUsuario]);
        }

        return redirect('usuarios')->with('error', 'Usu??rio n??o pode ser vinculado ?? um gerente');
    }

    public function salvarVinculo($IdUsuario, Request $request)
    {
        $data = $request->all();
        if ($IdUsuario == $data['idUsuario']) {
            $relCorretorGerente = [
                "id_corretor" => $IdUsuario,
                "id_gerente" => $data['id_gerente']
            ];

            try {
                RelCorretorGerente::where('id_corretor', $IdUsuario)->where('id_gerente', $data['id_gerente'])->delete();

                RelCorretorGerente::create($relCorretorGerente);

                return redirect('usuarios')->with('success', 'Usu??rio vinculado com sucesso');
            } catch (\Throwable $th) {
                return redirect('usuarios')->with('error', 'Erro ao vincular usu??rio ao gerente');
            }
        }

        return redirect('usuarios')->with('error', 'Erro ao vincular usu??rio ao gerente');
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
                $usuario = User::find($id);
                $estados = Uf::getEstados();
                $parceiros = Parceiro::where('id', '>', 1)->get();
                $gerentes = User::where('id_permissao', 2)->where('id_parceiro', $usuario['id_parceiro'])->get();
                $vinculo = RelCorretorGerente::where('id_corretor', $id)->first();
                return view('usuarios.edit', [
                    "usuario" => $usuario,
                    "ufs" => $estados,
                    "permissoes" => $this->buscaPermissoes(),
                    "parceiros" => $parceiros,
                    "gerentes" => $gerentes,
                    "vinculo" => $vinculo
                ]);
            } catch (\Throwable $th) {
                return Redirect('usuarios')->with('error', 'Usu??rio n??o encontrado');
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
            $usuario = User::findOrFail($id);

            RelCorretorGerente::where('id_corretor', $usuario['id'])->delete();

            if ($data['id_permissao'] == 3) {
                $relCorretorGerente = [
                    "id_corretor" => $usuario['id'],
                    "id_gerente" => $data['id_gerente']
                ];

                RelCorretorGerente::create($relCorretorGerente);
            }

            $usuario->update($data);

            return Redirect('usuarios')->with('message', 'Usu??rio atualizado com sucesso');
        }
        return Redirect('usuarios')->with('error', 'Erro ao atualizar usu??rio');
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

    // ['permissao' => 'Gerente'], 2
    // ['permissao' => 'Corretor'], 3

    public function listaCorretores($idParceiro)
    {
        $lista = User::where([
            ['id_permissao', '=', '2'],
            ['id_parceiro', '=', $idParceiro],
        ])
            ->orWhere([
                ['id_permissao', '=', '3'],
                ['id_parceiro', '=', $idParceiro],
            ])->orderBy('name', 'asc')
            ->get();

        return response($lista);
    }
}
