<div class="titulo">Error Handler</div>

<?php
ini_set('display_errors', 1);
// echo 4 / 0 . '<br>';

error_reporting(E_WARNING);
// echo 4 / 0 . '<br>';

error_reporting(E_ALL);
// echo 4 / 0 . '<br>';

error_reporting(~E_ALL);
include 'arquivo_inexistente.php';

error_reporting(E_ALL);
include 'arquivo_inexistente.php';

function filtrarMensagem($errno, $errstring)
{
    $text = 'include';
    // $text = 'by zero';
    return !!stripos(" $errstring", $text);
}

set_error_handler('filtrarMensagem', E_WARNING);

echo '<hr>';
include 'arquivo_inexistente.php';

echo '<hr>';

restore_error_handler();

include 'arquivo_inexistente.php';
