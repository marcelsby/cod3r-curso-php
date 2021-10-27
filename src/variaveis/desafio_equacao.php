<div class="titulo">Desafio Equação</div>

<?php

$numeradorDentro1 = (6 * (3 + 2)) ** 2;
$denominadorDentro1 = 3 * 2;

$fracaoDentro1 = $numeradorDentro1 / $denominadorDentro1;

$numeradorDentro2 = (1 - 5) * (2 - 7);
$denominadorDentro2 = 2;

$fracaoDentro2 = $numeradorDentro2 / $denominadorDentro2;

$numeradorGeral = ($fracaoDentro1 - ($fracaoDentro2) ** 2) ** 3;
$denominadorGeral = 10 ** 3;

$resEquacao = $numeradorGeral / $denominadorGeral;

echo "O resultado final é " . $resEquacao . ".";
