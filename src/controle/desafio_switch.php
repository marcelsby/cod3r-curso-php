<div class="titulo">Desafio Switch</div>

<form action="#" method="POST">
    <input type="text" name="param">
    <select name="conversao" id="conversao">
        <option value="km-milha">Km -> Milha</option>
        <option value="milha-km">Milha -> Km</option>
        <option value="metro-km">Metro -> Km</option>
        <option value="km-metro">Km -> Metro</option>
        <option value="f-celsius">Fᵒ -> Cᵒ</option>
        <option value="celsius-f">Cᵒ -> Fᵒ</option>
    </select>
    <button>Calcular</button>
</form>

<style>
form > * {
    font-size: 1.8rem;
}
</style>

<?php

const FATOR_KM_MILHA = 1.60934;
const FATOR_KM_M = 1000;

if (isset($_POST['param']) && isset($_POST['conversao'])) {
    if (is_numeric($_POST['param'])) {
        $valorInicial = str_replace(',', '.', $_POST['param']);
        $param = floatval($valorInicial);
        $tipoConversao = $_POST['conversao'];

        switch ($tipoConversao) {
        case 'metro-km':
            $resultado = $param / FATOR_KM_M;
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} Metro(s) são {$resultadoFormatado} Kilômetro(s)";
            break;
        case 'km-metro':
            $resultado = $param * FATOR_KM_M;
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} Kilômetro(s) são {$resultadoFormatado} Metro(s)";
            break;
        case 'milha-km':
            $resultado = $param * FATOR_KM_MILHA;
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} Milha(s) são {$resultadoFormatado} Kilômetro(s)";
            break;
        case 'km-milha':
            $resultado = $param / FATOR_KM_MILHA;
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} Kilômetro(s) são {$resultadoFormatado} Milha(s)";
            break;
        case 'f-celsius':
            if ($param == 0) {
                $resultado = -17.77;
            } else {
                $resultado = ($param - 32) * 5 / 9;
            }
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} graus Fᵒ são {$resultadoFormatado} graus Cᵒ";
            break;
        case 'celsius-f':
            if ($param == 0) {
                $resultado = 32;
            } else {
                $resultado = ($param * 9 / 5) + 32;
            }
            $resultadoFormatado = number_format($resultado, 2, ',', '.');
            echo "{$param} graus Cᵒ são {$resultadoFormatado} graus Fᵒ";
            break;
        default:
            break;
        }
    } else {
        echo "Valor inválido! Tente novamente com um valor decimal ou inteiro.";
    }
}
