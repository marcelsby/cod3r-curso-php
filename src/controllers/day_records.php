<?php

session_start();
validateSession();

$date = new DateTime();
$today = formatDateWithMonthSpelled($date);

loadTemplatedView('day_records', ['today' => $today]);
