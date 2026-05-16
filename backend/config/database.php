<?php

declare(strict_types=1);

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'firstsql');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);

if (mysqli_connect_errno()) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(500);
    exit('A system error occurred. Please try again later.');
}

mysqli_set_charset($connection, 'utf8mb4');
