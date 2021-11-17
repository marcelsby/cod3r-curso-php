<?php

namespace App\Controller;

require_once(__DIR__ . '/../service/UsuarioService.php');
require_once(__DIR__ . '/../model/Usuario.php');

use App\Service\UsuarioService;
use App\Model\Usuario;

class UsuarioController
{
    private $usuarioService;

    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }

    public function registrar($nome, $idade, $login)
    {
        $novoUsuario = new Usuario($nome, $idade, $login);

        $res = $this->usuarioService->registrar($novoUsuario);

        if ($res != false) {
            return 'Parabéns, usuário criado com sucesso!<br>' .
            'Dados do usuário:<br>' .
            "Nome: {$res->nome}<br>" .
            "Idade: {$res->idade}<br>" .
            "Login: {$res->login}<br>";
        } else {
            return 'Dados inválidos encontrados, tente novamente.<br>';
        }
    }
}
