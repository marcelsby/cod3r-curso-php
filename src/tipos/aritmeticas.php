<div class="titulo">Operações Aritméticas</div>

<?php
echo 1 + 1, '<br>';

var_dump(1 + 1);

echo '<br>';

echo 1 + 2.5, '<br>';

echo 10 - 2, '<br>';

echo 2 * 5, '<br>';

echo 5 / 2, '<br>';

echo intdiv(5, 2), '<br>';
echo round(5 / 2), '<br>';

echo 5 % 2, '<br>';

// Geram um DivisionByZeroError
// echo 7 / 0, '<br>';
// echo intdiv(7, 0), '<br>';

echo 4 ** 2, '<br>';

// Precedência de operadores (o mesmo de sempre):
//  () -> ** -> / * % -> + -
echo '<p>Precedência</p>';
echo 2 + 3 * 4, '<br>';
echo (2 + 3) * 4, '<br>';
echo 2 + 3 * 4 ** 2, '<br>';
echo ((2 + 3) * 4) ** 2, '<br>';
