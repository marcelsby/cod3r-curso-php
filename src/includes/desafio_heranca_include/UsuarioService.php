<?php

require_once('Usuario.php');

class UsuarioService
{
    public function registrarUsuario(string $nome, int $idade, string $login): Usuario
    {
        return new Usuario($nome, $idade, $login);
    }

    public function exibirUsuario(Usuario $usuario)
    {
        echo 'Dados do usuário:<br>';
        echo "Nome: {$usuario->nome}<br>";
        echo "Idade: {$usuario->idade}<br>";
        echo "Login: {$usuario->login}<br>";
    }
}

return new UsuarioService();
