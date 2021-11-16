<div class="titulo">Require & Return</div>

<?php
$valorRetorno = require('return_usado.php');

var_dump($valorRetorno == $variavelRetornada);
echo '<br>' . $valorRetorno;
echo '<br>' . $variavelRetornada;

echo '<br>' . __DIR__;

$valorRetorno2 = require(__DIR__ . '/return_nao_usado.php');
// var_dump($valorRetorno2);
echo '<br>' . $valorRetorno2;
echo '<br>' . $variavelDeclarada;
