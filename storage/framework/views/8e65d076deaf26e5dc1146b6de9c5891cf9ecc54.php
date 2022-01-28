

<?php $__env->startSection('content'); ?>

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold">Livro do Ponto</span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span><?php echo date('d-m-Y') ?></div>
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
                <form name="formPresenca" role="form" method="post" action="<?php echo e(route('livroponto.store')); ?>" >
                    <?php echo e(csrf_field()); ?>

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
                                        value="<?php echo e(config('app.empresa')); ?>"
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
                                        value="<?php echo e(Auth::user()->colaborador->filiacao->localizacao); ?>"
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
                                        value="<?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->apelido); ?>"
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
                                        value="<?php echo e(Auth::user()->id); ?>"
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
                                        value="<?php echo e((isset($presenca)) ? 'Saída':'Entrada'); ?>"
                                        disabled="disabled"
                                    >
                                    <input type="hidden" name="estado" value="<?php echo e((isset($presenca)) ? 'Saída':'Entrada'); ?>"> 
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
                                        value="<?php echo e(date('H:i')); ?>"
                                        disabled="disabled"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 mb-0">
                                <label for="inputObs">Obs...</label>
                                <textarea class="form-control <?php $__errorArgs = ['observacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="2" value="<?php echo e(old('observacao')); ?>" name="observacao"></textarea>
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
                    <!-- /.card-body -->
                    <div class="card-footer pb-1">
                        <div class="form-group">
                            <?php if(isset($presenca)): ?>
                                <button type="submit" class="btn btn-danger btn-block">
                                    Registar saída <i class="fa fa-sign-language" aria-hidden="true"></i>
                                </button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-block btnLogin text-white">
                                    Registar entrada <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/livroponto.blade.php ENDPATH**/ ?>