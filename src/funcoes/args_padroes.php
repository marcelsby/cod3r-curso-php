<div class="titulo">Argumentos Padrões</div>

<?php
function saudacao($nome = 'Senhor(a)', $sobrenome = 'Cliente')
{
    echo "Bem vindo, $nome $sobrenome!<br>";
}

echo saudacao();
echo saudacao(null);
echo saudacao(null, null);
echo saudacao('Mestre', 'Supremo');

function anotarPedido($comida, $bebida = 'Água')
{
    echo "Para comer: $comida <br>";
    echo "Para beber: $bebida <br>";
}

anotarPedido('Hambúrger');
anotarPedido('Pizza', 'Refrigerante');

function anotarPedido2($bebida = 'Água', $comida)
{
    echo "Para comer: $comida <br>";
    echo "Para beber: $bebida <br>";
}

// anotarPedido2('Hambúrger');
anotarPedido2('Refrigerante2', 'Pizza2');
