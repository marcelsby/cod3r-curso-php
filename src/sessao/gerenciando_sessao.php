<?php

session_start();

$contador = &$_SESSION['contador'];
$contador = $contador ? $contador + 1 : 1;

if ($_SESSION['contador'] % 5 == 0) {
    session_regenerate_id();
}

if ($_SESSION['contador'] >= 15) {
    session_destroy();
}

?>

<div class="titulo">Gerenciando Sessão</div>

<?php
echo session_id() . '<br>';
echo $_SESSION['contador'];
