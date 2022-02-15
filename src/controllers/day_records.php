<?php

session_start();
validateSession();

$today = formatDate(DateFormat::Long);

loadTemplatedView('day_records', ['today' => $today]);
