@extends('layouts.app')

@section('content')
<section class="content-header py-2">
  <div class="container-fluid">
    <div class="row mb-0">
      <div class="col-sm-6">
        <h3>Abertura de conta</h3>
      </div>
    </div>
  </div>
</section>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Dados da conta</h3>
        </div>
        {{-- Data Base --}}
        @if(Session::has('DBError'))
        <div class="alert alert-danger mt-2 mx-3" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p class="m-0 text-center">{{ Session::get('DBError') }}</p>
        </div>
        @endif
        {{-- Data Base --}}
        @if(Session::has('DBSuccess'))
        <div class="alert alert-success mt-2 mx-3" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p class="m-0 text-center">{{ Session::get('DBSuccess') }}</p>
        </div>
        @endif
        <form role="form" method="post" action="{{ route('emprestimo.store') }}">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="form-group col-6 col-md-3 mb-1">
                <label for="inputNumero">Nº. Cliente</label>
                <div class="input-group input-group-sm mb-0">
                  @if (isset($cliente))
                    <div class="input-group-append">
                      <button class="btn btn-danger" id="btnNumero"><i class="fas fa-info"></i></button>
                    </div>
                    <input class="form-control form-control-sm @error('cliente') is-invalid @enderror"
                      placeholder="Procurar cliente..."
                      type="number"
                      value="{{ $cliente['id'] }}"
                      autocomplete="off"
                      disabled>
                      <input type="hidden" name="cliente" value="{{ $cliente['id'] }}">
                  @else
                    <input class="form-control form-control-sm @error('cliente') is-invalid @enderror"
                      placeholder="Procurar cliente..."
                      type="number"
                      value="{{ old('cliente') }}"
                      autocomplete="off"
                      name="cliente">
                    <div class="input-group-append">
                      <button class="btn btn-dark" id="btnNumero"><i class="fas fa-search"></i></button>
                    </div>
                  @endif
                  @error('cliente')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-6 col-md-3 mb-1">
                <label for="inputReferencia">Ref. Nº</label>
                <div class="input-group input-group-sm mb-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-address-card"></i></span>
                  </div>
                  @if (isset($cliente))
                    <input class="form-control form-control-sm @error('referencia') is-invalid @enderror"
                      placeholder="Nº referencia"
                      type="number"
                      value="{{ $cliente->emprestimos()->get()->count() }}"
                      autocomplete="off"
                      id="inputReferencia"
                      disabled>
                      <input type="hidden" name="referencia" value="{{ $cliente['id'] }}">
                  @else
                    <input class="form-control form-control-sm @error('referencia') is-invalid @enderror"
                      placeholder="Nº referencia"
                      type="number"
                      value="{{ old('referencia') }}"
                      autocomplete="off"
                      id="inputReferencia"
                      disabled>
                  @endif
                  @error('referencia')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-6 mb-1">
                <label for="inputNome">BI</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-address-card"></i></span>
                  </div>
                  <input type="text" 
                    class="form-control form-control-sm @error('bi') is-invalid @enderror" 
                    id="inputBi" 
                    placeholder="Número do BI" 
                    name="bi"
                    value="{{(isset($cliente)) ? $cliente['bi'] : old('bi')}}"
                    autocomplete="off"
                    disabled>
                  @error('bi')
                    <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-6 mb-1">
                <label for="inputNome">Nome</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text"
                    class="form-control form-control-sm @error('nome') is-invalid @enderror"
                    id="inputNome" placeholder="Nome" name="nome" value="{{(isset($cliente)) ? $cliente['nome'] : old('nome') }}"
                    autocomplete="off"
                    disabled>
                  @error('nome')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-6 mb-1">
                <label for="inputApelido">Apelido</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text"
                    class="form-control form-control-sm @error('apelido') is-invalid @enderror"
                    id="inputApelido" placeholder="Apelido" name="apelido"
                    value="{{(isset($cliente)) ? $cliente['apelido'] : old('apelido') }}" autocomplete="off"
                    disabled>
                  @error('apelido')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-group col-12 col-md-4 mb-1">
                <label for="inputEmprestimo">Valor solicitado</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm @error('emprestimo') is-invalid @enderror inputForm"
                    id="inputEmprestimo" placeholder="Valor do Emprestimo" name="emprestimo"
                    value="{{ old('emprestimo') }}" autocomplete="off">
                  @error('emprestimo')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              
              <div class="form-group col-12 col-md-4 mb-1">
                <label for="inputPrestacoes">Nº Prestações</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fa fa-plus"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm @error('prestacoes') is-invalid @enderror inputForm"
                    id="inputPrestacoes" placeholder="Número de Prestações" name="prestacoes"
                    value="{{ old('prestacoes') }}" autocomplete="off">
                  @error('prestacoes')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              
              <div class="form-group col-12 col-md-2 mb-1">
                <label for="inputTaxa">Taxa</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fa fa-percent"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm @error('taxa') is-invalid @enderror inputForm"
                    id="inputTaxa" placeholder="Taxa" name="taxa" value="{{ old('taxa') }}"
                    autocomplete="off">
                  @error('taxa')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-2 mb-1">
                <label for="inputDias">Dias</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fa fa-calendar-check"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm @error('dias') is-invalid @enderror inputForm"
                    id="inputDias" placeholder="Dias" name="dias" value="{{ old('dias') }}"
                    autocomplete="off">
                  @error('dias')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-6 mb-1">
                <label for="inputGarantias">Garantias</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fa fa-building"></i></span>
                  </div>
                  <input type="text"
                    class="form-control form-control-sm @error('garantias') is-invalid @enderror"
                    id="inputGarantias" placeholder="Garantias" name="garantias" value="{{ old('garantias') }}"
                    autocomplete="off">
                  @error('garantias')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-3 mb-1">
                <label for="inputAquisicao">Data de aquisição</label>
                <div class="input-group">
                  <!--div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div-->
                  <input type="date"
                    class="form-control form-control-sm @error('aquisicao') is-invalid @enderror"
                    id="inputAquisicao" placeholder="Data de aquisição" name="aquisicao"
                    value="{{ old('aquisicao') }}" autocomplete="off">
                  @error('aquisicao')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-12 col-md-3 mb-1">
                <label for="inputPreco">Preço avaliado</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm @error('preco') is-invalid @enderror"
                    id="inputPreco" placeholder="Preço avaliado" name="preco"
                    value="{{ old('preco') }}" autocomplete="off">
                  @error('preco')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="card-body table-responsive pt-0">
            <table class="table table-sm table-hover table-head-fixed projects text-nowrap">
              <thead>
                <tr>
                  <th style="width: 14%">Capital</th>
                  <th style="width: 10%">Taxa</th>
                  <th style="width: 14%">Juros</th>
                  <th style="width: 10%">Capital</th>
                  <th style="width: 14%">1ª opção</th>
                  <th style="width: 14%">2ª opção</th>
                  <th style="width: 14%" class="">Data</th>
                </tr>
              </thead>
              <tbody id="linhas" class="table-bordered"></tbody>
            </table>
          </div>

          <div class="card-footer">
            <div class="row d-flex justify-content-around">
              <div class="col-4">
                <div class="form-group mb-0">
                  <button type="submit" class="btn btn-success" id="btnLogin">
                    Registar <i class="fa fa-save" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group mb-0 text-center">
                <button type="button" class="btn btn-primary">Imprimir <i class="fa fa-print" aria-hidden="true"></i></button>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group mb-0 text-right">
                  <button type="reset" class="btn btn-danger">Limpar <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection