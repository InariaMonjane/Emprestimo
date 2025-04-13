

<?php $__env->startSection('content'); ?>
  
  <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Contabilidade</span></div>
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
                  <th>Nº operação</th>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Debito +</th>
                  <th>Crédito -</th>
                  <th>Saldo =</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#</td>
                  <td><?php echo e(date('Y-m-d')); ?></td>
                  <td>Saldos iniciais</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <?php $__currentLoopData = $registos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item->id); ?></td>
                  <td><?php echo e(explode(' ', $item->created_at)[0]); ?></td>
                  <td><?php echo e($item->descricao); ?></td>
                  <td><?php echo e($item->debito); ?></td>
                  <td><?php echo e($item->credito); ?></td>
                  <td><?php echo e($item->saldo); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/contabilidade/index.blade.php ENDPATH**/ ?>