<?php
session_start();

require_once("../vendor/autoload.php");

use App\Core\Router;

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if(($uri === '/' || $uri === '') && !empty($_SESSION['user'])) {
    header("Location: /home");
}

Router::run();