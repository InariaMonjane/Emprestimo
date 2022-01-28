<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Costum CSS-->
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">

        @yield('third_party_stylesheets')

        @stack('page_css')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <span class="d-none d-md-inline">{{ Auth::user()->nome }} {{ Auth::user()->apelido }}</span>
                            <img src="{{ asset('img/user.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset('img/user.png') }}"
                                    class="img-circle elevation-2"
                                    alt="User Image">
                                <p>
                                    {{ Auth::user()->nome }} {{ Auth::user()->apelido }}
                                    <small>Membro desde {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content px-0">
                    @yield('content')
                </section>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer text-center">
                <p class="mb-0"><b>&copy; Financial System - @php echo date('Y') @endphp</b></p>
                <p class="mb-0">Todos os direitos reservados</p>
            </footer>
        </div>

        <script src="{{ mix('js/app.js') }}" defer></script>

        @yield('third_party_scripts')

        @stack('page_scripts')
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery.form.min.js') }}"></script>
        <script src="{{ asset('js/modelspop.js') }}"></script>
        <script>
            $(function(){
                $('form[name="formSimulador"]').submit(function(event){
                    event.preventDefault();
                    let tabela;
                    $.ajax({
                        url: "{{ route('simulador.start') }}",
                        type: "post",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response){
                            response.emprestimo.forEach(function(prestacao){
                                tabela += `<tr>
                                            <td>${prestacao.capital}</td>
                                            <td>${prestacao.taxa}</td>
                                            <td>${prestacao.juros}</td>
                                            <td>${prestacao.AmCapital}</td>
                                            <td>${prestacao.valorPrestacao}</td>
                                            <td>${response.valorPagar}</td>
                                            <td>${prestacao.dataPrevista}</td>
                                        </tr>`;
                            });
                            tabela += `<tr class="table-info">
                                            <th colspan="2" class="text-center">---</th>
                                            <th>${response.totalJuros}</th>
                                            <th>${response.totalCapital}</th>
                                            <th colspan="2" class="text-center">${response.totalPagar}</th>
                                            <th class="text-center">---</th>
                                        </tr>`;
                            $('#linhas').html(tabela);
                        }
                    });
                });
            }); 
            //Simulador
            $(function(){
                $('.inputForm').blur(function(event){
                    //alert("Ola")
                    let emprestimo = $('input[name="emprestimo"]').val();
                    let prestacoes = $('input[name="prestacoes"]').val();
                    let taxa = $('input[name="taxa"]').val();
                    let dias = $('input[name="dias"]').val();
                    let _token = $('input[name="_token"]').val();
                    if(emprestimo != '' && prestacoes != '' && taxa != '' && dias != ''){
                        let tabela;
                        $.ajax({
                            url: "{{ route('simulador.start') }}",
                            type: "post",
                            data: {emprestimo:emprestimo, prestacoes:prestacoes, taxa:taxa, dias:dias, _token:_token},
                            dataType: 'json',
                            success: function(response){
                                response.emprestimo.forEach(function(prestacao){
                                    tabela += `<tr>
                                                <td>${prestacao.capital}</td>
                                                <td>${prestacao.taxa}</td>
                                                <td>${prestacao.juros}</td>
                                                <td>${prestacao.AmCapital}</td>
                                                <td>${prestacao.valorPrestacao}</td>
                                                <td>${response.valorPagar}</td>
                                                <td>${prestacao.dataPrevista}</td>
                                            </tr>`;
                                });
                                tabela += `<tr class="table-info">
                                                <th colspan="2" class="text-center">---</th>
                                                <th>${response.totalJuros}</th>
                                                <th>${response.totalCapital}</th>
                                                <th colspan="2" class="text-center">${response.totalPagar}</th>
                                                <th class="text-center">---</th>
                                            </tr>`;
                                $('#linhas').html(tabela);
                            }
                        });
                    }else{
                        $('#linhas').html("");
                    }
                });
            });
            $(function(){
                $('#btnNumero').click(function(event){
                    event.preventDefault();
                    let cliente = $('input[name="cliente"]').val();
                    let _token = $('input[name="_token"]').val();
                    if(cliente != ''){
                        $.ajax({
                            url: "{{ route('simulador.getDataClient') }}",
                            type: "post",
                            data: {cliente:cliente, _token:_token},
                            dataType: 'json',
                            success: function(response){
                                $('#inputReferencia').val(response.message.referencia);
                                $('#inputBi').val(response.message.bi);
                                $('#inputNome').val(response.message.nome);
                                $('#inputApelido').val(response.message.apelido);
                            }
                        });
                    }
                });
                //Carregar dados da conta a pagar
                $('#btnNumeroConta').click(function(event){
                    event.preventDefault();
                    let conta = $('input[name="conta"]').val();
                    let taxa = $('input[name="taxa"]').val();
                    let _token = $('input[name="_token"]').val();
                    
                    if(conta != '' && taxa != ''){
                        let tabela;
                        let submenter;
                        $.ajax({
                            url: "{{ route('emprestimo.getDataEmprestimo') }}",
                            type: "post",
                            data: {conta:conta, taxa:taxa, _token:_token},
                            dataType: 'json',
                            success: function(response){
                                if(response.success){
                                    $('#numeroCliente').html(response.message.cliente.numero);
                                    $('#nomeCompleto').html(response.message.cliente.nome);
                                    $('#celular').html(response.message.cliente.telefone);
                                    $('#nomeReferencia').html(response.message.cliente.referencia);

                                    $('#inputVPagar').val(response.message.prestacao.vPagar);
                                    $('#inputTotalPagar').val(response.message.prestacao.vTPagar);
                                    $('#inputValorCapital').val(response.message.prestacao.vCapital);
                                    $('#inputValorPrestacao').val(response.message.prestacao.vPrestacao);
                                    $('#inputSaldoAnterior').val(response.message.prestacao.saldoAnterior);
                                    $('#inputSaldoActual').val(response.message.prestacao.saldoActual);

                                    if (response.estado) {
                                        $('#inputPrestacao').val(response.message.prestacao.numero);
                                        $('#inputDias').val(response.message.prestacao.atraso);
                                        $('#inputMulta').val(response.message.prestacao.multa);

                                        $('#submeter').empty();
                                        $('#submeter').prepend(`<button class="btn btn-success btn-sm btn-block text-white" data-cat_prestacaoid=${response.message.prestacao.id} data-cat_prestacaovalor=${response.message.prestacao.vPrestacao} data-cat_prestacaonumero=${response.message.prestacao.numero} data-toggle="modal" data-target="#pagarPrestacao"><i class="far fa-dot-circle" aria-hidden="true"></i> Pagar valor da prestação</button>`);    
                                        response.message.prestacoes.forEach(function(prestacao){
                                            if (prestacao.numero == response.message.prestacao.numero){
                                            tabela += `<tr class="table-active">
                                                        <td class="">${prestacao.numero}</td>
                                                        <td class="">${prestacao.opcao1} MT</td>
                                                        <td class="">${prestacao.dataPrevista}</td>
                                                        <td class="px-2 text-danger">${prestacao.estado}</td>
                                                    </tr>`;
                                            }else{
                                                if(prestacao.dataPagamento != null){
                                                    tabela += `<tr class="">
                                                            <td class="">${prestacao.numero}</td>
                                                            <td class="">${prestacao.opcao1} MT</td>
                                                            <td class="">${prestacao.dataPagamento}</td>
                                                            <td class="px-2 text-success">${prestacao.estado}</td>
                                                        </tr>`;
                                                }else{
                                                    tabela += `<tr class="">
                                                            <td class="">${prestacao.numero}</td>
                                                            <td class="">${prestacao.opcao1} MT</td>
                                                            <td class="">${prestacao.dataPrevista}</td>
                                                            <td class="px-2 text-danger">${prestacao.estado}</td>
                                                        </tr>`;
                                                }
                                            }
                                        });
                                    }else{
                                        response.message.prestacoes.forEach(function(prestacao){
                                            tabela += `<tr class="">
                                                        <td class="">${prestacao.numero}</td>
                                                        <td class="">${prestacao.opcao1} MT</td>
                                                        <td class="">${prestacao.dataPrevista}</td>
                                                        <td class="px-2 text-success">${prestacao.estado}</td>
                                                    </tr>`;
                                        });
                                    }
                                    
                                    $('#linhas').html(tabela);    
                                }else{
                                   $('#messageBox').removeClass('d-none');
                                   $('#messageText').html(response.message);
                                }
                            }
                        });
                    }
                });
            });  
        </script>
    </body>
</html>