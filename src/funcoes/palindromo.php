<div class="titulo">Desafio Palindromo</div>

<?php
function isPalindromo($palavra)
{
    $palavraTratada = str_replace(' ', '', strtolower(trim($palavra)));
    $maxIndicePalavra = mb_strlen($palavraTratada) - 1;
    $palavraInvertida = '';

    for ($i = $maxIndicePalavra; $i > -1; $i--) {
        $palavraInvertida .= $palavraTratada[$i];
    }

    $resultado = strcmp($palavraInvertida, $palavraTratada) === 0;

    return $resultado;
}

$resPalindromo = isPalindromo('LUz AzUL') ? 'Sim!' : 'Não!';

echo $resPalindromo . '<br>';

// Palíndromo simples, implementação do professor
function palindromoSimples($palavra)
{
    return $palavra === strrev($palavra) ? 'Sim!' : 'Não!';
}

echo palindromoSimples('arara') . '<br>';
echo palindromoSimples('ana') . '<br>';
echo palindromoSimples('bola') . '<br>';
