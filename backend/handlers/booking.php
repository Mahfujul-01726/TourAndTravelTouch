<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

$response = ['status' => 0, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /index.html');
    exit;
}

$whereto = trim($_POST['whereto'] ?? '');
$howmany = trim($_POST['howmany'] ?? '');
$arrival = trim($_POST['arrival'] ?? '');
$leaving = trim($_POST['leaving'] ?? '');
$nameAndDetails = trim($_POST['text'] ?? '');

if ($whereto === '' || $howmany === '' || $arrival === '' || $leaving === '' || $nameAndDetails === '') {
    $response = ['status' => 1, 'message' => 'All fields are required.'];
    header('Location: /index.html');
    exit;
}

if (!bookingExists($nameAndDetails)) {
    $stmt = mysqli_prepare($connection, 'INSERT INTO information (whereto, howmany, arrival, leaving, textdata) VALUES (?, ?, ?, ?, ?)');
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $whereto, $howmany, $arrival, $leaving, $nameAndDetails);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $response = ['status' => 0, 'message' => 'Booking submitted successfully.'];
    } else {
        $response = ['status' => 1, 'message' => 'Database error. Please try again.'];
    }
} else {
    $response = ['status' => 1, 'message' => 'A booking with these details already exists.'];
}

header('Location: /index.html');
exit;
