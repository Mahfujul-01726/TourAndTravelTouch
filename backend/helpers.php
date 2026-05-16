<?php

declare(strict_types=1);

function bookingExists(string $name): bool
{
    global $connection;

    $stmt = mysqli_prepare($connection, 'SELECT textdata FROM information WHERE textdata = ?');
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) === 1;
    mysqli_stmt_close($stmt);

    return $exists;
}

function userExists(string $email): bool
{
    global $connection;

    $stmt = mysqli_prepare($connection, 'SELECT email FROM users WHERE email = ?');
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) === 1;
    mysqli_stmt_close($stmt);

    return $exists;
}
