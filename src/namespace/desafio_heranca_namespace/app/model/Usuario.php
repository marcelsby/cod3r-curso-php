<?php

namespace App\Model;

require_once('Pessoa.php');

use App\Model\Pessoa;

class Usuario extends Pessoa
{
    public $login;

    public function __construct($nome, $idade, $login)
    {
        parent::__construct($nome, $idade);
        $this->login = trim($login);
    }
}
