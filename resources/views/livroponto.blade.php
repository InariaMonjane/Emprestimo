@extends('layouts.app')

@section('content')

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold">Livro do Ponto</span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span>@php echo date('d-m-Y') @endphp</div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Preencher dados</h3>
                </div>
                <form name="formPresenca" role="form" method="post" action="{{ route('livroponto.store') }}" >
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputEmpresa">Empresa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm" 
                                        id="inputEmpresa"
                                        value="{{ config('app.empresa') }}"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputSucursal">Sucursal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm" 
                                        id="inputSucursal" 
                                        value="{{ Auth::user()->colaborador->filiacao->localizacao }}"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-8 mb-1">
                                <label for="inputUser">User</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm" 
                                        id="inputUser"
                                        value="{{ Auth::user()->nome }} {{ Auth::user()->apelido }}"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4 mb-0">
                                <label for="inputCodigo">Cod. Nº</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm" 
                                        id="inputCodigo"
                                        value="{{ Auth::user()->id }}"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputEstado">Estado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-street-view" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm"
                                        id="inputEstado" 
                                        value="{{ (isset($presenca)) ? 'Saída':'Entrada' }}"
                                        disabled="disabled"
                                    >
                                    <input type="hidden" name="estado" value="{{ (isset($presenca)) ? 'Saída':'Entrada' }}"> 
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputHora">Hora</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" 
                                        class="form-control form-control-sm"
                                        id="inputHora" 
                                        value="{{ date('H:i') }}"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 mb-0">
                                <label for="inputObs">Obs...</label>
                                <textarea class="form-control @error('observacao') is-invalid @enderror" rows="2" value="{{ old('observacao') }}" name="observacao"></textarea>
                                @error('observacao')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pb-1">
                        <div class="form-group">
                            @if(isset($presenca))
                                <button type="submit" class="btn btn-danger btn-block">
                                    Registar saída <i class="fa fa-sign-language" aria-hidden="true"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-block btnLogin text-white">
                                    Registar entrada <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection