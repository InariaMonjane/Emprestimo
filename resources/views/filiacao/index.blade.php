@extends('layouts.app')

@section('content')

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold">Sucursais</span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span>{{ date('d-m-Y') }}</div>
    </div>
  </div>

  <div class="content-header py-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-5 px-0">
          <!-- Default box -->
          <div class="card my-0">
            <div class="card-header">
              <h3 class="card-title">
                <b>{{(isset($filiacao)) ? 'Atualizar':'Nova'}} sucursal</b> <i class="fas fa-home" aria-hidden="true"></i>
              </h3>
            </div>
            <div class="card-body">
              <form action="{{ (isset($filiacao)) ? '/Admin/Filiacao/atualizar/'.$filiacao->id:route('filiacao.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-row">
                  <div class="form-group col-md-12">
                  <label for="inputNome">Localização</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text  bg-dark">
                          <i class="fa fa-home" aria-hidden="true"></i>
                        </div>  
                      </div>
                      <input type="text" 
                             class="form-control form-control-sm @error('localizacao') is-invalid @enderror" 
                             id="inputNome" 
                             placeholder="Localização..." 
                             name="localizacao" value="{{(isset($filiacao)) ? $filiacao->nome:''}}" 
                             autocomplete="off">
                        @error('localizacao')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                  </div>    
                </div>

                <div class="row d-flex justify-content-around">
                  <div class="col-6">
                    <div class="form-group mb-0">
                      <button type="submit" class="btn btnLogin border border-white rounded text-white"> 
                          @if(isset($filiacao)) 
                              Atualizar <i class="fa fa-refresh" aria-hidden="true"></i>
                          @else
                              Registar <i class="fa fa-plus" aria-hidden="true"></i>
                          @endif
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group mb-0 text-right">
                      <button type="reset" class="btn btn-danger">Limpar <i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
                

              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-12 col-md-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sucursais</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body table-responsive p-0" style="max-height: 300px;">
              <table class="table table-sm table-hover table-head-fixed projects text-nowrap">
                <thead>
                  <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 40%">Localização</th>
                    <th style="width: 10%">Users</th>
                    <th style="width: 15%"></th>
                    <th style="width: 15%"></th>
                    <th style="width: 15%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($filiacoes as $filiacao)    
                    <tr>
                      <td>
                        <a>
                          {{ $loop->iteration }}
                        </a>
                      </td>
                      <td>
                        <a href="/Admin/Filiacao/{{$filiacao->id}}" class="text-dark">
                          {{ $filiacao->localizacao }}
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="/Admin/Filiacao/{{$filiacao->id}}" class="text-dark">
                          <span class="badge badge-dark">{{ count($filiacao->colaboradores) }}</span>
                        </a>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-sm btnLogin border border-white rounded text-white" href="/Admin/Filiacao/editar/{{$filiacao->id}}">
                          <i class="far fa-dot-circle"> </i> Detalhes
                        </a>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="/Admin/Filiacao/editar/{{$filiacao->id}}">
                          <i class="fa fa-paint-brush"> </i> Editar
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" data-catid={{$filiacao->id}} data-toggle="modal" data-target="#deleteFiliacao">
                          <i class="fa fa-trash"> </i> Apagar
                        </button>              
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="modal fade" id="deleteFiliacao">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h6 class="modal-title">Desejas realmente apagar?</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/Admin/Filiacao/eliminar" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <p>Apagar a Sucursal pode se reflectir noutras partes do sistema que dependam da mesma!</p>
                    <input type="hidden" name="category_id" id="cat_id" value="">
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
@endsection