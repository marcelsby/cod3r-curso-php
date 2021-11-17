<?php

namespace App\Service;

require_once(__DIR__ . '/../model/Usuario.php');

use App\Model\Usuario;

/**
 * Classe de serviço para o modelo Usuario.
 *
 * @author Marcel Barbosa
 */
class UsuarioService
{
    /**
     * Registra um novo usuário.
     *
     * @return Usuario|bool     Se o usuário tiver dados inválidos retorna false,
     *                          senão retorna o novo Usuario registrado.
     */
    public function registrar(Usuario $usuario)
    {
        if (empty($usuario->nome) || empty($usuario->idade) || empty($usuario->login)) {
            return false;
        } else {
            return $usuario;
        }
    }
}
