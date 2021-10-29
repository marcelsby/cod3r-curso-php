<div class="titulo">For Each</div>

<?php
$array = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'];

foreach ($array as $diaDaSemana) {
    echo "$diaDaSemana <br>";
}

echo '<hr>';

foreach ($array as $indice => $diaDaSemana) {
    echo "$indice -> $diaDaSemana <br>";
}

echo '<hr>';

$matrix = [ ['a', 'b', 'c'], ['g', 'f', 'd', 'e'] ];

foreach ($matrix as $linha) {
    foreach ($linha as $valor) {
        echo "$valor ";
    }

    echo '<br>';
}

echo '<hr>';

$numeros = [ 1, 2, 3, 4, 5 ];

foreach ($numeros as &$dobrar) {
    $dobrar *= 2;
    echo "$dobrar <br>";
}

print_r($numeros);
