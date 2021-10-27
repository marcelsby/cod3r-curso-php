<div class="titulo">Variáveis</div>

<?php
$numeroA = 13;
echo $numeroA, '<br>';
var_dump($numeroA);
echo '<br>';

$a = 3;
$b = 16;
$soma = $a + $b;
echo $soma;
echo '<br>';

echo isset($soma);
echo '<br>';

unset($soma);
echo isset($soma);
var_dump($soma);

$variavel = 10;
echo '<br>' . $variavel;

$variavel = "Agora sou uma string!";
echo '<br>' . $variavel;

// Nomes de variável
$var = 'valida';
$var2 = 'valida';
$VAR3 = 'valida';
$_var4_ = 'valida';
$vâr5 = 'valida'; // evitar!!
// $6var = 'invalida';
// $%var7 = 'invalida';
// $var8% = 'invalida';

// Variáveis pré-definidas
var_dump($_SERVER["HTTP_HOST"]);
