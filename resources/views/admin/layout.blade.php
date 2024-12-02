<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel Multiplicador')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link para o estilo geral -->
    @stack('styles') <!-- Para adicionar estilos específicos nas views -->
</head>
<body>
    <header>

            <div class="nav-left">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo"> <!-- Substitua pelo caminho correto da logo -->
            </div>
            <div class="nav-center">
                <h1>Bem-vindo, {{ auth()->user()->nome ?? 'Multiplicador' }}!</h1> <!-- Exibe o nome do usuário logado -->
            </div>
            <nav class="nav-right">
                <img src="{{ asset('images/policia_civil2.png') }}" alt="Logo Papo de Responsa" class="logo2">
            </nav>
    </header>

    <nav>
        <div>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <a href="{{ route('admin.dashboardsolicitacao') }}">Solicitações</a></li>
            {{-- <li><a href="{{ route('admin.dashboardsolicitante') }}">Solicitantes</a></li>
            <li><a href="{{ route('admin.solicitacoes') }}">Todas as Solicitações</a></li> --}}
        </div>
    </nav>

    <main>
        @yield('content') <!-- Onde o conteúdo das views específicas será inserido -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Sistema Multiplicador</p>
    </footer>
</body>
</html>
