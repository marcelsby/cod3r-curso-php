<div class="titulo">PDO: Excluir</div>

<?php
require_once 'pdo_conexao.php';

$conexao = novaConexao();

$sql = "DELETE FROM cadastro WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(1, 5, PDO::PARAM_INT);

try {
    $stmt->execute();
    echo "Sucesso! :)";
} catch (PDOException $e) {
    echo "Erro :'(<br>";
    print_r($stmt->errorInfo());
}
