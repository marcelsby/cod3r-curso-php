<div class="titulo">Recursividade</div>

<?php
function somaNumeroAteUm(int $numero): int
{
    $soma = 0;

    for ($numero; $numero > 0; $numero--) {
        $soma += $numero;
    }

    return $soma;
}

echo somaNumeroAteUm(150) . '<br>';

function somaRecursivaAteUm(int $numero): int
{
    // Condição de parada
    if ($numero === 1) {
        return 1;
    }
    return $numero + somaRecursivaAteUm($numero - 1);
}

echo somaRecursivaAteUm(150) . '<br>';

function somaRecursivaEconomica(int $numero): int
{
    return $numero === 1 ? 1 : $numero + somaRecursivaEconomica($numero - 1);
}

echo somaRecursivaEconomica(150) . '<br>';
