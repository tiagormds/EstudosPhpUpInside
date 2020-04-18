<?php
//session_start();
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

setcookie("fsphp", "Esse é meu cookie", time() + 60);
//setcookie("fsphp", null, time() - 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);
echo "<pre>";
var_dump(
    $_COOKIE,
    $cookie,
);
echo "</pre>";

$time = time() + 60 +60 *24 *7;
$user = [
    "user" => "root",
    "password" => "1234",
    "expire" => $time,
];

setcookie(
    "fslogin",
    http_build_query($user),
    $time,
    "/",
    "www.localhost",
    TRUE
);

$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

if ($login){
    echo "<pre>";
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
    echo "</pre>";
}


/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

session_save_path(__DIR__."/ses");
session_start([
    "cookie_lifetime" => (60 + 60 * 24),
]);

echo "<pre>";
var_dump($_SESSION,
[
    "id"=>session_id(),
    "name"=>session_name(),
    "status"=>session_status(),
    "save_path"=>session_save_path(),
    "cookie"=>session_get_cookie_params(),
]);
echo "</pre>";


//$_SESSION['login'] = (object)$user;
//$_SESSION['user'] = $user;

session_destroy();

var_dump($_SESSION);


