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
        <a class="verde" href=<?= "{$_GET['dir']}/{$_GET['file']}.php" ?>>Sem formatação</a>
        <a href="index.php" class="vermelha">Voltar</a>
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
