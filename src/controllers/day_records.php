<?php

session_start();
validateSession();

$date = (new DateTime())->getTimestamp();
$today = $localDateTimeFmt->format($date);

loadTemplatedView('day_records', ['today' => $today]);
