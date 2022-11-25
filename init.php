<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// global constants
define('DB_PATH', $_ENV['DB_PATH']);
define('ROOT_PATH', __DIR__);
define('APP_URL', $_ENV['APP_DOMAIN'] . '/' . $_ENV['APP_NAME']);
