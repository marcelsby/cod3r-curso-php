<div class="titulo">Mapa</div>

<?php
$dados = array(
    "idade" => 25,
    "cor" => "verde",
    "peso" => 49.8
);

print_r($dados);

var_dump($dados[0]);
echo '<br>' . $dados['idade'];
echo '<br>' . $dados['cor'];
echo '<br>' . $dados['peso'];
var_dump($dados['outra_informacao']);

// É uma má prática, mas o PHP permite a sintaxe abaixo
$lista = array(
    'a',
    'cinco' => 'b',
    'c',
    8 => 'd',
    'e',
    6 => 'f',
    'g',
    8 => 'h'
);

echo '<br>';
print_r($lista);

// Executa um append do valor 'i' ao próximo índice disponível na
$lista[] = 'i';
echo '<br>';
print_r($lista);

// Adiciona um item com a chave 'vinte' e valor 'j' à lista existente
$lista['vinte'] = 'j';
echo '<br>';
print_r($lista);

// colocar false no lugar da chave insere o valor no índice 0 do array
$lista[false] = 'indexado com false!';
echo '<br>';
print_r($lista);

// indexado com o índice 1
$lista[true] = 'indexado com true!';
echo '<br>';
print_r($lista);
