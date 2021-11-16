<?php

require_once('Pessoa.php');

class Usuario extends Pessoa
{
    public $login;

    public function __construct($nome, $idade, $login)
    {
        parent::__construct($nome, $idade);
        $this->login = $login;
        echo 'Usuário criado! <br>';
    }

    public function __destruct()
    {
        echo 'Usuário diz: Tchau!! <br>';
        parent::__destruct();
    }

    public function apresentar()
    {
        echo "@{$this->login}: ";
        parent::apresentar();
    }
}
