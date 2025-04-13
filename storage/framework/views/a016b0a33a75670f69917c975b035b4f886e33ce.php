

<?php $__env->startSection('content'); ?>

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-7 text-right"><span class="font-weight-bold">Livro do Ponto</span></div>
      <div class="col-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Consultar Livro do Ponto</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0" style="max-height: 300px;">
            <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Data</th>
                  <th>Hora</th>
                  <th>Situação</th>
                  <th>Observação</th>
                  <th>Empresa</th>
                  <th>Sucursal</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $presencas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e(explode(' ', $item->created_at)[0]); ?></td>
                    <td><?php echo e(explode(' ', $item->created_at)[1]); ?></td>
                    <td><?php echo e($item->estado); ?></td>
                    <td><?php echo e($item->observacao); ?></td>
                    <td><?php echo e(config('app.empresa')); ?></td>
                    <td><?php echo e(Auth::user()->colaborador->filiacao->localizacao); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo e(isset($presenca) ? 'Registar saída' : 'Registar entrada'); ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form name="formPresenca" role="form" method="post" action="<?php echo e(route('livroponto.store')); ?>" >
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body p-0">
                            <div class="row">
                                <div class="form-group col-12 col-md-6 mb-1">
                                    <label for="inputEmpresa">Empresa</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i class="fas fa-university"></i></span>
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
                                            <span class="input-group-text bg-dark"><i class="fa fa-home"></i></span>
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
                                            <span class="input-group-text bg-dark"><i class="fa fa-user"></i></span>
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
                                            <span class="input-group-text bg-dark"><i class="fa fa-hashtag"></i></span>
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
                                    <label for="inputEstado">Situação</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i class="fa fa-street-view" aria-hidden="true"></i></span>
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
                                            <span class="input-group-text bg-dark"><i class="fa fa-clock-o"></i></span>
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
                                <div class="form-group col-md-12">
                                    <label for="inputObs">Observação</label>
                                    <textarea class="form-control" rows="2" value="<?php echo e(old('observacao')); ?>" name="observacao"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php if(isset($presenca)): ?>
                                            <button type="submit" class="btn btn-warning">
                                                Sair<i class="fa fa-sign-language" aria-hidden="true"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-block bg-dark">
                                                Entrar <i class="fa fa-hand-o-up" aria-hidden="true"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="form-group">
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
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\emprestimos\resources\views/livroponto.blade.php ENDPATH**/ ?>