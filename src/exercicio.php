<?php

require('gerenciadorSessao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercício</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/exercicio.css">
</head>
<body class="exercicio">
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Visualização do Exercício</h2>
    </header>
    <nav class="navegacao">
        <span class="usuario">
            Usuario: <?php echo $_COOKIE['usuario'] ?>
        </span>
        <a class="verde" href=<?= "{$_GET['dir']}/{$_GET['file']}.php" ?>>Sem formatação</a>
        <a href="index.php">Voltar</a>
        <a href="logout.php" class="vermelha">Sair</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <?php
                require __DIR__ . "/{$_GET['dir']}/{$_GET['file']}.php";
            ?>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?php date('Y'); ?>
    </footer>
</body>
</html>
