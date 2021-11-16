<div class="titulo">Include Função</div>

<?php
echo 'Carregando: include_funcao<br>';

function carregarArquivo()
{
    include('include_arquivo.php');
    echo $variavel . '<br>';
    echo soma(2, 5) . '<br>';
}

echo 'Novamente no arquivo include_funcao<br>';
// echo soma(1, 8) . '!<br>';
carregarArquivo();

// O escopo da variável $variavel é o método carregarArquivo()
// echo "Variavel = '{$variavel}'";

// O mesmo não é verdade para os métodos, quando incluídos eles estarão disponíveis em todo o arquivo
echo soma(4, 2);
