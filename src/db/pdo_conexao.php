<?php

function novaConexao($banco = 'curso_php')
{
    $servidor = 'mariadb';
    $usuario = 'root';
    $senha = 'admin';

    # Variáveis replicadas para o padrão de conteúdo e nomenclatura do construtor do PDO
    $dsn = "mysql:dbname=curso_php;host=$servidor";
    $user = $usuario;
    $password = $senha;

    try {
        $conexao = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        die('Erro: ' . $e->getMessage());
    }

    return $conexao;
}
