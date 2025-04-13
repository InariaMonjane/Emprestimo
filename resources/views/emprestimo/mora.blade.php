@extends('layouts.app')

@section('content')
<div class="card rounded-0 container-fluid">
    <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Clientes em mora</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span>{{ date('d-m-Y') }}</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 700px;">
                    <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
                        <thead>
                            <tr>
                                <th>Conta</th>
                                <th>Nome do cliente</th>
                                <th>Nº Prestação</th>
                                <th>Dias de Atraso</th>
                                <th>Valor da Prestação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mora as $conta)
                            <tr>
                                <td>{{ $conta->emprestimo_id }}</td>
                                <td>{{ $conta->emprestimo->cliente->nome }} {{ $conta->emprestimo->cliente->apelido }}</td>
                                <td>{{ $conta->numero }}</td>
                                <td>{{ $conta->multa }}</td>
                                <td>{{ $conta->opcao1 }} MT</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger font-weight-bold py-4">Não temos pagamentos em mora!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection