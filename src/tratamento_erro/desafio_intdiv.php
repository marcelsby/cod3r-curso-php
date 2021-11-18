<?php

namespace Desafio;

use Exception;
use Throwable;

?>

<div class="titulo">Desafio intdiv</div>

<?php


class DivisionByZeroException extends Exception
{
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class NotIntegerDivisonResultException extends Exception
{
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

function intdiv($dividendo, $divisor)
{
    if ($divisor == 0) {
        throw new DivisionByZeroException('Divisão por zero não é permitida!');
    }

    if (!is_int(($dividendo / $divisor))) {
        throw new NotIntegerDivisonResultException(
            'O resultado da divisão não é inteiro, por favor, tente novamente.'
        );
    }

    return $dividendo / $divisor;
}

$dadosTeste = [[8, 2], [8, 3], [8, 0]];

foreach ($dadosTeste as $dupla) {
    try {
        echo intdiv($dupla[0], $dupla[1]) . '<br>';
    } catch (DivisionByZeroException $e) {
        echo "Ocorreu uma exceção: {$e->getMessage()}<br>";
    } catch (NotIntegerDivisonResultException $e) {
        echo "Ocorreu uma exceção: {$e->getMessage()}<br>";
    } catch (Throwable $e) {
        echo "Ocorreu um erro inesperado: {$e->getMessage}<br>";
    }
}

echo \intdiv(8, 3);
