<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Filiacao;
use App\Models\Garantia;
use App\Models\Prestacao;
use App\Models\Emprestimo;
use App\Models\Contabilidade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function index()
    {
        $contas = Emprestimo::whereDate('created_at', date('Y-m-d'))->get();
        return view('emprestimo.contas', compact('contas'));
    }

    public function mora()
    {
        $mora = Prestacao::where('estado', 'Pendente')
                            ->whereDate('dataPrevista', '<', date('Y-m-d'))
                            ->get();
        return view('emprestimo.mora', compact('mora'));
    }
    
    public function pagar()
    {
        $pagar = Prestacao::where('estado', 'Pendente')
                            ->whereDate('dataPrevista', date('Y-m-d'))
                            ->get();
        return view('emprestimo.pagar', compact('pagar'));
    }

    public function create($client)
    {
        $cliente = Cliente::find($client);
        return view('emprestimo.create', compact('cliente'));
    }

    public function create2()
    {
        return view('emprestimo.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente' => ['required'],
            'referencia' => ['required'],
            'emprestimo' => ['required'],
            'prestacoes' => ['required'],
            'taxa' => ['required'],
            'dias' => ['required'],
        ]);

        //Registrar emprestimo
        $cliente = DB::table('emprestimos')->insertGetId([
            'cliente_id' => $request->cliente,
            'user_id' => Auth::id(),
            'referencia' => $request->referencia,
            'emprestimo' => $request->emprestimo,
            'prestacoes' => $request->prestacoes,
            'taxa' => $request->taxa,
            'dias' => $request->dias,
            'situacao' => 'Pendente',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        
        //Registrar garantias
        for ($i=0; $i < $request->inputGarantias; $i++) { 
            $garantia = new Garantia;
            $garantia->	emprestimo_id  = $cliente;
            $garantia->descricao = $request->descricao[$i];
            $garantia->ano = $request->ano[$i];
            $garantia->valor = $request->valor[$i];
            $garantia->save();
        }
        
        $TAXA = $request->taxa/100;
        $AMCAPITAL = $request->emprestimo/$request->prestacoes;
        $capital = $request->emprestimo;
        $valorPagarInicial = 0;
        $totalJuros = 0;
        $DIAS = $request->dias;
        $emprestimo = [];
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
        $contabilidade = new Contabilidade;
        $contabilidade->emprestimo_id = $cliente;
        $contabilidade->descricao = 'Emprestimo nº conta '.$cliente;
        $contabilidade->credito = $request->emprestimo;
        $contabilidade->saldo = (Auth::user()->colaborador->filiacao->saldo - $request->emprestimo);
        $contabilidade->save();

        $filiacao = Filiacao::find(Auth::user()->colaborador->filiacao_id);
        $filiacao->saldo = ($filiacao->saldo - $request->emprestimo);;
        $filiacao->update();

        $success = 'Registado com sucesso, conta nº '.$cliente.' ';
        return redirect()->route('emprestimo.create2')->with('DBSuccess', $success);
        
    }

    public function indexSimulator()
    {
        return view('balcao.simulador.simulador');
    }

    public function startSimulator(Request $request)
    {
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

    public function show(Emprestimo $emprestimo)
    {
        return view('emprestimo.conta');
    }

    public function consultaCaixa()
    {
        $contas = Prestacao::where('estado', 'Pago')->get();
        return view('caixa.consulta', compact('contas'));
    }

    public function getDataEmprestimo(Request $request)
    {
        $emprestimo = Emprestimo::find($request->conta);
        
        if($emprestimo){

            $taxaMulta = $request->taxa / 100;
        
            $total = $emprestimo->total + $emprestimo->emprestimo;
            $saldoAnterior = $total - $emprestimo->saldoanterior;

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
            $data['message'] = 'Por favor verfique o número da conta!';
        }
        echo json_encode($data);
        return;
    }

    public function pay(Request $request)
    {
        $prestacao = Prestacao::find($request->prestacao_id);
        $prestacao->user_id = Auth::id();
        $prestacao->dataPagamento = date('Y-m-d');
        $prestacao->vMulta = $request->multa;
        $prestacao->estado = 'Pago';
        $prestacao->update();

        $contabilidade = new Contabilidade;
        $contabilidade->prestacao_id = $prestacao->id;
        $contabilidade->descricao = 'Pagamento da '.$prestacao->numero.'ª prestação';
        $contabilidade->debito = ($prestacao->opcao1 + $request->multa);
        $contabilidade->saldo = (Auth::user()->colaborador->filiacao->saldo + $prestacao->opcao1 + $request->multa);
        $contabilidade->save();

        $filiacao = Filiacao::find(Auth::user()->colaborador->filiacao_id);
        $filiacao->saldo = ($filiacao->saldo + $prestacao->opcao1);;
        $filiacao->update();
        $success = 'Pagamento da '.$prestacao->numero.'ª prestação realizado com sucesso!';
        return redirect()->route('caixa.show')->with('DBSuccess', $success);
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $filiacao = Filiacao::find(Auth::user()->colaborador->filiacao_id);
        $filiacao->saldo = ($filiacao->saldo + $emprestimo->emprestimo);
        $filiacao->update();
        
        $del = Emprestimo::destroy($emprestimo->id);
        $success = 'Removido com sucesso!';
        return redirect()->route('emprestimo.contas')->with('DBSuccess', $success);
    }

}