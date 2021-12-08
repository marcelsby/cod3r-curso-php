<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<div class="titulo">Excluir Registro #02</div>

<?php
require_once "conexao.php";

$conexao = novaConexao();

if (isset($_GET['excluir'])) {
    // Por que usar o ? na string do SQL?
    // $_GET['excluir] = 1;drop table cadastro;
    // Previnir SQL injection;
    $excluirSQL = "DELETE FROM cadastro WHERE id = ?";
    $statement = $conexao->prepare($excluirSQL);
    $statement->bind_param('i', $_GET['excluir']);
    $statement->execute();
}

$sql = "SELECT id, nome, nascimento, email FROM cadastro";

$resultado = $conexao->query($sql);

$registros = [];

if ($resultado->num_rows > 0) {
    while ($registro = $resultado->fetch_assoc()) {
        $registros[] = $registro;
    }
} elseif (isset($conexao->error)) {
    echo 'Erro: ' . $conexao->error . '<br>';
}

$conexao->close();
?>

<table class="table table-striped table-bordered">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro) : ?>
            <tr>
                <td><?php echo $registro['id'] ?></td>
                <td><?php echo $registro['nome'] ?></td>
                <td><?php echo date('d/m/Y', strtotime($registro['nascimento'])) ?></td>
                <td><?php echo $registro['email'] ?></td>
                <td>
                    <a href="/exercicio.php?dir=db&file=excluir_2&excluir=<?php echo $registro['id'] ?>" 
                        class="btn btn-danger">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<style>
table > * {
    font-size: 1.2rem;
}
</style>
