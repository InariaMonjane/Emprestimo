<!-- need to remove -->
<li class="nav-item">
    <a href="<?php echo e(route('home')); ?>" class="nav-link text-white">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p> 
            <?php if(Auth::user()->perfil->acesso === 'Gestor'): ?>
              Administrador
            <?php endif; ?>
            <?php if(Auth::user()->perfil->acesso === 'Operador'): ?>
              <?php echo e(Auth::user()->colaborador->filiacao->localizacao); ?>

            <?php endif; ?>
        </p>
    </a>
</li>        

<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon fas fa-university"></i>
        <p>
            Balcão
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="<?php echo e(route('entidade.index')); ?>" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Consultar Entidade</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('entidade.create')); ?>" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>Criar Entidade</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('emprestimo.create2')); ?>" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>Criar Conta</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('simulador.index')); ?>" class="nav-link">
                <i class="fa fa-desktop nav-icon"></i>
                <p>Simulador</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon far fa-dot-circle"></i>
        <p>
            Caixa
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="<?php echo e(route('emprestimo.index')); ?>" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Consultar Contas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('emprestimo.show2')); ?>" class="nav-link text-white">
                <i class="nav-icon fa fa-user-secret"></i>
                <p> Clientes a Pagar</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('filiacao.index')); ?>" class="nav-link text-white">
        <i class="nav-icon fas fa-home"></i>
        <p>Sucursais</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('colaborador.index')); ?>" class="nav-link text-white">
        <i class="nav-icon fa fa-child"></i>
        <p>Funcionário</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('livroponto')); ?>" class="nav-link text-white">
        <i class="nav-icon fa fa-book"></i>
        <p>Livro Ponto</p>
    </a>
</li>

<li class="nav-item">
    <a href="" class="nav-link text-white">
        <i class="nav-icon far fa-plus-square"></i>
        <p>Contabilidade</p>
    </a>
</li><?php /**PATH /media/cumbe/Multimedia/Di Maria/emprestimos/emprestimos/resources/views/layouts/menu.blade.php ENDPATH**/ ?>