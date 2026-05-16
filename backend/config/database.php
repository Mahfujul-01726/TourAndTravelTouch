<?php

declare(strict_types=1);

require_once __DIR__ . '/app.php';

configureSession();

/*
 |--------------------------------------------------------------------------
 | INFINITYFREE SETUP INSTRUCTIONS
 |--------------------------------------------------------------------------
 |
 | 1. Go to InfinityFree control panel → MySQL Databases
 | 2. Create a new database
 | 3. Copy the credentials (hostname, database name, username, password)
 | 4. Open phpMyAdmin, select your database, import database/schema.sql
 | 5. Update the 5 values below with your InfinityFree credentials
 |
 | Example InfinityFree values (replace with your own):
 |   DB_HOST = 'sqlXXX.infinityfree.com'
 |   DB_NAME = 'if0_XXXXX_firstsql'
 |   DB_USER = 'if0_XXXXX'
 |   DB_PASS = 'your_password_here'
 |
 */

define('DB_HOST', getenv('DB_HOST') ?: 'sql305.infinityfree.com');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'if0_41936508_firstsql');
define('DB_USER', getenv('DB_USER') ?: 'if0_41936508');
define('DB_PASS', getenv('DB_PASS') ?: '3a4jNkVeAq');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);

if (mysqli_connect_errno()) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(500);
    exit('A system error occurred. Please try again later.');
}

mysqli_set_charset($connection, 'utf8mb4');
