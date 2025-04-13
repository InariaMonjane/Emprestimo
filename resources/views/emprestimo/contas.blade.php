@extends('layouts.app')

@section('content')
<div class="card rounded-0 container-fluid">
    <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Emprestimos</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span>{{ date('d-m-Y') }}</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" itle="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 700px;">
                    <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
                        <thead>
                            <tr>
                                <th>Nome do cliente</th>
                                <th>Referencia</th>
                                <th>Valor solicitado</th>
                                <th>Data</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contas as $conta)
                            <tr>
                                <td>{{ $conta->cliente->nome }} {{ $conta->cliente->apelido }}</td>
                                <td>{{ $conta->referencia }}</td>
                                <td>{{ $conta->emprestimo }}</td>
                                <td>{{ date_format($conta->created_at,'d-M-Y') }}</td>
                                <td class="text-center">
                                    @if($conta->candelete)
                                    <a class="btn btn-danger btn-sm" href="/emprestimo/remove/{{$conta->id}}">
                                        Remover <i class="fa fa-trash"> </i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger font-weight-bold py-4">Hoje não temos pagamentos de prestações!</td>
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