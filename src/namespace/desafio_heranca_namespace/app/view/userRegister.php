<?php

namespace App\View;

require_once(__DIR__ . '/../controller/UsuarioController.php');

use App\Controller\UsuarioController;

?>

<div class="titulo">Desafio Herança Namespace</div>

<form action="#" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">
    <label for="nome">Idade:</label>
    <input type="number" name="idade" id="idade">
    <label for="nome">Login:</label>
    <input type="text" name="login" id="login">
    <button>Registrar</button>
</form>

<?php

$usuarioController = new UsuarioController();

function exibirResultado(string $mensagem)
{
    if (isset($mensagem)) {
        echo $mensagem;
    }
}

if (isset($_POST['nome'], $_POST['idade'], $_POST['login'])) {
    $msg = $usuarioController->registrar($_POST['nome'], $_POST['idade'], $_POST['login']);

    exibirResultado($msg);
}
