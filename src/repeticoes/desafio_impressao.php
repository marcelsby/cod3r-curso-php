<div class="titulo">Desafio Impressão</div>

<!--
Enunciado:
- Imprima apenas os valores do array que contém indice par
- Resolver com for e foreach
- Valores esperados: AAA, CCC, EEE
-->

<?php
$array = [
    'AAA',
    'BBB',
    'CCC',
    'DDD',
    'EEE',
    'FFF'
];

for ($i = 0; ($i < count($array)); $i++) {
    $isPar = $i % 2 === 0;

    if ($isPar) {
        echo "{$array[$i]} <br>";
    }
}

echo '<br><hr>';

foreach ($array as $index => $value) {
    if ($index % 2 === 0) {
        echo "{$array[$index]} <br>";
    }
}
