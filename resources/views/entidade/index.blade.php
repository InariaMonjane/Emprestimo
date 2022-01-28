@extends('layouts.app')

@section('content')
<section class="content-header py-2">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h5 class="mb-0">Extrato de Entidades</h5>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card rounded-0 mb-0">
                <div class="card-footer pb-0">
                    <p class="text-center mb-0 font-weight text-verde">Para os clientes antigos recomenda-se pesquisar<br><b>A pesquisa é pelo número do BI</b></p>
                </div>
                <div class="card-footer px-2">
                    <form class="form-inline">
                        {{ csrf_field() }} 
                        <div class="input-group input-group-sm" style="width: 100%">
                            <input class="form-control" id="search" type="search" placeholder="Pesquisar cliente..." aria-label="Search"  autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btnLogin text-white" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>      
            </div> 
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user-secret" aria-hidden="true"></i> Entidades</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 300px;">
                    <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
                        <thead>
                            <tr>
                                <th>Nº Cliente</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Número de BI</th>
                                <th>Validade</th>
                                <th>NUIT</th>
                                <th>Celular</th>
                                <th>Data</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td class="text-center">{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->apelido }}</td>
                                <td>{{ $cliente->bi }}</td>
                                <td>{{ $cliente->validade }}</td>
                                <td>{{ $cliente->nuit }}</td>
                                <td>{{ $cliente->telefone1 }}</td>
                                <td>{{ date_format($cliente->created_at,'d-m-Y') }}</td>
                                <td class="text-center">
                                    <a class="btn btnLogin btn-sm text-white" href="#" disabled>
                                        <i class="fa fa-pencil"> </i> Actualizar
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-dark btn-sm" href="/emprestimo/create/{{$cliente->id}}">
                                        <i class="fa fa-pencil"> </i> Criar conta
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection