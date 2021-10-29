<div class="titulo">Desafio Tabela #1</div>

<?php
$matriz = [
    ['01', '02', '03', '04', '05'],
    ['06', '07', '08', '09', '10'],
    ['11', '12', '13', '14', '15'],
    ['16', '17', '18', '19', '20']
];

$table = '<table>';
foreach ($matriz as $linha) {
    if ($linha[0] % 2 != 0) {
        $row = '<tr style="background-color: skyblue;">';
    } else {
        $row = '<tr>';
    }
    foreach ($linha as $valor) {
        $valor = "<td>$valor</td>";
        $row .= $valor;
    }
    $row .= '</tr>';
    $table .= $row;
}
$table .= '</table>';

echo $table;
?>

<style>
    table {
        border: 1px solid #444;
        border-collapse: collapse;
        margin:  20px 0px;
    }

    table tr {
        border:  1px solid #444;
    }

    table td {
        padding: 10px 20px;
    }
</style>
