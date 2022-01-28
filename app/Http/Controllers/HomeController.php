<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Prestacao;
use App\Models\Cliente;
use App\Models\User;

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
        $contas = Emprestimo::all()->count();
        $entidades = Cliente::all()->count();
        $users = User::all()->count();
        $prestoes = Prestacao::where('estado', 'Pago')->get();
        $ganhos = $prestoes ->sum('opcao1');
        
        return view('home', compact('entidades','contas','users','ganhos'));
    }
}
