

<?php $__env->startSection('content'); ?>

<div class="card rounded-0 container-fluid">
  <div class="card-footer row">
    <div class="col-6 col-md-7 text-right"><span class="font-weight-bold">Abertura de conta</span></div>
    <div class="col-6 col-md-5 text-right"><span class="font-weight-bold">Data : </span><?php echo e(date('d-m-Y')); ?></div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title"><i class="fa fa-desktop" aria-hidden="true"></i> Dados da conta</h3>
        </div>
        <form role="form" method="post" action="<?php echo e(route('emprestimo.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body pb-0">
            <div class="row">
              <div class="form-group col-6 col-md-3 mb-1">
                <label for="inputNumero">Nº. Cliente</label>
                <div class="input-group input-group-sm mb-0">
                  <?php if(isset($cliente)): ?>
                    <div class="input-group-append">
                      <button class="btn btn-danger" id="btnNumero"><i class="fas fa-info"></i></button>
                    </div>
                    <input class="form-control form-control-sm <?php $__errorArgs = ['cliente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      placeholder="Procurar cliente..."
                      type="number"
                      value="<?php echo e($cliente['id']); ?>"
                      autocomplete="off"
                      disabled>
                      <input type="hidden" name="cliente" value="<?php echo e($cliente['id']); ?>">
                  <?php else: ?>
                    <input class="form-control form-control-sm <?php $__errorArgs = ['cliente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      placeholder="Procurar cliente..."
                      type="number"
                      value="<?php echo e(old('cliente')); ?>"
                      autocomplete="off"
                      name="cliente">
                    <div class="input-group-append">
                      <button class="btn btn-dark" id="btnNumero"><i class="fas fa-search"></i></button>
                    </div>
                  <?php endif; ?>
                  <?php $__errorArgs = ['cliente'];
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
              <div class="form-group col-6 col-md-3 mb-1">
                <label for="inputReferencia">Ref. Nº</label>
                <div class="input-group input-group-sm mb-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-address-card"></i></span>
                  </div>
                  <?php if(isset($cliente)): ?>
                    <input class="form-control form-control-sm <?php $__errorArgs = ['referencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      placeholder="Nº referencia"
                      type="number"
                      value="<?php echo e($cliente->emprestimos()->get()->count()); ?>"
                      autocomplete="off"
                      id="inputReferencia"
                      disabled>
                      <input type="hidden" name="referencia" value="<?php echo e($cliente->emprestimos()->get()->count()); ?>">
                  <?php else: ?>
                    <input class="form-control form-control-sm <?php $__errorArgs = ['referencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      placeholder="Nº referencia"
                      type="number"
                      value="<?php echo e(old('referencia')); ?>"
                      autocomplete="off"
                      id="inputReferencia"
                      disabled>
                      <input type="hidden" name="referencia">
                  <?php endif; ?>
                  <?php $__errorArgs = ['referencia'];
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
                <label for="inputNome">BI</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-address-card"></i></span>
                  </div>
                  <input type="text" 
                    class="form-control form-control-sm <?php $__errorArgs = ['bi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    id="inputBi" 
                    placeholder="Número do BI" 
                    name="bi"
                    value="<?php echo e((isset($cliente)) ? $cliente['bi'] : old('bi')); ?>"
                    autocomplete="off"
                    disabled>
                  <?php $__errorArgs = ['bi'];
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
              <div class="form-group col-12 col-md-6 mb-1">
                <label for="inputNome">Nome</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text"
                    class="form-control form-control-sm <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    id="inputNome" placeholder="Nome" name="nome" value="<?php echo e((isset($cliente)) ? $cliente['nome'] : old('nome')); ?>"
                    autocomplete="off"
                    disabled>
                  <?php $__errorArgs = ['nome'];
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
                <label for="inputApelido">Apelido</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text"
                    class="form-control form-control-sm <?php $__errorArgs = ['apelido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    id="inputApelido" placeholder="Apelido" name="apelido"
                    value="<?php echo e((isset($cliente)) ? $cliente['apelido'] : old('apelido')); ?>" autocomplete="off"
                    disabled>
                  <?php $__errorArgs = ['apelido'];
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
              <div class="form-group col-12 col-md-4">
                <label for="inputEmprestimo">Valor solicitado</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm <?php $__errorArgs = ['emprestimo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inputForm"
                    id="inputEmprestimo" placeholder="Valor do Emprestimo" name="emprestimo"
                    value="<?php echo e(old('emprestimo')); ?>" autocomplete="off">
                  <?php $__errorArgs = ['emprestimo'];
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
              <div class="form-group col-12 col-md-4">
                <label for="inputPrestacoes">Nº Prestações</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark"><i class="fa fa-plus"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm <?php $__errorArgs = ['prestacoes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inputForm"
                    id="inputPrestacoes" placeholder="Número de Prestações" name="prestacoes"
                    value="<?php echo e(old('prestacoes')); ?>" autocomplete="off">
                  <?php $__errorArgs = ['prestacoes'];
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
              <div class="form-group col-12 col-md-2">
                <label for="inputTaxa">Taxa</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark"><i class="fa fa-percent"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm <?php $__errorArgs = ['taxa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inputForm"
                    id="inputTaxa" placeholder="Taxa" name="taxa" value="<?php echo e(old('taxa')); ?>"
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
              <div class="form-group col-12 col-md-2">
                <label for="inputDias">Dias</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark"><i class="fa fa-calendar-check"></i></span>
                  </div>
                  <input type="number"
                    class="form-control form-control-sm <?php $__errorArgs = ['dias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inputForm"
                    id="inputDias" placeholder="Dias" name="dias" value="<?php echo e(old('dias')); ?>"
                    autocomplete="off">
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
            </div>
            <div class="row">
              <div class="col-12 col-md-6 input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white font-weight-bold">Quantidade das Garantias</span>
                  </div>
                <input type="number" class="form-control form-control-sm"
                      placeholder="" name="inputGarantias"
                      autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-dark" id="btnGarantias" type="button">Criar tabela</button>
                </div>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 300px;">
              <table class="table table-sm table-hover table-head-fixed projects text-nowrap">
                <tbody id="tableGarantias" class="table-bordered"></tbody>
              </table>            
            </div>
            <div class="table-responsive" style="max-height: 300px;">
              <table class="table table-sm table-hover table-head-fixed projects text-nowrap">
                <thead>
                  <tr>
                    <th style="width: 14%">Capital</th>
                    <th style="width: 10%">Taxa</th>
                    <th style="width: 14%">Juros</th>
                    <th style="width: 10%">Capital</th>
                    <th style="width: 14%">1ª opção</th>
                    <th style="width: 14%">2ª opção</th>
                    <th style="width: 14%" class="">Data</th>
                  </tr>
                </thead>
                <tbody id="linhas" class="table-bordered"></tbody>
              </table>            
            </div>
          </div>
          <div class="card-footer">
            <div class="row d-flex justify-content-around">
              <div class="col-4">
                <div class="form-group mb-0">
                  <button type="submit" class="btn btn-success" id="btnLogin">
                    Registar <i class="fa fa-save" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group mb-0 text-center">
                <button type="button" class="btn btn-primary">Imprimir <i class="fa fa-print" aria-hidden="true"></i></button>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group mb-0 text-right">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/emprestimo/create.blade.php ENDPATH**/ ?>