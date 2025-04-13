@extends('layouts.app')

@section('content')
    <div class="card rounded-0 container-fluid">
      <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Criar Entidade</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span>{{ date('d-m-Y') }}</div>
      </div>
    </div>  
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Entidade</h3>
              </div>
              <!-- form start -->
              <form role="form" method="post" action="{{ route('entidade.store') }}">
                @csrf
                <div class="card-body pb-0">
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputEntidade">Tipo de Entidade</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select 
                            class="form-control form-control-sm @error('tipo_de_entidade') is-invalid @enderror"
                            id="inputEntidade" 
                            name="tipo_de_entidade"
                            value="{{ old('tipo_de_entidade') }}"
                            autocomplete="off">
                          <option value="">Selecione a entidade</option>
                          <option value="Comerciante">Comerciante</option>
                          <option value="Funcionario">Funcionario</option>
                          <option value="Outros">Outros</option>
                        </select>
                        @error('tipo_de_entidade')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror 
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputEmail">E-mail</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" 
                                class="form-control form-control-sm @error('email') is-invalid @enderror"  
                                id="inputEmail" 
                                placeholder="E-mail" 
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="off">
                        @error('email')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputProcesso">Processo</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select 
                            class="form-control form-control-sm @error('processo') is-invalid @enderror"
                            id="inputProcesso" 
                            name="processo"
                            value="{{ old('processo') }}"
                            autocomplete="off">
                          <option value="">Selecione o processo</option>
                          <option value="Comerciante">Empresa</option>
                          <option value="Funcionario">Particular</option>
                          <option value="Outros">Outros</option>
                        </select>
                        @error('processo')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror 
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputSolicitacao">Solicitação</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select 
                            class="form-control form-control-sm @error('solicitacao') is-invalid @enderror"
                            id="inputSolicitacao" 
                            name="solicitacao"
                            value="{{ old('solicitacao') }}"
                            autocomplete="off">
                          <option value="">Selecione a solicitação</option>
                          <option value="Empresarial">Credito</option>
                          <option value="Particular">DO</option>
                        </select>
                        @error('solicitacao')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror 
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputSituacao">Situação</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select 
                            class="form-control form-control-sm @error('situacao') is-invalid @enderror"
                            id="inputSituacao" 
                            name="situacao"
                            value="{{ old('situacao') }}"
                            autocomplete="off">
                          <option value="">Selecione a situação</option>
                          <option value="Comerciante">Pendente</option>
                        </select>
                        @error('situacao')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror 
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputNome">Nome</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('nome') is-invalid @enderror" 
                                id="inputNome" 
                                placeholder="Nome" 
                                name="nome"
                                value="{{ old('nome') }}" 
                                autocomplete="off">
                        @error('nome')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror       
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputApelido">Apelido</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('apelido') is-invalid @enderror"
                                id="inputApelido" 
                                placeholder="Apelido" 
                                name="apelido"
                                value="{{ old('apelido') }}"
                                autocomplete="off">
                        @error('apelido')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror       
                      </div>
                    </div>
                  </div>  
                  
                  <div class="form-row">
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputNuit">Data de nascimento</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-birthday-cake"></i></span>
                        </div>
                        <input type="date" 
                                class="form-control form-control-sm @error('aniversario') is-invalid @enderror" 
                                id="inputNuit" 
                                placeholder="Data aniversário" 
                                name="aniversario"
                                value="{{ old('aniversario') }}"
                                autocomplete="off">
                        @error('aniversario')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputNome">BI</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-id-badge"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('bi') is-invalid @enderror" 
                                id="inputBi" 
                                placeholder="Número do BI" 
                                name="bi"
                                value="{{ old('bi') }}"
                                autocomplete="off">
                        @error('bi')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputValidade">Validade</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" 
                                class="form-control form-control-sm @error('validade') is-invalid @enderror" 
                                id="inputValidade" 
                                placeholder="Validade do BI" 
                                name="validade"
                                value="{{ old('validade') }}"
                                autocomplete="off">
                        @error('validade')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputNuit">Nuit</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-id-card"></i></span>
                        </div>
                        <input type="number" 
                                class="form-control form-control-sm @error('nuit') is-invalid @enderror"  
                                id="inputNuit" 
                                placeholder="Nuit" 
                                name="nuit"
                                value="{{ old('nuit') }}"
                                autocomplete="off">
                        @error('nuit')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputTelefone1">Telefone 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fas fa-mobile"></i></span>
                        </div>
                        <input type="number" 
                          class="form-control form-control-sm @error('telefone_1') is-invalid @enderror"  
                          id="inputTelefone1" 
                          placeholder="Telefone 1" 
                          name="telefone_1"
                          value="{{ old('telefone_1') }}"
                          autocomplete="off">
                        @error('telefone_1')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputTelefone2">Telefone 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fas fa-tty"></i></span>
                        </div>
                        <input type="number" 
                                class="form-control form-control-sm @error('telefone_2') is-invalid @enderror"  
                                id="inputTelefone2" 
                                placeholder="Telefone 2" 
                                name="telefone_2"
                                value="{{ old('telefone_2') }}"
                                autocomplete="off">
                        @error('telefone_2')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputGenero">Genero</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-user"></i></span>
                        </div>
                        <select 
                              class="form-control form-control-sm @error('genero') is-invalid @enderror" 
                              id="inputGenero" 
                              placeholder="Genero" 
                              name="genero"
                              value="{{ old('genero') }}" 
                              autocomplete="off">
                          <option value="">Selecione o genero</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                        </select>
                        @error('genero')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror       
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputEndereco">Endereço</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-street-view"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('endereco') is-invalid @enderror"
                                id="inputEndereco" 
                                placeholder="Endereço" 
                                name="endereco"
                                value="{{ old('endereco') }}"
                                autocomplete="off">
                        @error('endereco')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror       
                      </div>
                    </div>
                  </div> 
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputBanco">Banco</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-university"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('banco') is-invalid @enderror"  
                                id="inputBanco" 
                                placeholder="Banco" 
                                name="banco"
                                value="{{ old('banco') }}"
                                autocomplete="off">
                        @error('banco')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputConta">Número da conta</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-credit-card"></i></span>
                        </div>
                        <input type="number" 
                                class="form-control form-control-sm @error('conta') is-invalid @enderror"  
                                id="inputConta" 
                                placeholder="Número da conta" 
                                name="conta"
                                value="{{ old('conta') }}"
                                autocomplete="off">
                        @error('conta')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form.row">
                    <div class="form-group col-12">
                      <label for="inputObservacao">Observação</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fas fa-info"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm @error('observacao') is-invalid @enderror"  
                                id="inputObservacao" 
                                placeholder="Observação" 
                                name="observacao"
                                value="{{ old('observacao') }}"
                                autocomplete="off">
                        @error('observacao')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="row d-flex justify-content-around">
                    <div class="col-4">
                      <div class="form-group mb-0">
                      <button type="submit" class="btn bg-dark">Registar <i class="fa fa-user-plus" aria-hidden="true"></i></button>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group mb-0 text-center">
                      <button type="button" class="btn btn-success">Imprimir <i class="fa fa-print" aria-hidden="true"></i></button>
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
            <!-- /.card -->
          </div>
        </div>
    </div>
@endsection