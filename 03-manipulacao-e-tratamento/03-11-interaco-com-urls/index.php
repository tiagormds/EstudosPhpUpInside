<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1> <a href='http://localhost/03-manipulacao-e-tratamento/03-11-interaco-com-urls/index.php'>Clear</a> </h1>";
echo "<p> <a href='http://localhost/03-manipulacao-e-tratamento/03-11-interaco-com-urls/index.php?arg1=true&arg2=true'>Argumentos</a> </p>";

$data = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "robson@upinside.com",
];

$arguments = http_build_query($data);
echo "<p><a href='index.php?{$arguments}'>Args by Array</a></p>";

echo "<pre>";
var_dump($_GET);
echo "</pre>";

$object = (object)$data;

echo "<pre>";
var_dump([
    $object,
    http_build_query($object)
]);
echo "</pre>";


/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataFilter = http_build_query([
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com",
    "site" => "upinside.com.br",
    "script" => "<script>alert('Esse é um JavaScript')</script>",
]);

echo "<p><a href='index.php?{$dataFilter}'>Data Filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

if ($dataUrl) {
    if (in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam Dados!</p>";
    } elseif (empty($dataUrl["mail"])) {
        echo "<p class='trigger warning'>Falta o email!</p>";
    } elseif (!filter_var($dataUrl["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>email inválido!</p>";
    }else{
        echo "<p class='trigger accept'>Tudo certo!</p>";
    }
} else {
    echo "<pre>";
    var_dump(false);
    echo "</pre>";
}


echo "<pre>";
var_dump($dataUrl);
echo "</pre>";

$dataFilter = http_build_query([
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com",
    "site" => "htt://www.upinside.com.br",
    "script" => "<script>alert('Esse é um JavaScript')</script>",
]);

parse_str($dataFilter, $arrDataFilter);
echo "<pre>";
var_dump($arrDataFilter);
echo "</pre>";

$dataPreFilter = http_build_query([
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRING,
]);

echo "<pre>";
var_dump(filter_var_array($arrDataFilter, $dataPreFilter));
echo "</pre>";





