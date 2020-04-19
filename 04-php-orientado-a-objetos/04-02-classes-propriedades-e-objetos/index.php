<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);

require __DIR__."/classes/User.php";

$user = new User();

echo "<pre>";
var_dump($user);
echo "</pre>";


/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);
//Objetos: que ultiliza os recursos da classe
$user->firstName = "Tiago";
$user->lastName = "Santos";
$user->email = "tiagosantos@email.com";

echo "<p>O e-mail de {$user->firstName} é {$user->email}!</p>";

echo "<pre>";
var_dump($user);
echo "</pre>";


/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Tiago");
$user->setLastName("Santos");

if (!$user->setEmail("cursos@email.com")){
    echo "<p class='trigger error'>O e-mail {$user->email} não é válido!</p>";
}

echo "<pre>";
var_dump($user);
echo "</pre>";
