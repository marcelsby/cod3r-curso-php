<?php

session_start();

$arquivos = $_SESSION['arquivos'] ?? [];

if (isset($_FILES['arquivo'])) {
    $pastaUpload = __DIR__ . '/files/';
    $nomeArquivo = $_FILES['arquivo']['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['arquivo']['tmp_name'];

    if (move_uploaded_file($tmp, $arquivo)) {
        echo "<br>Arquivo válido e enviado com sucesso.";
        $arquivos[] = $nomeArquivo;
        $_SESSION['arquivos'] = $arquivos;
    } else {
        echo "<br>Erro no upload do arquivo.";
    }
}

?>

<div class="titulo">Download de Arquivo</div>

<form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <button>Enviar</button>
</form>

<ul>
    <?php foreach ($arquivos as $arquivo) : ?>
        <li>
            <a href="./files/<?php echo $arquivo ?>">
                <?php echo $arquivo ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<style>
    input, button {
        font-size: 2.1rem;
    }
</style>


