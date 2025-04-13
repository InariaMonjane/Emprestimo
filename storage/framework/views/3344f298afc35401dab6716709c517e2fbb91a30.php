

  <?php $__env->startSection('title','colaboradores'); ?>

  <?php $__env->startSection('content'); ?>

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold"><?php if(isset($colaborador)): ?> Atualizar <?php echo e($colaborador->login->name); ?> <?php else: ?> Lista dos colaboradores <?php endif; ?></span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
  </div>

    <div class="content-header py-2">
      <div class="container-fluid">
        <div class="row">
          <?php if(Auth::user()->perfil->acesso === 'Gestor'): ?>
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
                <form action="<?php echo e((isset($colaborador)) ? '/Admin/Usuarios/colaborador/atualizar/'.$colaborador->id:route('colaborador.store')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?> 
                  <div class="form-row">
                    <div class="form-group mb-1 col-12 col-md-6">
                      <label for="inlineFormInputGroup">E-mail</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inlineFormInputGroup" name="email" placeholder="E-mail" value="<?php echo e((isset($colaborador)) ? $colaborador->login->email:old('email')); ?>"  autocomplete="off">
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
                    <div class="form-group mb-1 col-12 col-md-6">
                    <label for="inlineFormInputGroup">Sucursal</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-home" aria-hidden="true"></i>
                          </div>
                        </div>
                        <select id="inputLocal" name="sucursal" class="form-control form-control-sm <?php $__errorArgs = ['sucursal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                          <?php if(isset($colaborador)): ?>
                            <option value="<?php echo e($colaborador->filiacao->id); ?>" selected><?php echo e($colaborador->filiacao->localizacao); ?></option>
                          <?php else: ?>
                          <option value="" selected>Sucursal</option>
                          <?php endif; ?>
                          <?php $__currentLoopData = $filiacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($filiacao->id); ?>"><?php echo e($filiacao->localizacao); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['sucursal'];
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
                    <div class="form-group col-12 col-md-6">
                      <label for="inlineFormInputGroup">Nome</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>  
                        </div>
                        <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inlineFormInputGroup" name="nome" placeholder="Nome" value="<?php echo e((isset($colaborador)) ? $colaborador->login->name:old('nome')); ?>"  autocomplete="off">
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
                    <div class="form-group col-12 col-md-6">
                      <label for="inlineFormInputGroup">Apelido</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text bg-dark">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>  
                        </div>
                        <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['apelido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inlineFormInputGroup" name="apelido" placeholder="Apelido" value="<?php echo e((isset($colaborador)) ? $colaborador->login->apelido:old('apelido')); ?>"  autocomplete="off">
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
                  <div class="row d-flex justify-content-around">
                    <div class=" col-12 col-md-3">
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btnLogin border border-white rounded text-white btn-block"> 
                          <?php if(isset($colaborador)): ?> 
                            Atualizar <i class="fa fa-refresh" aria-hidden="true"></i>
                          <?php else: ?>
                            Registar <i class="fa fa-user-plus" aria-hidden="true"></i>
                          <?php endif; ?>
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
          <?php endif; ?>
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
                      <th style="width: 20%">Sucursal</th>
                      <th style="width: 10%"></th>
                      <th style="width: 10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($colaboradores)): ?>
                    <?php $__currentLoopData = $colaboradores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colaborador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <tr>
                      <td><a><?php echo e($loop->iteration); ?></a></td>
                      <td>
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="<?php echo e(asset('img/user.png')); ?>">
                          </li>
                        </ul>
                      </td>
                      <td><?php echo e($colaborador->login->nome); ?></td>
                      <td><?php echo e($colaborador->login->apelido); ?></td>
                      <td><?php echo e($colaborador->login->email); ?></td>
                      <td><?php echo e($colaborador->filiacao->localizacao); ?></td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="/Admin/Filiacao/editar/<?php echo e($colaborador->id); ?>">
                          <i class="fa fa-paint-brush"> </i> Editar
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" data-catid=<?php echo e($colaborador->id); ?> data-toggle="modal" data-target="#deleteFiliacao">
                          <i class="fa fa-trash"> </i> Apagar
                        </button>              
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
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
                    <?php echo e(csrf_field()); ?>

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
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/colaboradores.blade.php ENDPATH**/ ?>