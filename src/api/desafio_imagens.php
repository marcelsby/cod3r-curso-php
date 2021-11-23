<?php

session_start();

$arquivos = $_SESSION['arquivos'] ?? [];
$imagens = [];

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

if (isset($arquivos)) {
    foreach ($arquivos as $arquivo) {
        if ((substr($arquivo, -4) === '.jpg') || substr($arquivo, -5) === '.jpeg') {
            $imagens[] = $arquivo;
        }
    }
}

?>

<div class="titulo">Desafio Imagens</div>

<form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <button>Enviar</button>
</form>

<ul>
    <?php foreach ($imagens as $imagem) : ?>
        <p>
            <img src="./files/<?php echo $imagem ?>">
        </p>
    <?php endforeach ?>
</ul>

<style>
    input, button {
        font-size: 2.1rem;
    }
</style>


