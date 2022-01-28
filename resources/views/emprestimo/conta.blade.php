@extends('layouts.app')

@section('content')

 <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-6 text-right"><span class="font-weight-bold">Caixa</span></div>
      <div class="col-6 text-right"><span class="font-weight-bold">Data : </span>@php echo date('d-m-Y') @endphp</div>
    </div>
    <!--div class="row">
        <div class="col-12 text-center">
            <p class="font-weight-bold py-2 m-0">Atenção!!! Existe <span class="text-danger">MULTA</span> por pagar!!!</p>
        </div>
    </div-->     
  </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Dados da conta</h3>
                </div>
                
                @if(Session::has('DBSuccess'))
                <div class="alert alert-success mt-2 mx-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="m-0 text-center">{{ Session::get('DBSuccess') }}</p>
                </div>
                @endif
                <div class="alert alert-danger mb-1 py-1 px-1 font-weight-light text-black d-none" id="messageBox">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <span id="messageText"></span>
                </div>
                <form role="form">
                    @csrf
                    <div class="card-body pt-3">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputNumeroConta">Nº. Conta</label>
                                <div class="input-group input-group-sm mb-0">
                                    @if (isset($emprestimo))
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btnLogin text-white"><i class="fas fa-info"></i></span>
                                        </div>
                                        <input type="hidden" name="conta" value="{{ $emprestimo->id }}">
                                        <input class="form-control form-control-sm @error('conta') is-invalid @enderror"
                                            type="number"
                                            value="{{ $emprestimo->id }}"
                                            disabled="disabled">
                                    @else
                                        <input class="form-control form-control-sm @error('conta') is-invalid @enderror"
                                            placeholder="Procurar conta..."
                                            type="number"
                                            value="{{ old('conta') }}"
                                            autocomplete="off"
                                            name="conta">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" id="btnNumeroConta"><i class="fas fa-search"></i></button>
                                        </div>
                                    @endif
                                    @error('conta')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputTaxa">Taxa de Juro da Multa</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm @error('taxa') is-invalid @enderror"
                                        id="inputTaxa" placeholder="Taxa de Juro da Multa" name="taxa" value=""
                                        autocomplete="off">
                                    @error('taxa')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-3">
                                <label for="inputPrestacao">Nº Prestação</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm @error('prestacao') is-invalid @enderror"
                                        id="inputPrestacao"
                                        value="{{ (isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->numero : '' }}" autocomplete="off" disabled="disabled">
                                    @error('prestacao')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="inputDias">Dias de Atraso</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-calendar-check"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm @error('dias') is-invalid @enderror"
                                        id="inputDias" name="dias" value="{{ (isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->atraso : '' }}"
                                        autocomplete="off" disabled="disabled">
                                    @error('dias')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="inputMulta">Multa. Dia</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm @error('multa') is-invalid @enderror"
                                        id="inputMulta" name="multa"
                                        value="{{ (isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->multa : '' }}" autocomplete="off" disabled="disabled">
                                    @error('multa')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="inputVPagar">Valor a pagar</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm @error('vPagar') is-invalid @enderror"
                                        id="inputVPagar" name="vPagar"
                                        value="" autocomplete="off" disabled="disabled">
                                    @error('vPagar')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-1">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}" alt="User profile picture">
                                </div>
                            </div>
                            <div class="col-12 col-md-11">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item pb-1 border-top-0">
                                        <b>Nome do cliente : </b> <span id="nomeCompleto">{{ (isset($emprestimo)) ? $emprestimo->cliente->nome : '' }} {{ (isset($emprestimo)) ? $emprestimo->cliente->apelido : '' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item pb-1 border-top-0">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <b>Nº Cliente : </b> <span id="numeroCliente">{{ (isset($emprestimo)) ? $emprestimo->id : '' }}</span>
                                            </div>
                                            <div class="col-12 col-md-4 text-md-center">
                                                <b>Nº. Referencia : </b> <span id="nomeReferencia">{{ (isset($emprestimo)) ? $emprestimo->id : '' }}</span>
                                            </div>
                                            <div class="col-12 col-md-4 text-md-right">
                                                <b>Celular : </b> <span id="celular">{{ (isset($emprestimo)) ? $emprestimo->cliente->telefone1 : '' }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-dollar-sign" aria-hidden="true"></i> Saldo da conta</h3>
                </div>
                <div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor Total a pagar</span>
                                    </div>
                                    <input type="text" id="inputTotalPagar" class="font-weight-bold  form-control form-control-sm text-right" value="{{ (isset($emprestimo)) ? $emprestimo->total + $emprestimo->emprestimo : '' }}" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor do capital</span>
                                    </div>
                                    <input type="text" id="inputValorCapital" class="font-weight-bold  form-control form-control-sm text-right" value="{{ (isset($emprestimo)) ? $emprestimo->emprestimo : '' }}" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor da prestação</span>
                                    </div>    
                                    <input type="text" id="inputValorPrestacao" class="font-weight-bold  form-control form-control-sm text-right" value="{{ (isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->opcao1 : '' }}" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Saldo anterior</span>
                                    </div>    
                                    <input type="text" id="inputSaldoAnterior" class="font-weight-bold  form-control form-control-sm text-right" value="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Saldo actual</span>
                                    </div>    
                                    <input type="text" id="inputSaldoActual" class="font-weight-bold form-control form-control-sm text-right" value="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-0" id="submeter">
                                @if (isset($emprestimo) && $emprestimo->actual != null)
                                    <button class="btn btn-success btn-sm btn-block text-white" data-cat_prestacaoid={{ (isset($emprestimo)) ? $emprestimo->Actual->id : '' }} data-cat_prestacaovalor={{ (isset($emprestimo)) ? $emprestimo->Actual->opcao1 : '' }} data-cat_prestacaonumero={{ (isset($emprestimo)) ? $emprestimo->Actual->numero : '' }} data-toggle="modal" data-target="#pagarPrestacao"><i class="far fa-dot-circle" aria-hidden="true"></i> Pagar valor da prestação</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-th-large" aria-hidden="true"></i> Tabela de prestações</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-bordered table-head-fixed projects text-nowrap text-center">
                        <thead>
                            <tr>
                              <th>Nº Prestação</th>
                              <th>Valor da Prestação</th>
                              <th>Data do pagamento</th>
                              <th class="pr-2">Situação</th>
                            </tr>
                        </thead>
                        <tbody id="linhas">
                            @if (isset($prestacoes))
                                @foreach ($prestacoes as $prestacao)
                                    @if ($emprestimo->actual != null)
                                        @if ($prestacao->numero == $emprestimo->actual->numero)
                                            <tr class="table-active">
                                                <td class="">{{ $prestacao->numero }}</td>
                                                <td class="">{{ $prestacao->opcao1 }} MT</td>
                                                <td class="">{{ $prestacao->dataPrevista }}</td>
                                                <td class="px-2 text-danger">{{ $prestacao->estado }}</td>
                                            </tr>
                                        @else
                                            <tr class="">
                                                <td class="">{{ $prestacao->numero }}</td>
                                                <td class="">{{ $prestacao->opcao1 }} MT</td>
                                                @if ($prestacao->dataPagamento != null)
                                                <td class="">{{ $prestacao->dataPagamento }}</td>
                                                <td class="px-2 text-success">{{ $prestacao->estado }}</td>
                                                @else
                                                <td class="">{{ $prestacao->dataPrevista }}</td>
                                                <td class="px-2 text-danger">{{ $prestacao->estado }}</td>
                                                @endif
                                            </tr> 
                                        @endif
                                    @else
                                    <tr class="">
                                        <td class="">{{ $prestacao->numero }}</td>
                                        <td class="">{{ $prestacao->opcao1 }} MT</td>
                                        <td class="">{{ $prestacao->dataPagamento }}</td>
                                        <td class="px-2 text-success">{{ $prestacao->estado }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="pagarPrestacao">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h6 class="modal-title text-center">Desejas realmente confirmar o pagamento?</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('prestacao.pay') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>Clique em confirmar, se e somente se, realmente recebeu do cliente o valor de <span id="valor"></span>,00MT referente ao pagamento da <span id="numero"></span>ª prestação!</p>
                                <input type="hidden" name="prestacao_id" id="prestacao_id" value="">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-success btn-outline-light">Confirmar</button>
                                <button type="button" class="btn btn-danger btn-outline-light" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection