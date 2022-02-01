<?php

session_start();
requireValidSession();

loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = date('H:i:s');
    $records->clockIn($currentTime);
    addMessage(MessageType::Success, 'Ponto inserido com sucesso!');
} catch (AppException $e) {
    addMessage(MessageType::Success, $e->getMessage());
}

header('Location: day_records.php');
