<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1990-02-21");
$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2020 12:00:00");

echo "<pre>";
var_dump([
    $dateNow,
    $dateBirth,
    $dateStatic
]);
echo "</pre>";

echo "<pre>";
var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("d"),
]);
echo "</pre>";

echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")}.</p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTime = new DateTime("now", $newTimeZone);

echo "<pre>";
var_dump([
    $newTimeZone,
    $newDateTime,
    $dateNow
]);
echo "</pre>";

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

echo "<pre>";
var_dump($dateInterval);
echo "</pre>";

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);

echo "<pre>";
var_dump($dateTime);
echo "</pre>";
//Padrão de data americano: YYYY/mm/dd
$birth = new DateTime(date("Y")."-02-21");
$datenow = new DateTime("now");

$diff = $dateNow->diff($birth);

if ($diff->invert)
{
    echo "<p>Seu aniversário foi a {$diff->days} dias.</p>";
}else{
    echo "<p>faltam {$diff->days} para seu aniversário.</p>";
}

$dateResources = new DateTime("now");

echo "<pre>";
var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("10days"))->format(DATE_BR),
]);
echo "</pre>";




/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2022-01-01");

$period = new DatePeriod($start, $interval, $end);

echo "<pre>";
var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
], $period, get_class_methods($period));
echo "</pre>";


echo "<h1>A sua assinatura</h1>";
foreach ($period as $recurrences)
{
    echo "<p>Próximo vencimento".$recurrences->format(DATE_BR)."</p>";
}
