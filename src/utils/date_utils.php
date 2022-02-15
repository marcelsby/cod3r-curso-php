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

function getTimeStringFromSecondsWithSign($seconds)
{
    $isNegative = $seconds < 0;
    $absoluteSeconds = abs($seconds);

    $h = intdiv($absoluteSeconds, 3600);
    $m = intdiv(($absoluteSeconds % 3600), 60);
    $s = ($absoluteSeconds % 60);

    return $isNegative ? sprintf('-%02d:%02d:%02d', $h, $m, $s) : sprintf('+%02d:%02d:%02d', $h, $m, $s);
}

function getTimeStringFromSeconds($seconds)
{
    $absoluteSeconds = abs($seconds);

    $h = intdiv($absoluteSeconds, 3600);
    $m = intdiv(($absoluteSeconds % 3600), 60);
    $s = ($absoluteSeconds % 60);

    return sprintf('%02d:%02d:%02d', $h, $m, $s);
}

enum DateFormat : string
{
    case Short = 'dd/MM/y';
    case Long = "dd 'de' MMMM 'de' y";
    case Full = "EEEE',' d 'de' MMMM 'de' y";
    case MonthAndYear = "MMMM 'de' yyyy";
    case CustomPattern = '';
}

/**
 * Formats the passed date to the pt_BR locale, as defined in config.php, and returns it as a string.
 *
 * @param DateFormat $format
 * A DateFormat enum that specifies the format that the date will be outputed, it can assume these following values:
 * DateFormat::Short -> 'dd/MM/y' (e.g. '15/02/2022'),
 * DateFormat::Long -> "dd 'de' MMMM 'de' y" (e.g. '15 de fevereiro de 2022'),
 * DateFormat::Full -> "EEEE',' d 'de' MMMM 'de' y" (e.g. 'Terça-feira, 15 de fevereiro de 2022'),
 * DateFormat::MonthAndYear -> "MMMM 'de' yyyy" (e.g. 'Fevereiro de 2022'),
 * DateFormat::CustomPattern -> Use this if you want format to a custom pattern,
 * if using this you will need set the $pattern parameter, otherwise the function will return FALSE.
 *
 * @param DateTime|string $date
 * The date that will be formatted, inside the function this parameter
 * will be transformed into a DateTime object, if it isn't yet.
 *
 * @param null|string $pattern
 * The pattern that will be used to format the given $date. To know more how to pass valid patterns, access
 * the @link in this PHPDoc. If it's invalid the function will return false.
 *
 * @return string|false
 * Returns the formatted string or false in case of formatting failure.
 *
 * @link https://unicode-org.github.io/icu/userguide/format_parse/datetime/#date-field-symbol-table
 */
function formatDate($format, $date = new DateTime(), $pattern = null)
{
    $fmt = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        null,
        null,
    );

    $date = getDateAsDateTime($date);
    $pattern = $format === DateFormat::CustomPattern ? $pattern : $format->value;

    return $fmt->setPattern($pattern) ? ucfirst($fmt->format($date)) : false;
}
