

<?php $__env->startSection('content'); ?>
<div class="card rounded-0 container-fluid">
    <div class="card-footer row">
        <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Emprestimos</span></div>
        <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" itle="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 700px;">
                    <table class="table table-sm table-bordered table-hover table-head-fixed projects text-nowrap">
                        <thead>
                            <tr>
                                <th>Nome do cliente</th>
                                <th>Referencia</th>
                                <th>Valor solicitado</th>
                                <th>Data</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($conta->cliente->nome); ?> <?php echo e($conta->cliente->apelido); ?></td>
                                <td><?php echo e($conta->referencia); ?></td>
                                <td><?php echo e($conta->emprestimo); ?></td>
                                <td><?php echo e(date_format($conta->created_at,'d-M-Y')); ?></td>
                                <td class="text-center">
                                    <?php if($conta->candelete): ?>
                                    <a class="btn btn-danger btn-sm" href="/emprestimo/remove/<?php echo e($conta->id); ?>">
                                        Remover <i class="fa fa-trash"> </i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-danger font-weight-bold py-4">Hoje não temos pagamentos de prestações!</td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/emprestimo/contas.blade.php ENDPATH**/ ?>