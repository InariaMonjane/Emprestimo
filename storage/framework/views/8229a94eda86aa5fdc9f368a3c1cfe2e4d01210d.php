<?php $__env->startSection('content'); ?>

  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Despesas</span></div>
      <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Nova <i class="fa fa-plus" aria-hidden="true"></i></h3>
          </div>
          <form action="<?php echo e(route('despesas.store')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12 mb-1">
                  <label for="inputDescricao">Descrição</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fa fa-credit-card"></i></span>
                    </div>
                    <input type="text" 
                          class="form-control form-control-sm <?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          id="inputDescricao" placeholder="Descrição" name="descricao" 
                          autocomplete="off"
                    >
                    <?php $__errorArgs = ['descricao'];
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
                <div class="form-group col-md-12 mb-1">
                  <label for="inputValor">Valor</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fa fa-percent"></i></span>
                    </div>
                    <input type="number"
                            class="form-control form-control-sm <?php $__errorArgs = ['valor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="inputValor" placeholder="Valor" 
                            name="valor" autocomplete="off"
                    >
                    <?php $__errorArgs = ['valor'];
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
            <div class="card-footer pb-1">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btnSimular">
                  Registar <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </div>
              <div class="form-group">
                <button type="reset" class="btn btn-danger btn-block" id="btnSimular">
                  Limpar <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="row">
          <div class="col-12 col-md-4 col-sm-6">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Selecione dia</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body ">
                <form role="form" method="post" action="<?php echo e(route('emprestimo.store')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="row">

                    <div class="form-group col-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fontIcons bg-dark">Dia</span>
                        </div>
                        <input type="date" class="form-control form-control-sm" id="inputPrimeiroDia" autocomplete="off">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row d-flex justify-content-around">
                    <div class="col-6">
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-dark btn-sm" id="btnConsultaDia">
                          Consultar
                        </button>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-0 text-right">
                        <button type="reset" class="btn btn-danger btn-sm">Limpar</button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8 col-sm-6">
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Selecione semena ou mes</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body ">
                <form role="form" method="post" action="<?php echo e(route('emprestimo.store')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="row">

                    <div class="form-group col-12 col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fontIcons bg-dark">Primeiro dia</span>
                        </div>
                        <input type="date" class="form-control form-control-sm" id="inputPrimeiroDia" autocomplete="off">
                      </div>
                    </div>

                    <div class="form-group col-12 col-md-6 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fontIcons bg-dark">Ultimo dia</span>
                        </div>
                        <input type="date" class="form-control form-control-sm" id="inputUltimoDia" autocomplete="off">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row d-flex justify-content-around">

                    <div class="col-6">
                      <div class="form-group mb-0">
                        <button type="reset" class="btn btn-danger btn-sm">Limpar <i class="fa fa-times" aria-hidden="true"></i></button>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-dark btn-sm" id="btnConsultaIntervalo">
                          Consultar <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-th-large" aria-hidden="true"></i> Lista das Despesas</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
              <thead>
                <tr>
                  <th>Operação</th>
                  <th>Descrição</th>
                  <th>Assinante</th>
                  <th>Valor</th>
                  <th>Data</th>
                </tr>
              </thead>
              <tbody id="TabelaContabilidade">
                <?php $__empty_1 = true; $__currentLoopData = $despesas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($item->id); ?></td>
                  <td><?php echo e($item->descricao); ?></td>
                  <td><?php echo e($item->user->nome); ?> <?php echo e($item->user->apelido); ?></td>
                  <td><?php echo e($item->valor); ?></td>
                  <td><?php echo e(explode(' ', $item->created_at)[0]); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center text-danger font-weight-bold py-4">Não temos despesas!</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Code2025/Emprestimo/resources/views/despesas/index.blade.php ENDPATH**/ ?>