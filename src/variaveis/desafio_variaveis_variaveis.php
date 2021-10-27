<div class="titulo">Desafio variáveis variáveis</div>

<?php

$a = 'Nossa';
$Nossa = 'Eu';
$Eu = 'consegui';
$consegui = 'responder';
$responder = 'esse';
$esse = 'desafio';

// Imprima a seguinte frase utilizando apenas a variável $a
echo "Nossa! Eu consegui responder esse desafio." . '<br>';

echo "{$a}! {$$a} {$$$a} {$$$$a} {$$$$$a} {$$$$$$a}.";
