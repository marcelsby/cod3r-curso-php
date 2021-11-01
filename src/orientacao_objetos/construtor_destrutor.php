<div class="titulo">Construtor & Destrutor</div>

<?php
class Pessoa
{
    public $nome;
    public $idade;

    public function __construct(string $nome, int $idade)
    {
        echo 'Contrutor invocado! <br>';
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function __destruct()
    {
        echo 'E morreu! <br>';
    }

    public function apresentar()
    {
        echo "{$this->nome}, {$this->idade} anos <br>";
    }
}

$pessoaA = new Pessoa('João', 27);
$pessoaA->apresentar();
unset($pessoaA);

$pessoaB = new Pessoa('Maria', 34);
$pessoaB->apresentar();
$pessoaB = null;
