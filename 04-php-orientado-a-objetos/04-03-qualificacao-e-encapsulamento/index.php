<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__."/classes/App/Template.php";
require __DIR__."/classes/Web/Template.php";

$appTemplate = new App\Template();
$webTemplate = new Web\Template();

echo "<pre>";
    var_dump(
        $appTemplate,
        $webTemplate,
    );
echo "</pre>";

use App\Template;
use Web\Template AS webTemplate;

$appUseTemplate = new Template();
$webUseTemplate = new webTemplate();

echo "<pre>";
var_dump(
    $appUseTemplate,
    $webUseTemplate,
    );
echo "</pre>";


/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__."/Source/Qualifield/User.php";

$user = new \Source\Qualifield\User();

//$user->firstName = "Tiago";
//$user->lastName = "Santos";

//$user->setFirstName("Tiago");
//$user->setLastName("Santos");

echo "<pre>";
var_dump(
    $user,
    get_class_methods($user)
);
echo "</pre>";

echo "O e-mail de {$user->getFirstName()} é {$user->getEmail()}";

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

//$tiago = new \Source\Qualifield\User();
$tiago = $user->setUser(
    "Tiago",
    "Santos",
    "cursos@email.com"
);

if (!$tiago){
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

$robson = new \Source\Qualifield\User();
$robson->setUser(
    "Robson",
    "Leite",
    "robsons@email.com"
);

$kaue = new \Source\Qualifield\User();
$kaue->setUser(
    "Kaue",
    "Morandi",
    "kaue@email.com"
);

echo "<pre>";
var_dump(
    $user,
    $robson,
    $kaue,
);
echo "</pre>";