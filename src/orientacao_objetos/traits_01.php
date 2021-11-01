<div class="titulo">Traits #01</div>

<?php

trait validacao
{
    public $a = 'Valor a';
    private $c = 'Valor privado c';

    public function validarString($str)
    {
        return isset($str) && $str !== '';
    }
}

trait validacaoMelhor
{
    public $b = 'Valor b';

    public function validarStringMelhor($str)
    {
        return isset($str) && trim($str);
    }

    public function imprimirAttrPrivadoTrait()
    {
        echo '<br>' . $this->c;
    }
}

class Usuario
{
    use validacao;
    use validacaoMelhor;
}

// var_dump(validacao->validarString(''));

$usuario = new Usuario();
var_dump($usuario->validarString((' ')));
echo '<br>';
echo var_dump($usuario->a), '<br>', var_dump($usuario->b);
$usuario->imprimirAttrPrivadoTrait();
