<div class="titulo">Desafio Sorteio</div>

<?php
$nomes = ["Elza", "Rapunzel", "Branca de Neve", "Cinderela"];
$personagemEscolhida = array_rand($nomes);

echo "<h1>{$nomes[$personagemEscolhida]}</h1>";
