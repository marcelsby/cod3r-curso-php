<div class="titulo">Desafio Tabela #2</div>

<form action="#" method="POST">
    <label for="linhas">Linhas:</label>
    <input type="number" id="linhas" name="linhas">
    <label for="colunas">Colunas:</label>
    <input type="number" id="colunas" name="colunas">
    <button>Gerar</button>
</form>

<?php
if (isset($_POST['linhas'], $_POST['colunas'])) {
    $linhas = $_POST['linhas'];
    $colunas =  $_POST['colunas'];
    $matriz = [];

    $acumulador = 1;

    for ($i = 0; $i < $linhas; $i++) {
        $linha = [];
        for ($j = 0; $j < $colunas; $j++) {
            $linha[] = $acumulador++;
        }
        $matriz[] = $linha;
    }

    $table = '<table>';
    foreach ($matriz as $indice => $linha) {
        if ($indice % 2 == 0) {
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

    echo "$table";
}
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
