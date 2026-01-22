  <?php $__env->startSection('title','colaborador'); ?>

  <?php $__env->startSection('content'); ?>

    <div class="card rounded-0 container-fluid">
      <div class="card-footer row">
        <div class="col-7 text-md-right"><span class="font-weight-normal">senha é uma chava privada, não partilhe!</span></div>
        <div class="col-5 text-right d-flex justify-content-end"><span class="font-weight-bold d-none d-md-block pr-1">Data : </span> <span><?php echo e(date('d-m-Y')); ?></span></div>
      </div>
    </div>

    <!-- Mudar senha  -->
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <!-- Profile Image -->
          <div class="card card-primary rounded-0 shadow-none colaboradorInfo">
            <div class="card-body">
              <ul class="list-group list-group-unbordered">
                <li class="list-user-header mb-4">
                  <img src="<?php echo e(asset('img/user.png')); ?>" class="img-circle elevation-1" alt="User Image">
                </li>
                <li class="list-group-item">
                  <b>Nome completo</b> <span class="float-right"><?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->apelido); ?></span>
                </li>
                <li class="list-group-item">
                  <b>E-mail</b> <span class="float-right"><?php echo e(Auth::user()->email); ?></span>
                </li>
                <li class="list-group-item">
                  <b>Empresa</b> <span class="float-right"><?php echo e(config('app.empresa')); ?></span>
                </li>
                <li class="list-group-item">
                  <b>Sucursal</b> <span class="float-right"><?php echo e(Auth::user()->colaborador->filiacao->localizacao); ?></span>
                </li>
                <li class="list-group-item">
                  <b>Código</b> <span class="float-right"><?php echo e(Auth::user()->id); ?></span>
                </li>
                <li class="list-user-header">
                  <button type="submit" class="btn btn-dark btn-block" id="btnConsultaIntervalo">
                    Editar dados <i class="fa fa-user" aria-hidden="true"></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 ">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-key" aria-hidden="true"></i> <b>Mudar senha</b></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body pb-0">
              <form action="<?php echo e(route('colaborador.password.update')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 
                
                <div class="form-group mb-2">
                  <!--label for="id_senha" class="form-control-sm mb-0">Palavra-Passe</label-->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text bg-dark">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                      </div>
                    </div>
                    <input type="password" class="form-control form-control-sm <?php $__errorArgs = ['senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_senha" name="senha" placeholder="senha atual">
                    <div class="input-group-prepend">
                      <div class="input-group-text bg-white">
                        <i class="fa fa-eye" id="ver" aria-hidden="true"></i>
                      </div>
                    </div>
                    <?php $__errorArgs = ['senha'];
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
                
                <div class="form-group mb-2">
                  <!--label for="id_senha" class="form-control-sm mb-0">Palavra-Passe</label-->
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-dark">
                          <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control form-control-sm <?php $__errorArgs = ['nova_senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_senha" name="nova_senha" placeholder="nova senha">
                    <div class="input-group-prepend">
                      <div class="input-group-text bg-white">
                        <i class="fa fa-eye" id="ver" aria-hidden="true"></i>
                      </div>
                    </div>
                    <?php $__errorArgs = ['nova_senha'];
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
                
                <div class="form-group mb-2">
                  <!--label for="id_senha" class="form-control-sm mb-0">Palavra-Passe</label-->
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-dark">
                          <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control form-control-sm <?php $__errorArgs = ['confirmar_nova_senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_senha" name="confirmar_nova_senha" placeholder="confirmar nova senha">
                    <div class="input-group-prepend">
                      <div class="input-group-text bg-white">
                        <i class="fa fa-eye" id="ver" aria-hidden="true"></i>
                      </div>
                    </div>
                    <?php $__errorArgs = ['confirmar_nova_senha'];
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
                
                <div class="form-group btn-container mt-0">
                  <button class="btn btn-dark btn-block text-white">Actualizar <i class="fa fa-key"></i></button>
                </div>
              </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Code2025/Emprestimo/resources/views/changePassword.blade.php ENDPATH**/ ?>