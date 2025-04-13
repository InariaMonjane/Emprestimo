<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link text-white">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p> 
            @if (Auth::user()->perfil->acesso === 'Gestor')
              Administrador
            @endif
            @if (Auth::user()->perfil->acesso === 'Operador')
              Colaborador
            @endif
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
            <a href="{{ route('entidade.index') }}" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Consultar Entidade</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('entidade.create') }}" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>Criar Entidade</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('simulador.index') }}" class="nav-link">
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
            <a href="{{ route('caixa.show') }}" class="nav-link">
                <i class="fa fa-th-large nav-icon"></i>
                <p>Caixa</p>
            </a>
        </li>
        @can('isAdmin')
        <li class="nav-item">
            <a href="{{ route('caixa.consulta') }}" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Consulta caixa</p>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('emprestimo.create2') }}" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>Criar Conta</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('emprestimo.contas') }}" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Consultar conta</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('emprestimo.mora') }}" class="nav-link text-white">
        <i class="nav-icon fa fa-user-secret"></i>
        <p> Clientes em mora</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('emprestimo.pagar') }}" class="nav-link text-white">
        <i class="nav-icon fa fa-user-secret"></i>
        <p> Clientes a Pagar</p>
    </a>
</li>
@can('isAdmin')
<li class="nav-item">
    <a href="{{ route('contabilidade') }}" class="nav-link text-white">
        <i class="nav-icon far fa-plus-square"></i>
        <p>Contabilidade</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('colaborador.index') }}" class="nav-link text-white">
        <i class="nav-icon fa fa-child"></i>
        <p>Funcionário</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('livroponto') }}" class="nav-link text-white">
        <i class="nav-icon fa fa-book"></i>
        <p>Livro Ponto</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('filiacao.index') }}" class="nav-link text-white">
        <i class="nav-icon fas fa-home"></i>
        <p>Sucursais</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('despesas') }}" class="nav-link text-white">
        <i class="nav-icon fa fa-book"></i>
        <p>Despesas</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('colaborador.changePassword.index') }}" class="nav-link text-white">
        <i class="nav-icon fas fa-key"></i>
        <p>Mudar senha</p>
    </a>
</li>