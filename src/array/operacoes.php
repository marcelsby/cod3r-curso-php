<div class="titulo">Operações</div>

<?php
$dados1 = [
    'nome' => 'Jose',
    'idade' => 28
];

$dados2 = [
    'nome' => 'Maria',
    'naturalidade' => 'Fortaleza'
];

$dados2["endereco"] = "Rua A";

// Se houver conflito de chaves, prevalece a que estiver no array mais a esquerda da operação
$dadosCompletos = $dados1 + $dados2;
print_r($dadosCompletos);

echo '<br>' . is_array($dadosCompletos);
echo '<br>' . count($dadosCompletos);

echo '<br>';
$indice = array_rand($dadosCompletos);
echo "$indice = $dadosCompletos[$indice]";
echo "<br>{$dadosCompletos['idade']}";
echo "<br>${dadosCompletos['idade']}";

unset($dadosCompletos['nome']);
echo '<br>';
print_r($dadosCompletos);

unset($dadosCompletos);
echo '<br>';
print_r($dadosCompletos);

$impares = [1, 3, 5, 7, 9];
$pares = [0, 2, 4, 6, 8];

$decimais = $pares + $impares;
echo '<br>';
print_r($decimais);

$decimais = array_merge($pares, $impares);
echo '<br>';
print_r($decimais);

sort($decimais);
echo '<br>';
print_r($decimais);
