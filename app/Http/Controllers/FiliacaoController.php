<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiacao;

class FiliacaoController extends Controller
{
    public function index(){
        $filiacoes = Filiacao::all();
        return view('filiacao.index', compact('filiacoes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'localizacao'=>'required'
        ]);
        /* verficar se ja existe a Filiação */
        $filiacao = Filiacao::where('localizacao', $request->localizacao)->first();
        if (isset($filiacao)) {
            $errors = 'Já temos uma filiação em '.$filiacao->localizacao;
            return redirect()->back()->with('DBError', $errors);
        }
        /* criar nova Filiação */
        $novo = new Filiacao;
        $novo->localizacao = $request->localizacao;
        $novo->save();
        $success = $request->localizacao.' registado com sucesso!';
        return redirect()->back()->with('DBSuccess', $success);
    }
}
