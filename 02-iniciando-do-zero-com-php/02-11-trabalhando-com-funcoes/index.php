<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__."/functions.php";

//Escopo da função onde todos os dados são obrigatórios.
var_dump(functionName("Pearl Jam", "AC/DC", "Alter Bridge"));
var_dump(functionName("Robson", "Kaue", "Gustavo"));

//Escopo da função definindo as prioridades dos dados.
var_dump(optionArgs("Robson"));
var_dump(optionArgs("Robson", "Kaue"));
var_dump(optionArgs("Robson", "Kaue", "Gustavo"));


/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 86;
$height = 1.83;

echo calcImc();


/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = payTotal(200);
$pay = payTotal(150);
$pay = payTotal(25);
echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("kaue", "Gustavo", "Gah", "João"));