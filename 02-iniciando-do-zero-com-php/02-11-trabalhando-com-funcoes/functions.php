<?php

function functionName($arg1, $arg2, $arg3)
{
    $body = [$arg1. $arg2, $arg3];
    return $body;
}

//Ordem de argumentos: 1 - obrigatórios, 2 - importântes, 3 - opcionais
function optionArgs($arg1, $arg2=true, $arg3=null)
{
    $body = [$arg1. $arg2, $arg3];
    return $body;
}

function calcImc()
{
    global $weight;
    global $height;

    return $weight / ($height * $height);
}

function payTotal($price)
{
    static $total;
    $total += $price;

    return "<p>O total a pagar é R$ ".number_format($total, "2", ",", ".")."</p>";
}

function myTeam()
{
    $teamNames = func_get_args();
    $teamCount = func_num_args();

    return[$teamNames, "count"=>$teamCount];
}