<?php

session_start();
validateSession(true);

$exception = null;
$userData = [];

if (isset($_GET['update']) && empty($_POST)) {
    $user = User::getOne(['id' => $_GET['update']]);
    $userData = $user->getValues();
    $userData['password'] = null;
} elseif (!empty($_POST)) {
    try {
        $dbUser = new User($_POST);

        if ($dbUser->id) {
            $dbUser->update();
            addMessage(MessageType::Success, 'Usuário atualizado com sucesso!');
            header('Location: users.php');
            exit();
        } else {
            $dbUser->insert();
            addMessage(MessageType::Success, 'Usuário cadastrado com sucesso!');
        }

        $_POST = [];
    } catch (Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}

loadTemplatedView('save_user', $userData + ['exception' => $exception]);
