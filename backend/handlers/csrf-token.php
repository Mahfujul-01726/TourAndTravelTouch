<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

header('Content-Type: application/json');
echo json_encode(['token' => getCsrfToken()]);
