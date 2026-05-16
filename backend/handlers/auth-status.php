<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

setCorsHeaders();

header('Content-Type: application/json');

if (isUserLoggedIn()) {
    echo json_encode([
        'loggedIn' => true,
        'user' => [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
        ],
    ]);
} else {
    echo json_encode(['loggedIn' => false]);
}
