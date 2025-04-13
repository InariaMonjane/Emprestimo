<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Prestacao;
use App\Models\Cliente;
use App\Models\Despesa;
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
        //$ganhos = $prestoes ->sum('opcao1');
        return view('home', compact('entidades','contas','users'));
    }

    public function grafico(){
        $meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
        for ($i=0; $i < 12; $i++) { 
            $emprestimo = Emprestimo::whereMonth('created_at', $i+1)->get()->sum('emprestimo');
            $emprestimos[$i] = $emprestimo;
        }
        for ($i=0; $i < 12; $i++) { 
            $cliente = Cliente::whereMonth('created_at', $i+1)->get()->count();
            $clientes[$i] = $cliente;
        }
        for ($i=0; $i < 12; $i++) { 
            $despesa = Despesa::whereMonth('created_at', $i+1)->get()->sum('valor');
            $despesas[$i] = $despesa;
        }
        $dados['meses'] = $meses;
        $dados['success'] = true;
        $dados['emprestimos'] = $emprestimos;
        $dados['clientes'] = $clientes;
        $dados['despesas'] = $despesas;
        echo json_encode($dados);
        return;
    }
}
