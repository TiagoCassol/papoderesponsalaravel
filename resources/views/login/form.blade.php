@if($mensagem = Session::get('erro'))
    {{$mensagem}}
@endif

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Acesso ao site</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id = "principal">
    {{-- <img src="images/policia_Civil2.png" alt="Logo Papo de Responsa" class="logo-policia" > --}}
    <img src="/images/policia_Civil2.png" alt="Logo Papo de Responsa" class="logo-policia">
    <div class="logo">
        <a href="{{route('site.index')}}">
            <img src="/images/logo.png" alt="imagem que representa o logo do PPR" class="logo-policia">
        </a>
    </div>

    <div id="login">
        <div class="caixa">
            <form action="{{route('login.auth')}}" method="POST">
            @csrf
            <fieldset>
                <h1>LOGIN MULTIPLICADOR</h1>
                Email: <br> <input type="email" name="email_multiplicador"><br>
                Senha: <br> <input type="password" name="senha_multiplicador"> <br>
                <input type="checkbox" name="remember">Lembrar-me
                <button type="submit">Entrar</button>
                <a href="CadastroMultiplicador.php">Cadastrar Multiplicador</a>
                <a href="esqueceuSenha.php">Esqueceu a Senha</a>
            </fieldset>
            </form>

        </div>
        <div class="caixa">
            <?php
            ?>
            <form action="" method="post">
                <fieldset>
                <h1>LOGIN SOLICITANTE</h1>
                <div class="email">
                    <input type="email" name="email_solicitante" placeholder="informe seu e-mail" required>
                </div>
                <div class="senha">
                    <input type="password" name="senha_solicitante" placeholder="insira sua senha" required>
                </div>
                <div class="entrar">
                    <input type="submit" name="acessar_solicitante" value="Acessar">
                </div>
                <a href="CadastroSolicitante.php">Cadastrar Solicitante</a>
                <a href="esqueceuSenha.php">Esqueceu a Senha</a>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
