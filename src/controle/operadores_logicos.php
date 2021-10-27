<div class="titulo">Operadores Lógicos</div>

<?php
echo "<p class='divisao'>V ou F</p><hr>";
var_dump(true);
echo "<br>";
var_dump(!true);

echo "<p class='divisao'>Tabela verdade 'AND' (E)</p><hr>";
var_dump(true && true);
var_dump(true && false);
var_dump(false && false);
var_dump(false && true);

echo "<p class='divisao'>Tabela verdade 'OR' (OU)</p><hr>";
var_dump(true || true);
var_dump(true || false);
var_dump(false || false);
var_dump(false || true);

echo "<p class='divisao'>Tabela verdade 'XOR' (OU Exclusivo)</p><hr>";
var_dump(true xor true);
var_dump(true xor false);
var_dump(false xor false);
var_dump(false xor true);

// Como algumas linguagens não tem o XOR é possível simulá-lo com o "!="
echo '<p class="divisao">Simulação de XOR com "!="</p><hr>';
var_dump(true != true);
var_dump(true != false);
var_dump(false != false);
var_dump(false != true);

echo '<p class="divisao">Exemplo</p><hr>';
$idade = 67;
$sexo = 'M';
$pagouPrevidencia = true;

$criterioHomem = ($idade >= 65 && $sexo === 'M');
$criterioMulher = ($idade >= 60 && $sexo === 'F');

if (!$pagouPrevidencia) {
    echo "Não pode se aposentar pelo INSS!";
} elseif ($pagouPrevidencia && ($homemPodeAposentar || $criterioMulher)) {
    echo "Pode se aposentar -> $sexo";
} else {
    echo "Vai ter que trabalhar mais um pouco...";
}
