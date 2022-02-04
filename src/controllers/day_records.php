<?php

session_start();
validateSession();

loadModel('WorkingHours');

$date = (new DateTime())->getTimestamp();
$today = $localDateTimeFmt->format($date);

loadTemplatedView('day_records', ['today' => $today]);
