<div class="titulo">PDO: Inserir</div>

<?php
require_once 'pdo_conexao.php';

ini_set('display_errors', 0);

$sql = "INSERT INTO cadastro (nome, email, nascimento, site, filhos, salario) 
        VALUES (
            'Guilherme Filho',
            'guidagalera@gmail.com',
            '1987-7-21',
            'https://guidagalera.com.br',
            0,
            5700.87
        )";

$conexao = novaConexao();
// print_r(get_class_methods($conexao));

try {
    $conexao->exec($sql);
    $id = $conexao->lastInsertId();
    echo sprintf('Novo cadastro com o id %d<br>', $id);
} catch (PDOException $e) {
    echo $conexao->errorCode() . '<br>';
    print_r($conexao->errorInfo());
}
