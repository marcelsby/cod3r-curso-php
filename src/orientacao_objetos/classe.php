<div class="titulo">Primeira Classe</div>

<?php
class Cliente
{
    public $nome = 'Anônimo';
    public $idade = 18;

    public function apresentar()
    {
        return "Nome: {$this->nome} Idade: {$this->idade}";
    }
}

$cliente1 = new Cliente();
echo $cliente1->nome . '<br>';
$cliente1->nome = 'Ana Silva';
echo $cliente1->nome . '<br>';

$cliente2 = new Cliente();
$cliente2->nome = 'Gabriel';
$cliente2->idade = 43;

echo $cliente1->apresentar() . '<br>';
echo $cliente2->apresentar() . '<br>';
