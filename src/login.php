<?php

session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = [
        [
            'nome' => 'Aluno Cod3r',
            'email' => 'aluno@cod3r.com.br',
            'senha' => '123456'
        ],
        [
            'nome' => 'Outro Aluno',
            'email' => 'outro@email.com.br',
            'senha' => '654321'
        ],
    ];

    foreach ($usuarios as $usuario) {
        $emailValido = $email === $usuario['email'];
        $senhaValida = $senha === $usuario['senha'];

        if ($emailValido && $senhaValida) {
            $_SESSION['erros'] = null;
            $_SESSION['usuario'] = $usuario['nome'];

            $exp = time() + 60 * 60 * 24 * 30;
            setcookie('usuario', $usuario['nome'], $exp);

            header('Location: index.php');
        }
    }

    if (!$_SESSION['usuario']) {
        $_SESSION['erros'] = ['Usuário/Senha inválido!'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curso PHP</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body class="login">
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Seja Bem-Vindo(a)</h2>
    </header>
    <main class="principal">
        <div class="conteudo">
            <h3>Faça o login</h3>
            <?php if (isset($_SESSION['erros'])) : ?>
                <div class="erros">
                    <?php foreach ($_SESSION['erros'] as $erro) : ?>
                        <p><?php echo $erro; ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <form action="#" method="POST">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <button>Entrar</button>
            </form>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?php date('Y');?>
    </footer>
</body>
</html>
