<?php

loadModel('Login');
$exception = null;

if (!empty($_POST)) {
    $login = new Login($_POST);

    try {
        $user = $login->checkLogin();
        echo "Usuário {$user->name} logado com sucesso!";
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);
