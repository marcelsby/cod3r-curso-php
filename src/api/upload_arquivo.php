<div class="titulo">Upload de Arquivo</div>

<?php
print_r($_FILES);

if (isset($_FILES['arquivo'])) {
    $pastaUpload = '/var/www/html/tmp/';
    $nomeArquivo = $_FILES['arquivo']['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['arquivo']['tmp_name'];
    if (move_uploaded_file($tmp, $arquivo)) {
        echo "<br>Arquivo válido e enviado com sucesso.";
    } else {
        echo "<br>Erro no upload do arquivo.";
    }
}
?>

<form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <button>Enviar</button>
</form>

<style>
    input, button {
        font-size: 1.2rem;
    }
</style>


