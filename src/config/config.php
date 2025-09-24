<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

// defines
define('DEBUG_MODE', true);
define('BASE_URL', (!empty($_ENV['BASE_URL'])) ? $_ENV['BASE_URL'] : getenv("BASE_URL"));
define('API_URL', (!empty($_ENV['API_URL'])) ? $_ENV['API_URL'] : getenv("API_URL"));
define('APP_ENV', (!empty($_ENV['APP_ENV'])) ? $_ENV['APP_ENV'] : getenv("APP_ENV"));

// set config (database)
define('DB_HOST', (!empty($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : getenv("DB_HOST"));
define('DB_USER', (!empty($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : getenv("DB_USER"));
define('DB_PASSWORD', (!empty($_ENV['DB_PASSWORD'])) ? $_ENV['DB_PASSWORD'] : getenv("DB_PASSWORD"));
define('DB_NAME', (!empty($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : getenv("DB_NAME"));

// set config (emal)
define('EMAIL', (!empty($_ENV['EMAIL'])) ? $_ENV['EMAIL'] : getenv("EMAIL"));
define('EMAIL_PASSWORD', (!empty($_ENV['EMAIL_PASSWORD'])) ? $_ENV['EMAIL_PASSWORD'] : getenv("EMAIL_PASSWORD"));