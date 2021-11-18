<div class="titulo">Try/Catch</div>

<?php
// echo 7 / 0;
// echo intdiv(7, 0);

try {
    echo intdiv(7, 0);
} catch (Error $e) {
    echo 'Teve um erro aqui<br>';
}

// Com vários catch, sempre trate os erros mais específicos antes dos erros mais genéricos.
try {
    // throw new Exception('Um erro muito estranho');
    echo intdiv(7, 0);
} catch (DivisionByZeroError $e) {
    echo 'Divisão por zero<br>';
} catch (Throwable $e) {
    echo 'Erro encontrado: ' . $e->getMessage() . '<br>';
} finally {
    echo 'Finally = sempre executado!<br>';
}

echo 'Execução continua...';
