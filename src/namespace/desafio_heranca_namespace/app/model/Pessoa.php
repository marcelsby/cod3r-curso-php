<?php

namespace App\Model;

class Pessoa
{
    public $nome;
    public $idade;

    public function __construct($nome, $idade)
    {
        $this->nome = trim($nome);
        $this->idade = $idade < 1 ? false : $idade;
    }
}
