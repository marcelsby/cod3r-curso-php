<div class="titulo">Desafio For</div>

<!--
#
##
###
####
#####
1) Pode usar incremento $i++
2) Não pode usar incremento $i++
-->

<?php
$hash = '';

for ($i = 0; $i < 5; $i++) {
    $hash .= '#';
    echo "$hash <br>";
}

echo '<hr>';

for ($i = '#'; strcmp($i, '######'); $i .= '#') {
    echo "$i <br>";
}
