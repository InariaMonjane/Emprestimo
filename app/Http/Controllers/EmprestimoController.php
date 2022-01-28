<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestacao;
use App\Models\Emprestimo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function index(){
        $contas = Emprestimo::all();
        return view('emprestimo.contas', compact('contas'));
    }

    public function create($client){
        $cliente = Cliente::find($client);
        return view('emprestimo.create', compact('cliente'));
    }

    public function create2(){
        return view('emprestimo.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente' => ['required'],
            'emprestimo' => ['required'],
            'prestacoes' => ['required'],
            'taxa' => ['required'],
            'dias' => ['required'],
            'garantias' => ['required'],
            'aquisicao' => ['required'],
            'preco' => ['required'],
        ]);
        //dd($request);
        $cliente = DB::table('emprestimos')->insertGetId([
            'cliente_id' => $request->cliente,
            'user_id' => Auth::user()->id,
            'emprestimo' => $request->emprestimo,
            'prestacoes' => $request->prestacoes,
            'taxa' => $request->taxa,
            'dias' => $request->dias,
            'garantias' => $request->garantias,
            'dataAquisicao' => $request->aquisicao,
            'precoAvaliado' => $request->preco,
            'situacao' => 'Pendente',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        /*
        Registrar emprestimo 
        $cliente = new Emprestimo;
        $cliente->cliente_id = $request->numero;
        $cliente->user_id = Auth::user()->id;
        $cliente->emprestimo = $request->emprestimo;
        $cliente->prestacoes = $request->prestacoes;
        $cliente->taxa = $request->taxa;
        $cliente->dias = $request->dias;
        $cliente->garantias = $request->garantias;
        $cliente->dataAquisicao = $request->aquisicao;
        $cliente->precoAvaliado = $request->preco;
        $cliente->situacao = 'Pendente';
        $cliente->save();
        $success = 'Registado com sucesso!';
        return redirect()->back()->withInput()->with('DBSuccess', $success);
        */
        $TAXA = $request->taxa/100;
        $AMCAPITAL = $request->emprestimo/$request->prestacoes;
        $capital = $request->emprestimo;
        $valorPagarInicial = 0;
        $totalJuros = 0;
        $DIAS = $request->dias;$emprestimo = [];
        $dia = date("d");$mes = date("m");$ano = date("Y");
        for ($i=1; $i <= $request->prestacoes; $i++) {
            $juros = $capital*$TAXA;
            $valorPrestacao = $juros + $AMCAPITAL;
            
            if($DIAS + $dia <= 30){
                $dia = $DIAS + $dia;
            }else{
                if ($mes < 12) {
                    $mes++;
                    $dia = ($DIAS + $dia) - 30;
                }else{
                    $ano++;
                    $mes -= 11;
                    $dia = ($DIAS + $dia) - 30;
                }
                if($dia < 10){
                    $dia = '0'.$dia.'';
                }
                if($mes < 10){
                    $mes = '0'.$mes.'';
                }
            }
            $dataPrevista  = $ano.'-'.$mes.'-'.$dia;
            $linha = [
                'capital'   => round($capital,2),
                'taxa'      => $TAXA,
                'juros'     => round($juros,2),
                'AmCapital' => round($AMCAPITAL,2),
                'valorPrestacao' => round($valorPrestacao,2),
                'dataPrevista' => $dataPrevista,
            ];
            array_push($emprestimo, $linha);
            $capital -= $AMCAPITAL;
            $valorPagarInicial += round($valorPrestacao,2);
            $totalJuros += round($juros,2);            
        }
        $valorPagar = $valorPagarInicial/$request->prestacoes;
        //dd($emprestimo);
        for ($i=1; $i <= $request->prestacoes; $i++) {
            $prestacao = new Prestacao;
            $prestacao->emprestimo_id = $cliente;
            $prestacao->numero = $i;
            $prestacao->capital = $emprestimo[$i-1]['capital'];
            $prestacao->taxa = $emprestimo[$i-1]['taxa'];
            $prestacao->juros = $emprestimo[$i-1]['juros'];
            $prestacao->AmCapital = $emprestimo[$i-1]['AmCapital'];
            $prestacao->opcao1 = $emprestimo[$i-1]['valorPrestacao'];
            $prestacao->opcao2 = round($valorPagar,2);
            $prestacao->dataPrevista = $emprestimo[$i-1]['dataPrevista'];
            $prestacao->estado = 'Pendente';
            $prestacao->save();
        }
        $success = 'Registado com sucesso!';
        return redirect()->back()->with('DBSuccess', $success);
        /*
        
        $data['emprestimo'] = $emprestimo;
        $data['valorPagar'] = round($valorPagar,2);
        $data['totalJuros'] = $totalJuros;
        $data['totalCapital'] = $request->emprestimo;
        $data['totalPagar'] = $request->prestacoes*round($valorPagar,2);
        */
        
    }

    public function indexSimulator(){
        return view('emprestimo.simulador');
    }

    public function startSimulator(Request $request){
        $TAXA = $request->taxa/100;
        $AMCAPITAL = $request->emprestimo/$request->prestacoes;
        $capital = $request->emprestimo;
        $valorPagarInicial = 0;
        $totalJuros = 0;
        
        $DIAS = $request->dias;
        $emprestimo = [];
        
        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");
        for ($i=1; $i <= $request->prestacoes; $i++) {
            $juros = $capital*$TAXA;
            $valorPrestacao = $juros + $AMCAPITAL;
            
            if($DIAS + $dia <= 30){
                $dia = $DIAS + $dia;
            }else{
                if ($mes < 12) {
                    $mes++;
                    $dia = ($DIAS + $dia) - 30;
                }else{
                    $ano++;
                    $mes -= 11;
                    $dia = ($DIAS + $dia) - 30;
                }
                if($dia < 10){
                    $dia = '0'.$dia.'';
                }
                if($mes < 10){
                    $mes = '0'.$mes.'';
                }
            }
            $dataPrevista  = $dia.'-'.$mes.'-'.$ano;
            $linha = [
                'capital'   => round($capital,2),
                'taxa'      => $TAXA,
                'juros'     => round($juros,2),
                'AmCapital' => round($AMCAPITAL,2),
                'valorPrestacao' => round($valorPrestacao,2),
                'dataPrevista' => $dataPrevista,
            ];
            array_push($emprestimo, $linha);
            $capital -= $AMCAPITAL;
            $valorPagarInicial += round($valorPrestacao,2);
            $totalJuros += round($juros,2);            
        }
        $valorPagar = $valorPagarInicial/$request->prestacoes;
        $data['success'] = true;
        $data['emprestimo'] = $emprestimo;
        $data['valorPagar'] = round($valorPagar,2);
        $data['totalJuros'] = $totalJuros;
        $data['totalCapital'] = $request->emprestimo;
        $data['totalPagar'] = $request->prestacoes*round($valorPagar,2);
        echo json_encode($data);
        return;                
    }

    public function show(Emprestimo $emprestimo){
        $prestacoes = $emprestimo->prestacoes()->get();
        //dd($prestacoes);
        return view('emprestimo.conta', compact('emprestimo','prestacoes'));
    }
    public function show2(){
        return view('emprestimo.conta');
    }

    public function getDataEmprestimo(Request $request){
        $emprestimo = Emprestimo::find($request->conta);
        $taxaMulta = $request->taxa / 100;
        
        $total = $emprestimo->total + $emprestimo->emprestimo;
        $saldoAnterior = $total - $emprestimo->saldoanterior;
        
        
        if($emprestimo){
            $cliente = Cliente::find($emprestimo->cliente_id);
            $dataPrestacoes = $emprestimo->prestacoes()->get();
            $dataCliente = [
                'numero' => $cliente->id,
                'nome' => $cliente->nome .' '.$cliente->apelido,
                'telefone' => $cliente->telefone1,
                'referencia' => $cliente->emprestimos->count(),
            ];
            if($emprestimo->actual != null){

                $multa = $taxaMulta * $emprestimo->actual->opcao1 * $emprestimo->actual->multa;
                $saldoActual = $saldoAnterior - $emprestimo->actual->opcao1;

                $dataPrestacao = [
                    'id' => $emprestimo->actual->id,
                    'numero' => $emprestimo->actual->numero,
                    'atraso' => $emprestimo->actual->atraso,
                    'multa' =>  $multa,
                    'vPagar' => $multa + $emprestimo->actual->opcao1,
                    'vTPagar' => $total,
                    'vCapital' => $emprestimo->emprestimo,
                    'vPrestacao' => $emprestimo->actual->opcao1,
                    'saldoAnterior' => $saldoAnterior,
                    'saldoActual' => $saldoActual,
                ];
                $data['estado'] = true;
                $data['message'] = [
                    'cliente' => $dataCliente,
                    'prestacao' => $dataPrestacao,
                    'prestacoes' => $dataPrestacoes,
                ];
            }else{
                $dataPrestacao = [
                    'vPagar' => 0,
                    'vTPagar' => $total,
                    'vCapital' => $emprestimo->emprestimo,
                    'vPrestacao' => 0,
                    'saldoAnterior' => $saldoAnterior,
                    'saldoActual' => 0,
                ];
                $data['estado'] = false;
                $data['message'] = [
                    'cliente' => $dataCliente,
                    'prestacao' => $dataPrestacao,
                    'prestacoes' => $dataPrestacoes,
                ];
            }
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = 'Conta não encontrado!';
        }
        echo json_encode($data);
        return;
    }
    public function pay(Request $request){
        $prestacao = Prestacao::find($request->prestacao_id);
        $prestacao->dataPagamento = date('Y-m-d');
        $prestacao->estado = 'Pago';
        $prestacao->update();
        return redirect()->back();
    }
}