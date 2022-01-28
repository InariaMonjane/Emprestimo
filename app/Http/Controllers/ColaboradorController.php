<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Colaborador;
use App\Models\Filiacao;
use App\Models\User;

class ColaboradorController extends Controller
{
    public function index(){
        $colaboradores = Colaborador::all();
        $filiacoes = Filiacao::all();
        return view('colaboradores', compact('colaboradores','filiacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'nome'=>'required',
            'apelido'=>'required',
            'sucursal'=>'required'
        ]);
        /* verficar se o estudante já foi inscrito */
        $user = User::where('email', $request->email)->first();
        if (isset($user->email)) {
            $erro = $user->email.' já possui conta!';
            return redirect()->back()->with('EmailExiste', $erro);
        }
        //Caso não exista vamos adicionar na base de dados
        $usuario = DB::table('users')->insertGetId([
            'email' => $request->email,
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'password' => Hash::make('password'),
            'perfil_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $colaborador = new Colaborador;
        $colaborador->user_id = $usuario;
        $colaborador->filiacao_id = $request->sucursal;
        $colaborador->save();
        $success = $request->nome.' registado com sucesso!';
        return redirect()->back()->with('DBSuccess', $success);
    }
}
