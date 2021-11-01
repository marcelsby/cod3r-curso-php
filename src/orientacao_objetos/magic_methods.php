<div class="titulo">Métodos Mágicos</div>

<?php
class Pessoa
{
    public $nome;
    public $idade;

    public function __construct($nome, $idade)
    {
        echo 'Construtor invocado! <br>';
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function __destruct()
    {
        echo 'E morreu <br>';
    }

    public function __toString()
    {
        return "{$this->nome} tem {$this->idade} anos.";
    }

    public function apresentar()
    {
        echo $this . '<br>';
    }

    public function __get($atrib)
    {
        echo "Lendo um atributo não declarado: {$atrib} <br>";
        // return $atrib;
    }

    public function __set($atrib, $valor)
    {
        echo "Alterando atributo não encontrado: {$atrib}/{$valor} <br>";
    }

    public function __call($metodo, $params)
    {
        echo "Tentando executar método '${metodo}', com todos os parâmetros ";
        print_r($params);
    }
}

$pessoa = new Pessoa('Ricardo', 40);
$pessoa->apresentar(); // chama o __toString
echo $pessoa, '<br>'; // chama o __toString
$pessoa->nome = 'Reinaldo';
$pessoa->apresentar(); // chama o __toString

$pessoa->nomeCompleto = 'Bahianinho de Maua'; //chama o __set
$pessoa->nomeCompleto; //chama o __get
echo $pessoa->nome; // acessa o atributo diretamente

$pessoa->exec(1, 'teste', true, [1, 2, 3]); // chama o __call
