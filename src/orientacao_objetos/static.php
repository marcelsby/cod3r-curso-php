<div class="titulo">Membros Estáticos</div>

<?php

class A
{
    public $naoStatic = 'Variável de instância';
    public static $static = 'Variável de classe (estática)';

    public function mostrarA()
    {
        echo "Não estática = {$this->naoStatic} <br>";
        // Tentativa 1
        // echo "Estática = {$this->static} <br>";
        // Tentativa 2
        echo "Estática = " . self::$static . "<br>";
    }

    public static function mostrarStaticA()
    {
        // Não é possível acessar variáveis de instância a partir de um método estático
        // echo "Não estática = {$this->naoStatic} <br>";
        // echo "Estática = {$static} <br>";
        echo "Estática = " . self::$static . " <br>";
    }
}

$a = new A();
$a->mostrarA();
$a->mostrarStaticA(); // não é a forma ideal

echo '<br>';
echo A::$static, '<br>'; // forma ideal
A::mostrarStaticA();
