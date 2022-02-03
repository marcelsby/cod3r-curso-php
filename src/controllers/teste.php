<?php

// Controller temporário

loadModel('WorkingHours');

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));

echo 'Tempo trabalhado: ';
$workedIntervalString = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($workedIntervalString);
echo '<br>';

echo 'Tempo de almoço: ';
$lunchIntervalString = $wh->getLunchInterval()->format('%H:%I:%S');
print_r($lunchIntervalString);
echo '<br>';

echo 'Horário de saída: ';
print_r($wh->getExitTime()->format('H:i:s'));
echo '<br>';
