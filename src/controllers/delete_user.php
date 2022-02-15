<?php

session_start();
validateSession(true);

$userData = [];

if (!isset($_GET['id']) || User::getOne(['id' => $_GET['id']]) === null) {
    addMessage(MessageType::Error, 'Usuário não pode ser deletado, pois não foi encontrado na base de dados');
    header('Location: users.php');
    exit();
} elseif (isset($_POST['id'])) {
    $user = User::getOne(['id' => $_POST['id']]);

    if ($user->haveWorkingHoursRecords()) {
        WorkingHours::deleteAllUserRecords($user->id);
    }

    $user->delete();

    if ($user == $_SESSION['user']) {
        header('Location: logout.php');
    } else {
        addMessage(MessageType::Success, 'Usuário deletado com sucesso!');
        header('Location: users.php');
        exit();
    }
} else {
    $user = User::getOne(['id' => $_GET['id']]);

    $userData = $user->getValues();
    $userData['haveWorkingHoursRecords'] = $user->haveWorkingHoursRecords();
    $userData['start_date'] = formatShortDateWithLocale($userData['start_date']);
    $userData['end_date'] = $userData['end_date'] ? formatShortDateWithLocale($userData['end_date']) : 'Não informada';

    addMessage(
        MessageType::Warning,
        'Caso haja registros de horas trabalhadas, esses registros também serão apagados, 
        seja cuidadoso ao deletar um usuário.'
    );
}

loadTemplatedView('delete_user', $userData);
