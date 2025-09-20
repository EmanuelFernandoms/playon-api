<?php

require_once __DIR__ . '/../config/config.php';

$conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$conexao->set_charset("utf8mb4");

$charset = $conexao->character_set_name();