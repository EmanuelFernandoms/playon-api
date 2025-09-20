<?php

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/config/session.php';

include_once "../app/classes/utils.php";

include_once "../app/database/conexao.php";

if (!isset($connection)) {
    include_once __DIR__ . "/../app/database/Database.php";
    $connection = Database::getConnection();
}

if ($_server["REQUEST_METHOD"] === "GET") {
    
} else if ($_server["REQUEST_METHOD"] === "POST") {

} else if ($_server["REQUEST_METHOD"] === "PUT") {
    
} else if ($_server["REQUEST_METHOD"] === "PATCH") {
    
} else if ($_server["REQUEST_METHOD"] === "DELETE") {
    
}