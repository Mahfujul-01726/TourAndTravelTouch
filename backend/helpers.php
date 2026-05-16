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

function getUserByEmail(mysqli $connection, string $email): ?array
{
    $stmt = mysqli_prepare($connection, 'SELECT id, fullname, email, password_hash FROM users WHERE email = ?');
    if (!$stmt) {
        return null;
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    return $user ?: null;
}

function isUserLoggedIn(): bool
{
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0;
}

function getLoggedInUser(): ?array
{
    if (!isUserLoggedIn()) {
        return null;
    }

    return [
        'id' => $_SESSION['user_id'],
        'name' => $_SESSION['user_name'] ?? '',
        'email' => $_SESSION['user_email'] ?? '',
    ];
}

function requireLogin(): void
{
    if (!isUserLoggedIn()) {
        redirectWithFlash('/pages/login.html', 'error', 'Please log in first to make a booking.');
    }
}

function ensureBookingUserColumn(mysqli $connection): void
{
    $result = mysqli_query($connection, "SHOW COLUMNS FROM information LIKE 'user_id'");
    if (mysqli_num_rows($result) === 0) {
        mysqli_query($connection, "ALTER TABLE information
            ADD COLUMN user_id INT DEFAULT NULL AFTER textdata,
            ADD COLUMN user_name VARCHAR(255) DEFAULT NULL AFTER user_id,
            ADD COLUMN user_email VARCHAR(255) DEFAULT NULL AFTER user_name,
            ADD INDEX idx_user_id (user_id),
            ADD INDEX idx_user_email (user_email)");
    }
}
