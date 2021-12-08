<div class="titulo">PDO: Alterar</div>

<?php
require_once 'pdo_conexao.php';

$conexao = novaConexao();

$sql = "UPDATE cadastro 
        SET nome = ?,
            nascimento = ?,
            email = ?,
            site = ?,
            filhos = ?,
            salario = ?
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

try {
    $stmt->execute([
        'Gui',
        '1980-12-12',
        'gui@gui.com.br',
        'http://gui.co',
        1,
        12000.98,
        18
    ]);

    echo "Sucesso! :)";
} catch (PDOException $e) {
    print_r($stmt->errorInfo());
}
