<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presenca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PresencaController extends Controller
{
    public function index(){
        $presencas = Presenca::where('user_id', Auth::id())->orderByDesc('id')->get();
        $presenca = DB::table('presencas')
                ->where('user_id', Auth::id())
                ->whereDate('created_at', date('Y-m-d'))
                ->get()->last();
        if (isset($presenca) && $presenca->estado === 'Saída') {
            $presenca = null;
        }
        return view('livroponto', compact('presenca','presencas'));
    }
    public function store(Request $request)
    {
        $success = $request->estado === 'Saída' ? 'Saída marcada!' : 'Presença marcada!';
        /* criar nova Presença */
        $presenca = new Presenca;
        $presenca->user_id = Auth::user()->id;
        $presenca->observacao = $request->observacao;
        $presenca->estado = $request->estado;
        $presenca->save();
        return redirect()->route('livroponto')->with('DBSuccess', $success);
    }
}