<div class="titulo">Desafio Herança Include</div>

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

$usuarioService = require_once('UsuarioService.php');

if (isset($_POST['nome'], $_POST['idade'], $_POST['login'])) {
    $nomeRecebido = trim($_POST['nome']);
    $idadeRecebida = $_POST['idade'] < 1 ? false : $_POST['idade'];
    $loginRecebido = trim($_POST['login']);

    if (empty($nomeRecebido) || empty($idadeRecebida) || empty($loginRecebido)) {
        echo 'Verifique os dados inseridos e tente novamente.<br>';
    } else {
        $novoUsuario = $usuarioService->registrarUsuario($nomeRecebido, $idadeRecebida, $loginRecebido);
        echo 'Parabéns seu usuário foi registrado!<br>';
        $usuarioService->exibirUsuario($novoUsuario);
    }
}
