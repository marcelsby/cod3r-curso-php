<?php

function getDateAsDateTime($date)
{
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date)
{
    $inputDate = getDateAsDateTime($date);

    return $inputDate->format('N') >= 6;
}

function isPast($date1, $date2)
{
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);

    return $inputDate1 <= $inputDate2;
}

function getNextDay($date)
{
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');

    return $inputDate;
}

function sumIntervals($interval1, $interval2)
{
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);

    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1, $interval2)
{
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);

    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval)
{
    return new DateTimeImmutable($interval->format('%H:%i:%S'));
}

function getDateFromString($str)
{
    return DateTimeImmutable::createFromFormat('H:i:s', $str);
}

function getSecondsFromDateInterval($interval)
{
    $d1 = new DateTimeImmutable();
    $d2 = $d1->add($interval);
    return $d2->getTimestamp() - $d1->getTimestamp();
}

function getFirstDayOfMonth($date)
{
    $time = getDateAsDateTime($date)->getTimestamp();

    return new DateTime(date('Y-m-1', $time));
}

function getLastDayOfMonth($date)
{
    $time = getDateAsDateTime($date)->getTimestamp();

    return new DateTime(date('Y-m-t', $time));
}

function isPastWorkday($date)
{
    return !isWeekend($date) && isPast($date, new DateTime());
}

function getTimeStringFromSeconds($seconds)
{
    $isNegative = $seconds < 0;
    $absoluteSeconds = abs($seconds);

    $h = intdiv($absoluteSeconds, 3600);
    $m = intdiv(($absoluteSeconds % 3600), 60);
    $s = ($absoluteSeconds % 60);

    $timeString = $isNegative
        ? '-' . sprintf('%02d:%02d:%02d', $h, $m, $s)
        : '+' . sprintf('%02d:%02d:%02d', $h, $m, $s) ;

    return $timeString;
}

// TODO: refatorar estas (monstruosidades) funções de formatação de data
function formatShortDateWithLocale(string | DateTime $date)
{
    $fmt = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        null,
        null,
        'dd/MM/yyyy'
    );

    $date = getDateAsDateTime($date);

    return $fmt->format($date);
}

function formatDateWithMonthSpelled(string | DateTime $date)
{
    $fmt = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
    );

    $date = getDateAsDateTime($date);

    return $fmt->format($date);
}

function formatDateWithDayAndMonthSpelled(string | DateTime $date)
{
    $fmt = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
    );

    $date = getDateAsDateTime($date);

    return ucfirst($fmt->format($date));
}

function formatDateWithYearAndMonth(string | DateTime $date)
{
    $fmt = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        null,
        null,
        "MMMM 'de' yyyy"
    );

    $date = getDateAsDateTime($date);

    return ucfirst($fmt->format($date));
}
