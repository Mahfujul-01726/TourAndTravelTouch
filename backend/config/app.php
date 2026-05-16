<?php

declare(strict_types=1);

/*
 |--------------------------------------------------------------------------
 | APPLICATION CONFIGURATION
 |--------------------------------------------------------------------------
 |
 | FRONTEND_URL: Your GitHub Pages (or any frontend) URL.
 |   This is where PHP will redirect the browser after form processing.
 |   Update this to your actual frontend URL.
 |
 | BACKEND_URL: Used by JS config on the frontend.
 |   Defined here as documentation; the actual JS value is in assets/js/config.js
 |
 */

define('FRONTEND_URL', getenv('FRONTEND_URL') ?: 'https://tourandtraveltouch.great-site.net');

function setCorsHeaders(): void
{
    $origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
    $allowedOrigins = [
        'https://tourandtraveltouch.great-site.net',
        'https://mahfujul-01726.github.io',
        'http://localhost:8000',
        'http://localhost',
    ];

    if (in_array($origin, $allowedOrigins, true)) {
        header('Access-Control-Allow-Origin: ' . $origin);
    } else {
        header('Access-Control-Allow-Origin: https://tourandtraveltouch.great-site.net');
    }

    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(204);
        exit;
    }
}

function configureSession(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
            'httponly' => true,
            'samesite' => 'None',
        ]);
        session_start();
    }
}
