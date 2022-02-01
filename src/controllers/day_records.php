<?php

session_start();
requireValidSession();

loadModel('WorkingHours');

$date = (new DateTime())->getTimestamp();
$today = $localDateTimeFmt->format($date);

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

loadTemplatedView('day_records', [
    'today' => $today,
    'records' => $records
]);
