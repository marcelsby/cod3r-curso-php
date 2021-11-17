<?php

namespace Outro\Nome;

?>

<div class="titulo">Use/As</div>

<?php

echo __NAMESPACE__ . '<br>';

require('use_as_arquivo.php');

function soma($a, $b)
{
    return $a . $b;
}

class Classe
{
    public $var;

    public function func()
    {
        echo __NAMESPACE__ . ' -> '
            . __CLASS__ . ' -> '
            . __METHOD__ . '<br>';
    }
}

echo \Nome\Bem\Grande\CONSTANTE . '<br>';

use const Nome\Bem\Grande\CONSTANTE;

echo CONSTANTE . '<br>';

use Nome\Bem\Grande as ctx;

echo soma(3, 2) . '<br>';
echo ctx\soma(3, 2) . '<br>';

// use function \Nome\Bem\Grande\soma
use function \Nome\Bem\Grande\soma as somaReal;

echo somaReal(232, 501) . '<br>';

$a = new Classe();
$a->func();

$b = new \Nome\Bem\Grande\Classe();
$b->func();

$c = new ctx\Classe();
$c->func();

use \Nome\Bem\Grande\Classe as D;

$d = new D();
$d->func();

