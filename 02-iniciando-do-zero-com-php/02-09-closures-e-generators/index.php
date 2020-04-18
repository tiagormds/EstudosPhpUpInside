<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function ($year) {
    $age = date("Y") - $year;
    return "Você tem {$age} anos!";
};

echo $myAge(1990);

$priceBrl = function ($price){
    return number_format($price, 2, ",", ".");
};

echo "<p>O Projeto custa: R$ {$priceBrl(3600)}. Vamos fechar?</p>";

$myCart = [];
$myCart["totalPrice"] = 0;
$cartAdd = function ($item, $qtd, $price) use (&$myCart){
    $myCart[$item] = $qtd * $price;
    $myCart["totalPrice"] += $myCart[$item];
};

$cartAdd("HTML5", 1, 497);
$cartAdd("jQuery", 2, 497);

var_dump($myCart, $cartAdd);
/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$iterator = 4000000;

function showDate ($days){
    $saveDate = [];
    for ($day = 1; $day < $days; $day++){
        $saveDate[] = date("d/m/Y", strtotime("+{$day}days"));
    }

    return $saveDate;
}

echo "<div>";
foreach (showDate(0) as $date){
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";

function generatordate($days){
    for ($day = 1; $day < $days; $day++){
        yield date("d/m/Y", strtotime("+{$day}days"));
    }
}

echo "<div>";
foreach (generatordate($iterator) as $date){
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";


