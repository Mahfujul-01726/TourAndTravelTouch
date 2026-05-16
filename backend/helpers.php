<?php

declare(strict_types=1);

function getCsrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCsrfToken(string $token): bool
{
    return !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function setFlashMessage(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlashMessage(): ?array
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function frontendUrl(string $path = ''): string
{
    return rtrim(FRONTEND_URL, '/') . '/' . ltrim($path, '/');
}

function redirectWithFlash(string $url, string $type, string $message): void
{
    setFlashMessage($type, $message);
    header('Location: ' . frontendUrl($url));
    exit;
}

function validateDate(string $date, string $format = 'Y-m-d'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function validatePositiveInt(string $value): bool
{
    return ctype_digit($value) && (int)$value > 0;
}

function redirect(string $url): void
{
    header('Location: ' . frontendUrl($url));
    exit;
}

function bookingExists(mysqli $connection, string $name): bool
{
    $stmt = mysqli_prepare($connection, 'SELECT textdata FROM information WHERE textdata = ?');
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);

    return $exists;
}

function userExists(mysqli $connection, string $email): bool
{
    $stmt = mysqli_prepare($connection, 'SELECT email FROM users WHERE email = ?');
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);

    return $exists;
}
