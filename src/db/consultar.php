<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<div class="titulo">Consultar Registros</div>

<?php
require_once 'conexao.php';

$sql = "SELECT id, nome, nascimento, email FROM cadastro";

$conexao = novaConexao();

$resultado = $conexao->query($sql);

$registros = [];

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif ($conexao->error) {
    echo 'Erro: ' . $conexao->error . '<br>';
}

// print_r($registros);

$conexao->close();
?>

<table class="table table-striped table-bordered">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro) : ?>
            <tr>
                <td><?php echo $registro['id'] ?></td>
                <td><?php echo $registro['nome'] ?></td>
                <td>
                    <?php echo date('d/m/Y', strtotime($registro['nascimento'])) ?>
                </td>
                <td><?php echo $registro['email'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<style>
    table > * {
        font-size: 1.2rem;
    }
</style>
