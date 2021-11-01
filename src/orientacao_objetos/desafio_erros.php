<div class="titulo">Desafio Erros</div>

<?php
interface Template
{
    public function metodo1();
    public function metodo2($parametro);
}

abstract class ClasseAbstrata implements Template
{
    public function metodo3()
    {
        echo "Estou funcionando!<br>";
    }
}

class Classe extends ClasseAbstrata
{
    public function metodo1()
    {
        echo 'Olá, eu sou o método 1! <br>';
    }

    public function metodo2($nome = 'visitante')
    {
        echo "Olá $nome, eu sou o método 2! <br>";
    }

    public function __construct()
    {
    }
}

$exemplo = new Classe();
$exemplo->metodo3();
