

<?php $__env->startSection('content'); ?>

 <div class="card rounded-0 container-fluid">
    <div class="card-footer row">
      <div class="col-6 text-right"><span class="font-weight-bold">Caixa</span></div>
      <div class="col-6 text-right"><span class="font-weight-bold">Data : </span><?php echo date('d-m-Y') ?></div>
    </div>
    <!--div class="row">
        <div class="col-12 text-center">
            <p class="font-weight-bold py-2 m-0">Atenção!!! Existe <span class="text-danger">MULTA</span> por pagar!!!</p>
        </div>
    </div-->     
  </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Dados da conta</h3>
                </div>
                
                <?php if(Session::has('DBSuccess')): ?>
                <div class="alert alert-success mt-2 mx-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="m-0 text-center"><?php echo e(Session::get('DBSuccess')); ?></p>
                </div>
                <?php endif; ?>
                <div class="alert alert-danger mb-1 py-1 px-1 font-weight-light text-black d-none" id="messageBox">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <span id="messageText"></span>
                </div>
                <form role="form">
                    <?php echo csrf_field(); ?>
                    <div class="card-body pt-3">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputNumeroConta">Nº. Conta</label>
                                <div class="input-group input-group-sm mb-0">
                                    <?php if(isset($emprestimo)): ?>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btnLogin text-white"><i class="fas fa-info"></i></span>
                                        </div>
                                        <input type="hidden" name="conta" value="<?php echo e($emprestimo->id); ?>">
                                        <input class="form-control form-control-sm <?php $__errorArgs = ['conta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="number"
                                            value="<?php echo e($emprestimo->id); ?>"
                                            disabled="disabled">
                                    <?php else: ?>
                                        <input class="form-control form-control-sm <?php $__errorArgs = ['conta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Procurar conta..."
                                            type="number"
                                            value="<?php echo e(old('conta')); ?>"
                                            autocomplete="off"
                                            name="conta">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" id="btnNumeroConta"><i class="fas fa-search"></i></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['conta'];
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
                            <div class="form-group col-12 col-md-6 mb-1">
                                <label for="inputTaxa">Taxa de Juro da Multa</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm <?php $__errorArgs = ['taxa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="inputTaxa" placeholder="Taxa de Juro da Multa" name="taxa" value=""
                                        autocomplete="off">
                                    <?php $__errorArgs = ['taxa'];
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
                            <div class="form-group col-12 col-md-3">
                                <label for="inputPrestacao">Nº Prestação</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm <?php $__errorArgs = ['prestacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="inputPrestacao"
                                        value="<?php echo e((isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->numero : ''); ?>" autocomplete="off" disabled="disabled">
                                    <?php $__errorArgs = ['prestacao'];
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
                            <div class="form-group col-12 col-md-3">
                                <label for="inputDias">Dias de Atraso</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fa fa-calendar-check"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm <?php $__errorArgs = ['dias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="inputDias" name="dias" value="<?php echo e((isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->atraso : ''); ?>"
                                        autocomplete="off" disabled="disabled">
                                    <?php $__errorArgs = ['dias'];
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
                            <div class="form-group col-12 col-md-3">
                                <label for="inputMulta">Multa. Dia</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm <?php $__errorArgs = ['multa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="inputMulta" name="multa"
                                        value="<?php echo e((isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->multa : ''); ?>" autocomplete="off" disabled="disabled">
                                    <?php $__errorArgs = ['multa'];
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
                            <div class="form-group col-12 col-md-3">
                                <label for="inputVPagar">Valor a pagar</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btnLogin text-white"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number"
                                        class="form-control form-control-sm <?php $__errorArgs = ['vPagar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="inputVPagar" name="vPagar"
                                        value="" autocomplete="off" disabled="disabled">
                                    <?php $__errorArgs = ['vPagar'];
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
                        <div class="row">
                            <div class="col-12 col-md-1">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('img/user.png')); ?>" alt="User profile picture">
                                </div>
                            </div>
                            <div class="col-12 col-md-11">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item pb-1 border-top-0">
                                        <b>Nome do cliente : </b> <span id="nomeCompleto"><?php echo e((isset($emprestimo)) ? $emprestimo->cliente->nome : ''); ?> <?php echo e((isset($emprestimo)) ? $emprestimo->cliente->apelido : ''); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item pb-1 border-top-0">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <b>Nº Cliente : </b> <span id="numeroCliente"><?php echo e((isset($emprestimo)) ? $emprestimo->id : ''); ?></span>
                                            </div>
                                            <div class="col-12 col-md-4 text-md-center">
                                                <b>Nº. Referencia : </b> <span id="nomeReferencia"><?php echo e((isset($emprestimo)) ? $emprestimo->id : ''); ?></span>
                                            </div>
                                            <div class="col-12 col-md-4 text-md-right">
                                                <b>Celular : </b> <span id="celular"><?php echo e((isset($emprestimo)) ? $emprestimo->cliente->telefone1 : ''); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-dollar-sign" aria-hidden="true"></i> Saldo da conta</h3>
                </div>
                <div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor Total a pagar</span>
                                    </div>
                                    <input type="text" id="inputTotalPagar" class="font-weight-bold  form-control form-control-sm text-right" value="<?php echo e((isset($emprestimo)) ? $emprestimo->total + $emprestimo->emprestimo : ''); ?>" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor do capital</span>
                                    </div>
                                    <input type="text" id="inputValorCapital" class="font-weight-bold  form-control form-control-sm text-right" value="<?php echo e((isset($emprestimo)) ? $emprestimo->emprestimo : ''); ?>" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor da prestação</span>
                                    </div>    
                                    <input type="text" id="inputValorPrestacao" class="font-weight-bold  form-control form-control-sm text-right" value="<?php echo e((isset($emprestimo) && $emprestimo->actual != null) ? $emprestimo->Actual->opcao1 : ''); ?>" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Saldo anterior</span>
                                    </div>    
                                    <input type="text" id="inputSaldoAnterior" class="font-weight-bold  form-control form-control-sm text-right" value="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Saldo actual</span>
                                    </div>    
                                    <input type="text" id="inputSaldoActual" class="font-weight-bold form-control form-control-sm text-right" value="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-0" id="submeter">
                                <?php if(isset($emprestimo) && $emprestimo->actual != null): ?>
                                    <button class="btn btn-success btn-sm btn-block text-white" data-cat_prestacaoid=<?php echo e((isset($emprestimo)) ? $emprestimo->Actual->id : ''); ?> data-cat_prestacaovalor=<?php echo e((isset($emprestimo)) ? $emprestimo->Actual->opcao1 : ''); ?> data-cat_prestacaonumero=<?php echo e((isset($emprestimo)) ? $emprestimo->Actual->numero : ''); ?> data-toggle="modal" data-target="#pagarPrestacao"><i class="far fa-dot-circle" aria-hidden="true"></i> Pagar valor da prestação</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-th-large" aria-hidden="true"></i> Tabela de prestações</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-bordered table-head-fixed projects text-nowrap text-center">
                        <thead>
                            <tr>
                              <th>Nº Prestação</th>
                              <th>Valor da Prestação</th>
                              <th>Data do pagamento</th>
                              <th class="pr-2">Situação</th>
                            </tr>
                        </thead>
                        <tbody id="linhas">
                            <?php if(isset($prestacoes)): ?>
                                <?php $__currentLoopData = $prestacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($emprestimo->actual != null): ?>
                                        <?php if($prestacao->numero == $emprestimo->actual->numero): ?>
                                            <tr class="table-active">
                                                <td class=""><?php echo e($prestacao->numero); ?></td>
                                                <td class=""><?php echo e($prestacao->opcao1); ?> MT</td>
                                                <td class=""><?php echo e($prestacao->dataPrevista); ?></td>
                                                <td class="px-2 text-danger"><?php echo e($prestacao->estado); ?></td>
                                            </tr>
                                        <?php else: ?>
                                            <tr class="">
                                                <td class=""><?php echo e($prestacao->numero); ?></td>
                                                <td class=""><?php echo e($prestacao->opcao1); ?> MT</td>
                                                <?php if($prestacao->dataPagamento != null): ?>
                                                <td class=""><?php echo e($prestacao->dataPagamento); ?></td>
                                                <td class="px-2 text-success"><?php echo e($prestacao->estado); ?></td>
                                                <?php else: ?>
                                                <td class=""><?php echo e($prestacao->dataPrevista); ?></td>
                                                <td class="px-2 text-danger"><?php echo e($prestacao->estado); ?></td>
                                                <?php endif; ?>
                                            </tr> 
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <tr class="">
                                        <td class=""><?php echo e($prestacao->numero); ?></td>
                                        <td class=""><?php echo e($prestacao->opcao1); ?> MT</td>
                                        <td class=""><?php echo e($prestacao->dataPagamento); ?></td>
                                        <td class="px-2 text-success"><?php echo e($prestacao->estado); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="pagarPrestacao">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h6 class="modal-title text-center">Desejas realmente confirmar o pagamento?</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('prestacao.pay')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                                <p>Clique em confirmar, se e somente se, realmente recebeu do cliente o valor de <span id="valor"></span>,00MT referente ao pagamento da <span id="numero"></span>ª prestação!</p>
                                <input type="hidden" name="prestacao_id" id="prestacao_id" value="">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-success btn-outline-light">Confirmar</button>
                                <button type="button" class="btn btn-danger btn-outline-light" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/emprestimo/conta.blade.php ENDPATH**/ ?>