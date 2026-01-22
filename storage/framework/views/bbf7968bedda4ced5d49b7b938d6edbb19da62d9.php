<!-- need to remove -->
<li class="nav-item">
    <a href="<?php echo e(route('home')); ?>" class="nav-link text-white">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p> 
            <?php if(Auth::user()->perfil->acesso === 'Gestor'): ?>
              Administrador
            <?php endif; ?>
            <?php if(Auth::user()->perfil->acesso === 'Operador'): ?>
              Colaborador
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
            <a href="<?php echo e(route('caixa.show')); ?>" class="nav-link">
                <i class="fa fa-th-large nav-icon"></i>
                <p>Caixa</p>
            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('caixa.consulta')); ?>" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Consulta caixa</p>
            </a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <a href="<?php echo e(route('emprestimo.create2')); ?>" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>Criar Conta</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('emprestimo.contas')); ?>" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Consultar conta</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('emprestimo.mora')); ?>" class="nav-link text-white">
        <i class="nav-icon fa fa-user-secret"></i>
        <p> Clientes em mora</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('emprestimo.pagar')); ?>" class="nav-link text-white">
        <i class="nav-icon fa fa-user-secret"></i>
        <p> Clientes a Pagar</p>
    </a>
</li>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
<li class="nav-item">
    <a href="<?php echo e(route('contabilidade')); ?>" class="nav-link text-white">
        <i class="nav-icon far fa-plus-square"></i>
        <p>Contabilidade</p>
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
    <a href="<?php echo e(route('filiacao.index')); ?>" class="nav-link text-white">
        <i class="nav-icon fas fa-home"></i>
        <p>Sucursais</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('despesas')); ?>" class="nav-link text-white">
        <i class="nav-icon fa fa-book"></i>
        <p>Despesas</p>
    </a>
</li>
<?php endif; ?>
<li class="nav-item">
    <a href="<?php echo e(route('colaborador.changePassword.index')); ?>" class="nav-link text-white">
        <i class="nav-icon fas fa-key"></i>
        <p>Mudar senha</p>
    </a>
</li><?php /**PATH /Users/apple/Documents/Code2025/Emprestimo/resources/views/layouts/menu.blade.php ENDPATH**/ ?>