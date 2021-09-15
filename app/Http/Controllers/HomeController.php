<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use App\Models\Processo;
use Carbon\Carbon;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $processos = Processo::whereDate('created_at', '>', Carbon::now()->subDays(30))->get();
        $processosEmAndamento = Processo::where('status', 1)->get();
        $processosFinalizados = Processo::where('status', 4)->get();

        return view('home', [
            "processos" => count($processos),
            "emAndamento" => count($processosEmAndamento),
            "finalizados" => count($processosFinalizados)
        ]);
    }
}
