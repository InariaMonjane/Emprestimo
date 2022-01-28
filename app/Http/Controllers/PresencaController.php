<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presenca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PresencaController extends Controller
{
    public function index(){
        $presenca = DB::table('presencas')
                ->where('user_id', Auth::user()->id)
                ->whereDate('created_at', date('Y-m-d'))
                ->get()->last();
        if (isset($presenca) && $presenca->estado === 'Saída') {
            $presenca = null;
        }
        return view('livroponto', compact('presenca'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'observacao' => 'required',
            'estado' => 'required'
        ]);
        
        /* criar nova Presença */
        $presenca = new Presenca;
        $presenca->user_id = Auth::user()->id;
        $presenca->observacao = $request->observacao;
        $presenca->estado = $request->estado;
        $presenca->save();
        $success = 'Presença marcada!';
        return redirect()->back()->with('DBSuccess', $success);
    }
}