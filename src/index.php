<?php

require('gerenciadorSessao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curso PHP</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Índice dos exercícios</h2>
    </header>
    <nav class="navegacao">
        <span class="usuario">
            Usuario: <?php echo $_COOKIE['usuario'] ?>
        </span>
        <a href="logout.php" class="vermelha">Sair</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <?php require_once('menu.php'); ?>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?php date('Y');?>
    </footer>
</body>
</html>
