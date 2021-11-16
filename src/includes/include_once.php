<div class="titulo">Include Once</div>

<?php
include('include_once_arquivo.php');
// require('include_once_arquivo.php');

echo "Antes = '{$variavel}'.<br>";
$variavel = 'Variável Alterada';
echo "Depois = '{$variavel}'.<br>";

include('include_once_arquivo.php');
echo "Após a segunda chamada do include = '{$variavel}'.<br>";
$variavel = 'Alterada novamente';
echo "Após a segunda alteração = '{$variavel}'.<br>";

include_once('include_once_arquivo.php');
echo "Variável = '{$variavel}'.<br>";

require_once('include_once_arquivo.php');
echo "Variável = '{$variavel}'.<br>";
