<div class="titulo">Desafio PI</div>

<?php
echo pi();
$pi = 3.14;
$piInput = 3.141342;

// Minha solução
if (($piInput >= $pi) && ($piInput <= pi())) {
    echo "<br>Iguais";
} else {
    echo "<br>Diferentes";
}

// Solução do professor
if ($pi - pi() <= 0.01) {
    echo "<br>Praticamente iguais";
} else {
    echo "<br>Valor errado!!";
}
