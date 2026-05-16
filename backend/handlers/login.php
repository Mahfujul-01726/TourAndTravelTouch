<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

setCorsHeaders();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/pages/login.html');
}

if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
    redirectWithFlash('/pages/login.html', 'error', 'Invalid form submission. Please try again.');
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    redirectWithFlash('/pages/login.html', 'error', 'All fields are required.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithFlash('/pages/login.html', 'error', 'Please enter a valid email address.');
}

$user = getUserByEmail($connection, $email);

if (!$user || !password_verify($password, $user['password_hash'])) {
    redirectWithFlash('/pages/login.html', 'error', 'Invalid email or password.');
}

$_SESSION['user_id'] = (int)$user['id'];
$_SESSION['user_name'] = $user['fullname'];
$_SESSION['user_email'] = $user['email'];

redirectWithFlash('/index.html', 'success', 'Welcome back, ' . $user['fullname'] . '!');
