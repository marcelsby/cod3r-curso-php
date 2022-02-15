<?php

session_start();
validateSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = date('H:i:s');

    $records->clockIn($currentTime);
    addMessage(MessageType::Success, 'Ponto inserido com sucesso!');
} catch (AppException $e) {
    addMessage(MessageType::Error, $e->getMessage());
}

header('Location: day_records.php');
