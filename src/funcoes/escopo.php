<div class="titulo">Função & Escopo</div>

<?php
function imprimirMensagens()
{
    echo 'Olá! ';
    echo 'Até a próxima!<br>';
}

imprimirMensagens();
imprimirMensagens();
imprimirMensagens();

$variavel = 1;
function trocaValor()
{
    $variavel = 2;
    echo "Durante a função: $variavel <br>";
}

echo "Antes: $variavel <br>";
trocaValor();
echo "Depois: $variavel <br>";

function trocaValorDeVerdade()
{
    global $variavel;
    $variavel = 2;
    echo "Durante a função: $variavel <br>";
}

echo "Antes função: $variavel <br>";
trocaValorDeVerdade();
echo "Depois função: $variavel <br>";

var_dump(trocaValorDeVerdade());
