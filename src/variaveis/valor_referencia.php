<div class="titulo">Valor vs Referência</div>

<?php
$variavel = 'valor inicial';
echo $variavel;

// Atribuição por valor
$variavelValor = $variavel;
echo "<br>$variavelValor";
$variavelValor = 'novo valor';
echo "<br>$variavel | $variavelValor";

// Atribuição por referência
$variavelReferencia = &$variavel;
$variavelReferencia = 'mesma referencia';
echo "<br>$variavel | $variavelReferencia";
