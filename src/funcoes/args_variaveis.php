<div class="titulo">Argumentos Variáveis</div>

<?php
function soma($a, $b)
{
    return $a + $b;
}


echo soma(14, 15, 6, 7, 8, 9) . '<br>';
echo soma(6, 5, 4) . '<br>';

// Rest operator (agrupador)
function somaCompleta(...$numeros)
{
    $soma = 0;
    foreach ($numeros as $num) {
        $soma += $num;
    }
    return $soma;
}

echo somaCompleta(1, 2, 3, 4, 5) . '<br>';

$array = [6, 7, 8];
// Spread operator (espalhador)
echo somaCompleta(...$array) . '<br>';

function membros($titular, ...$dependentes)
{
    echo "Titular: $titular <br>";
    if ($dependentes) {
        foreach ($dependentes as $dependente) {
            echo "Dependente: $dependente <br>";
        }
    }
}

echo '<br>';
membros("Ana Silva", "Pedro", "Rafaela", "Amanda");
echo '<br>';
membros("Roberto");
