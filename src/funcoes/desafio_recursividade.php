<div class="titulo">Desafio Recursividade</div>

<?php
/*
$array = [1, 2, [3, 4, 5], 6, [7, [8, 9]], 10];
Printar '>' para indicar a profundidade de cada elemento no array;
> 1
> 2
>> 3
>> 4
>> 5
> 6
>> 7
>>> 8
>>> 9
>> 10
 */

$array = [1, 2, [3, 4, 5], 6, [7, [8, 9]], 10];

function printarValorProfundidade($array, $profundidade = 1)
{
    foreach ($array as $indice => $elemento) {
        if ($indice > 0) {
            $elementoAnterior = $array[($indice - 1)];
        }

        if (is_array($elemento)) {
            $profundidade += 1;
            printarValorProfundidade($elemento, $profundidade);
        } elseif (isset($elementoAnterior) && is_array($elementoAnterior)) {
            $profundidade -= 1;
            echo str_repeat('>', $profundidade) . "$elemento<br>";
        } else {
            echo str_repeat('>', $profundidade) . "$elemento<br>";
        }
    }
}

printarValorProfundidade($array);
