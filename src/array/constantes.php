<div class="titulo">Arrays Constantes</div>

<?php
// Em PHP tanto o conteúdo como a referência para o array são constantes
const FRUTAS = array('laranja', 'abacaxi');
// FRUTAS[0] = 'banana';
// FRUTAS[] = 'banana';
print_r(FRUTAS);

const CARROS = ['fiat' => 'uno', 'ford' => 'fiesta'];
// CARROS['bmw'] = '325i';
echo '<br>' . CARROS['fiat'];

define('CIDADES', array('Belo Horizonte', 'Recife'));
// CIDADES[0] = 'Rio de Janeiro';
echo '<br>' . CIDADES[1];
