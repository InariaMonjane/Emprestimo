<?php $__env->startSection('content'); ?>
<div class="card rounded-0 container-fluid">
    <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Simular Emprestimo</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Simulador</h3>
                </div>
                <form name="formSimulador">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-12 mb-1">
                                <label for="inputEmprestimo">Valor do Emprestimo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm"
                                        id="inputEmprestimo" placeholder="Valor do Emprestimo" name="emprestimo" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-1">
                                <label for="inputPrestacoes">Nº Prestações</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm"
                                        id="inputPrestacoes" placeholder="Número de Prestações" name="prestacoes" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-1">
                                <label for="inputTaxa">Taxa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm" id="inputTaxa" placeholder="Taxa" name="taxa" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-0">
                                <label for="inputDias">Dias</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control form-control-sm" id="inputDias" placeholder="Dias" name="dias" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pb-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btnLogin" id="btnSimular">
                                Simular <i class="fa fa-spinner" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-th-large" aria-hidden="true"></i> Resultados</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
                        <thead>
                            <tr>
                              <th style="width: 20%" colspan="2"></th>
                              <th style="width: 40%" colspan="2" class="text-center">Amortização</th>
                              <th style="width: 20%" class="text-center">Valor a pagar</th>
                              <th style="width: 20%" colspan="2"></th>
                            </tr>
                            <tr>
                              <th style="width: 14%">Capital</th>
                              <th style="width: 10%">Taxa</th>
                              <th style="width: 14%">de Juros</th>
                              <th style="width: 10%">do Capital</th>
                              <th style="width: 20%">Valor a pagar</th>
                              <!-- CÓDIGO ANTIGO COMENTADO PARA USO FUTURO -->
                              <!-- <th style="width: 14%">1ª opção</th> -->
                              <!-- <th style="width: 14%">2ª opção</th> -->
                              <th style="width: 14%" class="text-center">Pagamento</th>
                            </tr>
                        </thead>
                        <tbody id="linhas">
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Code2025/Emprestimo/resources/views/balcao/simulador/simulador.blade.php ENDPATH**/ ?>