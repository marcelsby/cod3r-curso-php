<?php

function novaConexao($banco = 'curso_php')
{
    $servidor = 'mariadb';
    $usuario = 'root';
    $senha = 'admin';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if (isset($conexao->connect_error)) {
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}
