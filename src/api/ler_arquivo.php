<div class="titulo">Ler Arquivo</div>

<?php
$arquivo = fopen('teste.txt', 'r');
echo fread($arquivo, 10) . '<br>';
echo fread($arquivo, 10) . '<br>';
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
$tamanho = filesize('teste.txt');
echo "Tamanho do arquivo em bytes: $tamanho<br>";
echo fread($arquivo, $tamanho) . '<br>';
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
echo fgets($arquivo) . '<br>';
echo fgets($arquivo) . '<br>';
var_dump(fgets($arquivo));
echo '<br>';
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
while (!feof($arquivo)) {
    echo fgets($arquivo) . '<br>';
}
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
while (!feof($arquivo)) {
    echo fgetc($arquivo);
}
echo '<br>';
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r+');
echo fgets($arquivo) . '<br>';
echo fgets($arquivo) . '<br>';
fwrite($arquivo, "\nAdicionado durante a leitura");
fclose($arquivo);

echo "FIM!";
