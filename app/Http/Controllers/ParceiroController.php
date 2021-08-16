<?php

namespace App\Http\Controllers;
use App\Models\Parceiro;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ParceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaParceiros = Parceiro::all();
        return view('parceiros.list',['parceiros' => $listaParceiros]);
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
            return Redirect('parceiros')->with('message','Parceiro adicionado com sucesso');

        } catch (\Throwable $th) {
            return Redirect('parceiros')->with('error','Erro ao salvar parceiro');

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

                return view('parceiros.edit',["parceiro"=>$parceiro, "estados" => $estados]);
            } catch (\Throwable $th) {
                return Redirect('parceiros')->with('error','Parceiro não encontrado');
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
            $parceiro->update($data);

            return Redirect('parceiros')->with('message','Parceiro atualizado com sucesso');
        }
        return Redirect('parceiros')->with('error','Erro ao atualizar parceiro');
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
