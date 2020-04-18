<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
  "AC/DC",
  "Nirvana",
  "Alter Bridge"
];

$assoc = [
    "banda_1"=>"AC/DC",
    "banda_2"=>"Nirvana",
    "banda_3"=>"Alter Bridge"
];

array_unshift($index, "", "Pearl Jam");
$assoc = ["band_4"=>"Pearl Jam", "band_5"=>""] + $assoc;

array_push($index, "");
$assoc = $assoc + ["band_6"=>""];

array_shift($index);
array_shift($assoc);

array_pop($index);
array_pop($assoc);

array_unshift($index, "");

$index = array_filter($index);
$assoc = array_filter($assoc);

echo "<pre>";
var_dump([
    $index,
    $assoc
]);
echo "</pre>";


/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index);
$assoc = array_reverse($assoc);

asort($index);
asort($assoc);

ksort($index);
krsort($index);

sort($index);
rsort($index);

echo "<pre>";
var_dump([
    $index,
    $assoc
]);
echo "</pre>";


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

echo "<pre>";
var_dump([
    array_keys($assoc),
    array_values($assoc)
]);
echo "</pre>";

if (in_array("AC/DC", $assoc))
{
    echo "<p>Cause I`am back!</p>";
}

$arrToString = implode(", ", $assoc);
echo "<p>Eu curto {$arrToString} e muitas outras!</p>";
echo "<p>{$arrToString}</p>";

echo "<pre>";
var_dump(explode(", ", $arrToString));
echo "</pre>";


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);


$profile = [
    "name"=>"Robson",
    "company"=>'UpInside',
    "mail"=>"cursos@upinside.com.br"
];

$template = <<<TPL
    <article>
    <h1>{{name}}</h1>
    <p>{{company}}<br />
    <a href="mailto:{{mail}}" title="Enviar e-mail para {{name}}">Enviar E-mail</a></p>
</article>
TPL;

echo $template;

echo str_replace(
    array_keys($profile), array_values($profile), $template
);

$replaces = "{{".implode("}}&{{", array_keys($profile))."}}";

//echo "<pre>";
//var_dump(explode("&", $replaces));
//echo "</pre>";

echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);