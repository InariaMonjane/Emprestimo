<?php $__env->startSection('content'); ?>
    <div class="card rounded-0 container-fluid">
      <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Criar Entidade</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
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
              <form role="form" method="post" action="<?php echo e(route('entidade.store')); ?>">
                <?php echo csrf_field(); ?>
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
                            class="form-control form-control-sm <?php $__errorArgs = ['tipo_de_entidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="inputEntidade" 
                            name="tipo_de_entidade"
                            value="<?php echo e(old('tipo_de_entidade')); ?>"
                            autocomplete="off">
                          <option value="">Selecione a entidade</option>
                          <option value="Comerciante">Comerciante</option>
                          <option value="Funcionario">Funcionario</option>
                          <option value="Outros">Outros</option>
                        </select>
                        <?php $__errorArgs = ['tipo_de_entidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputEmail">E-mail</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" 
                                class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputEmail" 
                                placeholder="E-mail" 
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            class="form-control form-control-sm <?php $__errorArgs = ['processo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="inputProcesso" 
                            name="processo"
                            value="<?php echo e(old('processo')); ?>"
                            autocomplete="off">
                          <option value="">Selecione o processo</option>
                          <option value="Comerciante">Empresa</option>
                          <option value="Funcionario">Particular</option>
                          <option value="Outros">Outros</option>
                        </select>
                        <?php $__errorArgs = ['processo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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
                            class="form-control form-control-sm <?php $__errorArgs = ['solicitacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="inputSolicitacao" 
                            name="solicitacao"
                            value="<?php echo e(old('solicitacao')); ?>"
                            autocomplete="off">
                          <option value="">Selecione a solicitação</option>
                          <option value="Empresarial">Credito</option>
                          <option value="Particular">DO</option>
                        </select>
                        <?php $__errorArgs = ['solicitacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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
                            class="form-control form-control-sm <?php $__errorArgs = ['situacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="inputSituacao" 
                            name="situacao"
                            value="<?php echo e(old('situacao')); ?>"
                            autocomplete="off">
                          <option value="">Selecione a situação</option>
                          <option value="Comerciante">Pendente</option>
                        </select>
                        <?php $__errorArgs = ['situacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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
                                class="form-control form-control-sm <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                id="inputNome" 
                                placeholder="Nome" 
                                name="nome"
                                value="<?php echo e(old('nome')); ?>" 
                                autocomplete="off">
                        <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>       
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputApelido">Apelido</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm <?php $__errorArgs = ['apelido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="inputApelido" 
                                placeholder="Apelido" 
                                name="apelido"
                                value="<?php echo e(old('apelido')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['apelido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>       
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
                                class="form-control form-control-sm <?php $__errorArgs = ['aniversario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                id="inputNuit" 
                                placeholder="Data aniversário" 
                                name="aniversario"
                                value="<?php echo e(old('aniversario')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['aniversario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputNome">BI</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-id-badge"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm <?php $__errorArgs = ['bi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                id="inputBi" 
                                placeholder="Número do BI" 
                                name="bi"
                                value="<?php echo e(old('bi')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['bi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputValidade">Validade</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" 
                                class="form-control form-control-sm <?php $__errorArgs = ['validade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                id="inputValidade" 
                                placeholder="Validade do BI" 
                                name="validade"
                                value="<?php echo e(old('validade')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['validade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                class="form-control form-control-sm <?php $__errorArgs = ['nuit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputNuit" 
                                placeholder="Nuit" 
                                name="nuit"
                                value="<?php echo e(old('nuit')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['nuit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputTelefone1">Telefone 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fas fa-mobile"></i></span>
                        </div>
                        <input type="number" 
                          class="form-control form-control-sm <?php $__errorArgs = ['telefone_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                          id="inputTelefone1" 
                          placeholder="Telefone 1" 
                          name="telefone_1"
                          value="<?php echo e(old('telefone_1')); ?>"
                          autocomplete="off">
                        <?php $__errorArgs = ['telefone_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-4 mb-1">
                      <label for="inputTelefone2">Telefone 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fas fa-tty"></i></span>
                        </div>
                        <input type="number" 
                                class="form-control form-control-sm <?php $__errorArgs = ['telefone_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputTelefone2" 
                                placeholder="Telefone 2" 
                                name="telefone_2"
                                value="<?php echo e(old('telefone_2')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['telefone_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                              class="form-control form-control-sm <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                              id="inputGenero" 
                              placeholder="Genero" 
                              name="genero"
                              value="<?php echo e(old('genero')); ?>" 
                              autocomplete="off">
                          <option value="">Selecione o genero</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                        </select>
                        <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>       
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputEndereco">Endereço</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-street-view"></i></span>
                        </div>
                        <input type="text" 
                                class="form-control form-control-sm <?php $__errorArgs = ['endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="inputEndereco" 
                                placeholder="Endereço" 
                                name="endereco"
                                value="<?php echo e(old('endereco')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>       
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
                                class="form-control form-control-sm <?php $__errorArgs = ['banco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputBanco" 
                                placeholder="Banco" 
                                name="banco"
                                value="<?php echo e(old('banco')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['banco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-1">
                      <label for="inputConta">Número da conta</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark"><i class="fa fa-credit-card"></i></span>
                        </div>
                        <input type="number" 
                                class="form-control form-control-sm <?php $__errorArgs = ['conta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputConta" 
                                placeholder="Número da conta" 
                                name="conta"
                                value="<?php echo e(old('conta')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['conta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                class="form-control form-control-sm <?php $__errorArgs = ['observacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                                id="inputObservacao" 
                                placeholder="Observação" 
                                name="observacao"
                                value="<?php echo e(old('observacao')); ?>"
                                autocomplete="off">
                        <?php $__errorArgs = ['observacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="error invalid-feedback"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Code2025/Emprestimo/resources/views/balcao/entidade/create.blade.php ENDPATH**/ ?>