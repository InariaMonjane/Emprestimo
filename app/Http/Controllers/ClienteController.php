<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all()->sortByDesc('id');
        return view('entidade.index', compact('clientes'));
    }
    
    public function create()
    {
        return view('balcao.entidade.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required'],
            'apelido' => ['required'],
            'tipo_de_entidade' => ['required'],
            'processo' => ['required'],
            'solicitacao' => ['required'],
            'situacao' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'aniversario' => ['required','date'],
            'validade' => ['required', 'date'],
            'bi' => ['required', 'size:13'],
            'nuit' => ['required', 'digits:9'],
            'telefone_1' => ['required'],
            'telefone_2' => ['required_unless:telefone1,null'],
            'genero' => ['required'],
            'endereco' => ['required'],
        ]);
        /* verficar se o Cliente já possui Conta */
        $find = Cliente::where('email', $request->email)->first();
        if (isset($find)) {
            $errors = $find->email.' já foi registado!';
            return redirect()->back()
                ->with('DBError', $errors);
        }else{
            /* Registrar novo cliente */
            $cliente = new Cliente;
            $cliente->user_id = Auth::user()->id;
            $cliente->nome = $request->nome;
            $cliente->apelido = $request->apelido;
            $cliente->entidade = $request->tipo_de_entidade;
            $cliente->processo = $request->processo;
            $cliente->solicitacao = $request->solicitacao;
            $cliente->situacao = $request->situacao;
            $cliente->email = $request->email;
            $cliente->aniversario = $request->aniversario;
            $cliente->validade = $request->validade;
            $cliente->bi = $request->bi;
            $cliente->nuit = $request->nuit;
            $cliente->telefone1 = $request->telefone_1;
            $cliente->telefone2 = $request->telefone_2;
            $cliente->genero = $request->genero;
            $cliente->endereco = $request->endereco;
            $cliente->banco = $request->banco;
            $cliente->numeroconta = $request->conta;
            $cliente->observacao = $request->observacao;
            $cliente->save();
            $success = $request->nome.' '.$request->apelido.' foi registado com sucesso!';
            return redirect()->back()->withInput()->with('DBSuccess', $success);
        }
        
    }

    public function getDataClient(Request $request)
    {
        $cliente = Cliente::find($request->cliente);
        if($cliente){
            $data['success'] = true;
            $data['message'] = [
                'id' => $cliente->id,
                'bi' => $cliente->bi,
                'nome' => $cliente->nome,
                'apelido' => $cliente->apelido,
                'referencia' => ($cliente->emprestimos()->get()->count()+1),
            ];
        }else{
            $data['success'] = false;
            $data['message'] = 'Cliente não encontrado!';
        }
        echo json_encode($data);
        return;
    }
}