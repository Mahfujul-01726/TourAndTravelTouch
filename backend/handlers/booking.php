<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/index.html');
}

if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
    redirectWithFlash('/index.html', 'error', 'Invalid form submission. Please try again.');
}

$whereto = trim($_POST['whereto'] ?? '');
$howmany = trim($_POST['howmany'] ?? '');
$arrival = trim($_POST['arrival'] ?? '');
$leaving = trim($_POST['leaving'] ?? '');
$nameAndDetails = trim($_POST['text'] ?? '');

if ($whereto === '' || $howmany === '' || $arrival === '' || $leaving === '' || $nameAndDetails === '') {
    redirectWithFlash('/index.html', 'error', 'All fields are required.');
}

if (!validatePositiveInt($howmany)) {
    redirectWithFlash('/index.html', 'error', 'Number of travelers must be a positive number.');
}

if (!validateDate($arrival)) {
    redirectWithFlash('/index.html', 'error', 'Please enter a valid arrival date.');
}

if (!validateDate($leaving)) {
    redirectWithFlash('/index.html', 'error', 'Please enter a valid departure date.');
}

if ($arrival >= $leaving) {
    redirectWithFlash('/index.html', 'error', 'Departure date must be after arrival date.');
}

$stmt = mysqli_prepare($connection, 'INSERT INTO information (whereto, howmany, arrival, leaving, textdata) VALUES (?, ?, ?, ?, ?)');
if (!$stmt) {
    redirectWithFlash('/index.html', 'error', 'A system error occurred. Please try again.');
}

mysqli_stmt_bind_param($stmt, 'sssss', $whereto, $howmany, $arrival, $leaving, $nameAndDetails);

if (mysqli_stmt_execute($stmt)) {
    redirectWithFlash('/index.html', 'success', 'Booking submitted successfully! We will contact you soon.');
}

redirectWithFlash('/index.html', 'error', 'Booking failed. Please try again.');
