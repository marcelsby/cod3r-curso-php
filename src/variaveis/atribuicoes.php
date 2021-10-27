<div class="titulo">Atribuições</div>

<?php
$title = 'Atribuições';

$numero = 10;
echo '<br>' . $numero;
$numero = $numero - 7;
echo '<br>' . $numero;
$numero = $numero + 1.5;
echo '<br>' . $numero;

// Operador unário pré-fixado e pós-fixado
$numero--;
echo '<br>' . $numero;
--$numero;
echo '<br>' . $numero;
$numero++;
echo '<br>' . $numero;
++$numero;
echo '<br>' . $numero;

// Atribuição com operação
$numero += 2;
echo '<br>' . $numero;
$numero -= 5;
echo '<br>' . $numero;
$numero *= 2;
echo '<br>' . $numero;
$numero /= 2;
echo '<br>' . $numero;
$numero %= 3;
echo '<br>' . $numero;
$numero **= 100;
echo '<br>' . $numero;
$numero .= 4;
echo '<br>' . $numero;

$texto = 'Esse é um texto';
echo '<br>' . $texto;
$texto .= ' qualquer';
echo '<br>' . $texto;
$texto = $texto . ' de verdade!';
echo '<br>' . $texto;

// "Optional" no PHP
// $variavelInexistente = 'valor inexistente';
echo '<br>' . $variavelInexistente;
$valor = $variavelInexistente ?? '<br>valor default';
echo '<br>' . $valor;
