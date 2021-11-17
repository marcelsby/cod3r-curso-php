<?php

namespace contexto;

use const outro_namespace\CONSTANTE4;

?>

<div class="titulo">Exemplo Básico</div>

<?php
echo __NAMESPACE__ . '<br>';

const CONSTANTE1 = 123;

// Constante declarada no Namespace raiz
define('CONSTANTE2', "raiz");

// Constante declarada no Namespace contexto
define('contexto\CONSTANTE2', "contexto");

define(__NAMESPACE__ . '\CONSTANTE3', 345);

define('outro_namespace\CONSTANTE4', "Eu sou a CONSTANTE4!");


// Testando a impressão das constantes
echo CONSTANTE1 . '<br>';

// ... para acessar a constante no Namespace raiz
echo \CONSTANTE2 . '<br>';

// ... para acessar a constante no Namespace contexto
echo \contexto\CONSTANTE2 . '<br>';

// ... ou se você já estiver nele
echo CONSTANTE2 . '<br>';

// namespace relativo -> \contexto(namespace atual)\contexto\CONSTANTE3
// echo contexto\CONSTANTE3 . '<br>';

// namespace absoluto -> \contexto(namespace atual)\CONSTANTE3
echo \contexto\CONSTANTE3 . '<br>';

// usando o constant()
echo constant(__NAMESPACE__ . '\CONSTANTE3') . '<br>';

echo \outro_namespace\CONSTANTE4 . '<br>';

function soma($a, $b)
{
    return $a + $b;
}

echo \contexto\soma(1, 4) . '<br>';
echo soma(1, 7) . '<br>';

function strpos($str, $text)
{
    echo "Buscando o texto '{$text}' em '{$str}'<br>";
    return 1;
}

// Chama a função strpos do Namespace atual
echo strpos('Texto genérico para busca', 'busca') . '<br>';

// Chama a função strpos do Namespace raiz (API do PHP)
echo \strpos('Texto genérico para busca', 'busca') . '<br>';
