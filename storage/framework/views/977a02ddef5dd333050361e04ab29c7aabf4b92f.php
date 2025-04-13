

<?php $__env->startSection('content'); ?>
  
  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Consulta caixa</span></div>
      <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row px-2">
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
                    <button type="submit" class="btn btn-dark" id="btnConsultaDia">
                      Consultar <i class="fa fa-search" aria-hidden="true"></i>
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
                    <button type="reset" class="btn btn-danger">Limpar <i class="fa fa-times" aria-hidden="true"></i></button>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-dark btn-block" id="btnConsultaIntervalo">
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
    <div class="row px-2">
      <div class="col-md-4 col-sm-6 col-12">
        <a href="" class="a-info-box">
          <div class="info-box text-dark">
            <span class="info-box-icon  elevation-1"><i class="far fa-dot-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Nº de transações : <span class="font-weight-bold"><?php echo e(count($contas)); ?></span></span>
            </div>
          </div>
        </a>  
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <a href="" class="a-info-box">  
          <div class="info-box text-dark">
            <span class="info-box-icon  elevation-1"><i class="far fa-dot-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total multa</span>
              <span class="info-box-number"><?php echo e(collect($contas)->sum('vMulta')); ?>,00MT</span>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <a href="" class="a-info-box">
          <div class="info-box text-dark">
            <span class="info-box-icon  elevation-1"><i class="far fa-dot-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total em caixa</span>
              <span class="info-box-number"><?php echo e(collect($contas)->sum('opcao1')); ?>,00MT</span>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0" style="max-height: 300px;">
            <table id="exemple" class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Nº.Conta</th>
                  <th>Nome</th>
                  <th>Ref</th>
                  <th>Ref.Presta</th>
                  <th>Debito</th>
                  <th>Multa</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($conta->dataPagamento); ?></td>
                  <td class="text-center"><?php echo e($conta->emprestimo_id); ?></td>
                  <td><?php echo e($conta->emprestimo->cliente->nome); ?> <?php echo e($conta->emprestimo->cliente->apelido); ?></td>
                  <td class="text-center"><?php echo e($conta->emprestimo->referencia); ?></td>
                  <td class="text-center"><?php echo e($conta->numero); ?></td>
                  <td><?php echo e($conta->opcao1); ?></td>
                  <td><?php echo e($conta->vMulta); ?></td>
                  <td><?php echo e($conta->user->nome); ?> <?php echo e($conta->user->apelido); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="8" class="text-center text-danger font-weight-bold py-4">Não temos nada no caixa!</td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\emprestimos\resources\views/caixa/consulta.blade.php ENDPATH**/ ?>