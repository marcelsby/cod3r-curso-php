<div class="titulo">Map & Filter</div>

<?php
// Map manual para arredondar as notas
$notas = [5.8, 7.3, 9.8, 6.7];
$notasFinais1 = [];

foreach ($notas as $nota) {
    $notasFinais1[] = round($nota);
}

print_r($notasFinais1);

// Map do PHP para arredondar as notas para cima
echo '<br>';
$notasFinais2 = array_map('ceil', $notas);
print_r($notasFinais2);

// Filter manual
$apenasAprovados1 = [];
foreach ($notas as $nota) {
    if ($nota >= 7) {
        $apenasAprovados1[] = $nota;
    }
}

echo '<br>';
print_r($apenasAprovados1);

// Filter do PHP para mostrar os alunos aprovados
function aprovados($nota): bool
{
    return $nota >= 7;
}

echo '<br>';
$apenasAprovados2 = array_filter($notas, 'aprovados');
print_r($apenasAprovados2);

// Map com uma função personalizada que privilegia os alunos
function calculoLegal($nota)
{
    $notaFinal = round($nota) + 1;
    return $notaFinal > 10 ? 10 : $notaFinal;
}

echo '<br>';
$notasFinais3 = array_map('calculoLegal', $notas);
print_r($notasFinais3);
