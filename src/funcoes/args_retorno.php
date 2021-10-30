<div class="titulo">Argumentos & Retorno</div>

<?php
function obterMensagem()
{
    return 'Seja bem vindo(a)!';
}

echo obterMensagem();
$mensagem = obterMensagem();
echo '<br>' . $mensagem;
echo '<br>';
var_dump(obterMensagem());

function obterMensagemComNome($nome)
{
    return "Bem vindo(a), {$nome}!";
}

echo '<br>', obterMensagemComNome('Marcel');
echo '<br>', obterMensagemComNome('João');

function soma($a, $b)
{
    return $a + $b;
}

$x = 4;
$y = 9;
echo '<br>', soma($x, $y);
echo '<br>', soma(3, 16);

function trocarValor($a, $novoValor)
{
    $a = $novoValor;
}

$variavel = 1;
trocarValor($variavel, 71);
echo '<br>', $variavel;

function trocarValorDeVerdade(&$a, $novoValor)
{
    $a = $novoValor;
}

trocarValorDeVerdade($variavel, 89);
echo '<br>', $variavel;
