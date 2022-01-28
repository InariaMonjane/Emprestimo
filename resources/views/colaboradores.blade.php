@extends('layouts.app')

  @section('title','colaboradores')

  @section('content')

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold">@if(isset($colaborador)) Atualizar {{$colaborador->login->name}} @else Lista dos colaboradores @endif</span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span>@php echo date('d-m-Y') @endphp</div>
    </div>
  </div>

    <div class="content-header py-2">
      <div class="container-fluid">
        <div class="row">
          @if(Auth::user()->perfil->acesso === 'Gestor')
          <div class="col-12">
            <div class="card p-0 mt-1">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user-plus" aria-hidden="true"></i> <b>Funcionário</b></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body py-2">
                {{-- Data Base --}}
                @if(Session::has('EmailExiste'))
                <div class="alert alert-danger mt-2 mx-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p class="m-0 text-center">{{ Session::get('EmailExiste') }}</p>
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
                <form action="{{(isset($colaborador)) ? '/Admin/Usuarios/colaborador/atualizar/'.$colaborador->id:route('colaborador.store')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                  <div class="form-row">
                    <div class="form-group mb-1 col-12 col-md-6">
                      <label for="inlineFormInputGroup">E-mail</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text btnLogin text-white">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="inlineFormInputGroup" name="email" placeholder="E-mail" value="{{(isset($colaborador)) ? $colaborador->login->email:old('email')}}"  autocomplete="off">
                        @error('email')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-1 col-12 col-md-6">
                    <label for="inlineFormInputGroup">Sucursal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text btnLogin text-white">
                            <i class="fa fa-home" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select id="inputLocal" name="sucursal" class="form-control form-control-sm @error('sucursal') is-invalid @enderror">
                          @if(isset($colaborador))
                            <option value="{{$colaborador->filiacao->id}}" selected>{{$colaborador->filiacao->localizacao}}</option>
                          @else
                          <option value="" selected>Sucursal</option>
                          @endif
                          @foreach($filiacoes as $filiacao)
                            <option value="{{ $filiacao->id }}">{{ $filiacao->localizacao }}</option>
                          @endforeach
                        </select>
                        @error('sucursal')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>                  
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                      <label for="inlineFormInputGroup">Nome</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text btnLogin text-white">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>  
                        </div>
                        <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" id="inlineFormInputGroup" name="nome" placeholder="Nome" value="{{(isset($colaborador)) ? $colaborador->login->name:old('nome')}}"  autocomplete="off">
                        @error('nome')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="inlineFormInputGroup">Apelido</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text btnLogin text-white">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>  
                        </div>
                        <input type="text" class="form-control form-control-sm @error('apelido') is-invalid @enderror" id="inlineFormInputGroup" name="apelido" placeholder="Apelido" value="{{(isset($colaborador)) ? $colaborador->login->apelido:old('apelido')}}"  autocomplete="off">
                        @error('apelido')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-around">
                    <div class=" col-12 col-md-3">
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btnLogin border border-white rounded text-white btn-block"> 
                          @if(isset($colaborador)) 
                            Atualizar <i class="fa fa-refresh" aria-hidden="true"></i>
                          @else
                            Registar <i class="fa fa-user-plus" aria-hidden="true"></i>
                          @endif
                        </button>
                      </div>
                    </div>
                    <div class=" col-12 col-md-6"></div>  
                    <div class=" col-12 col-md-3">
                      <div class="form-group mb-0 text-right">
                        <button type="reset" class="btn btn-danger btn-block">Limpar <i class="fa fa-times" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>                  
                </form> 
              </div>
            </div>
          </div>
          @endif
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Colaboradores</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="max-height: 300px;">
                <table class="table table-sm table-hover table-head-fixed projects text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 2%">#</th>
                      <th style="width: 5%"></th>
                      <th style="width: 14%">Nome</th>
                      <th style="width: 14%">Apelido</th>
                      <th style="width: 25%">Email</th>
                      <th style="width: 20%">Filiação</th>
                      <th style="width: 10%"></th>
                      <th style="width: 10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(isset($colaboradores))
                    @foreach($colaboradores as $colaborador)    
                    <tr>
                      <td><a>{{ $loop->iteration }}</a></td>
                      <td>
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="{{ asset('img/user.png') }}">
                          </li>
                        </ul>
                      </td>
                      <td>{{ $colaborador->login->nome }}</td>
                      <td>{{ $colaborador->login->apelido }}</td>
                      <td>{{ $colaborador->login->email }}</td>
                      <td>{{ $colaborador->filiacao->localizacao }}</td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="/Admin/Filiacao/editar/{{$colaborador->id}}">
                          <i class="fa fa-paint-brush"> </i> Editar
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" data-catid={{$colaborador->id}} data-toggle="modal" data-target="#deleteFiliacao">
                          <i class="fa fa-trash"> </i> Apagar
                        </button>              
                      </td>
                    </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="deletecolaborador">
              <div class="modal-dialog">
                <div class="modal-content bg-danger">
                  <div class="modal-header">
                    <h6 class="modal-title">Desejas realmente apagar <span id="colaborador"></span> ?</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      <p>Ao remover o secretario ele permanece inativo no sistema, podendo reativa-lo assim que necessário!</p>
                      <input type="hidden" name="colaborador_id" id="cat_colaboradorid" value="">
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-outline-light">Confirmar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endsection()