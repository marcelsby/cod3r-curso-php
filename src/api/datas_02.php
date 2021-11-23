<div class="titulo">Datas #02</div>

<?php
const FORMATO_DATA_1 = 'D, d \d\e M \d\e\ Y';
const FORMATO_DATA_2 = '%A, %d de %B de %Y';
const FORMATO_DATA_HORA = '%A, %d de %B de %Y - %H:%M:%S';

$agora = new DateTime();

// print_r($agora);
// echo '<br>';

echo $agora->format(FORMATO_DATA_1) . '<br>';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8');
echo strftime(FORMATO_DATA_2, $agora->getTimestamp()) . '<br>';

$dataFixa = new DateTime('1975-01-25 15:30:50');
echo strftime(FORMATO_DATA_HORA, $dataFixa->getTimestamp()) . '<br>';

$anoQueVem = new DateTime('+1 year');
echo strftime(FORMATO_DATA_2, $anoQueVem->getTimestamp()) . '<br>';

$anoQueVem->modify('+1 year');
echo strftime(FORMATO_DATA_2, $anoQueVem->getTimestamp()) . '<br>';

$anoQueVem->setDate(2000, 5, 20);
echo strftime(FORMATO_DATA_HORA, $anoQueVem->getTimestamp()) . '<br>';

$dataPassada = new DateTime('2000-05-17');
$dataFutura = new DateTime('2030-11-26');
$outraData = new DateTime('2030-11-26');
echo($anoQueVem > $dataPassada ? 'Maior' : 'Menor') . '<br>';
echo($anoQueVem > $dataFutura ? 'Maior' : 'Menor') . '<br>';
// $outraData = &$dataFutura;
// == compara o conteúdo e === compara o conteúdo e o endereço de memória
echo $outraData === $dataFutura ? 'Igual' : 'Diferente';

echo '<br>';
$tz = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime(null, $tz);
echo $agora->format('d/M/Y H:i:s');
