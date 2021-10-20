<div class="titulo">Conversões</div>

<?php
echo is_int(PHP_INT_MAX);
echo '<br>';

// int para float
echo '<p>int para float</p>';
var_dump(PHP_INT_MAX + 1);
echo '<br>';

var_dump(1 + 1.0);
echo '<br>';

// Casting
var_dump((float) 3);
echo '<br>';

// float -> int (ocorre o truncamento da parte real)
echo '<p>Float para int</p>';
var_dump((int) 6.8);
echo '<br>';

var_dump(intval(6.8, 10));
echo '<br>';

var_dump(intval('0xf', 16));
echo '<br>';

var_dump((int) round(2.8));
echo '<br>';

// Operações com string
echo '<p>Operações com string</p>';
var_dump(3 + "2"); // o PHP converte o dois para int
echo '<br>';

var_dump("3" + 2);
echo '<br>';

var_dump("3" . 2);
echo '<br>';

var_dump(is_string("3" . 2));
var_dump(is_string("3" + 2));
echo '<br>';

// Erro de tipo: soma de string com int
// var_dump(1 + "cinco");
// echo '<br>';

// var_dump(1 + "5 cinco");
// echo '<br>';

// var_dump(1 + "2+5");
// echo '<br>';

var_dump(1 + "2.0");
echo '<br>';

var_dump(1 + "-3.2e2");
echo '<br>';

var_dump((int) "10.5");
echo '<br>';

var_dump((float) "11.12");
echo '<br>';
