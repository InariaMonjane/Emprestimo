<?php $__env->startSection('content'); ?>
  <section class="content">
    <div class="container pt-3">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Entidades</span>
                <span class="info-box-number">Total: <?php echo e($entidades); ?></span>
              </div>
            </div>
          </a>  
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-user-secret"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Contas</span>
                <span class="info-box-number">Total: <?php echo e($contas); ?></span>
              </div>
            </div>
          </a>  
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">  
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-child"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Funcionarios</span>
                <span class="info-box-number">Total: <?php echo e($users); ?></span>
              </div>
            </div>
          </a>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="far fa-dot-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number"><?php echo e(Auth::user()->colaborador->filiacao->saldo); ?>,00MT</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12 col-12">
          <div class="card mb-1">
            <div class="card-header menu_bg">
              <h3 class="card-title font-weight-bold">Clientes</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartClientes" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>        
        <div class="col-md-6 col-sm-12 col-12">
          <div class="card mb-1">
            <div class="card-header menu_bg">
              <h3 class="card-title font-weight-bold">Emprestimos</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartEmprestimos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row py-2">
        <div class="col-12">
          <div class="card mb-1">
            <div class="card-header menu_bg">
              <h3 class="card-title font-weight-bold">Despesas</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartDespesas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\emprestimos\resources\views/home.blade.php ENDPATH**/ ?>