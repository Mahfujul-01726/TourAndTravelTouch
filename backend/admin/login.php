<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers.php';

setCorsHeaders();

$error = '';

// Auto-create default admin if table is empty
$check = mysqli_query($connection, 'SELECT COUNT(*) AS cnt FROM admins');
$row = mysqli_fetch_assoc($check);
if ((int)$row['cnt'] === 0) {
    $hash = password_hash('admin123', PASSWORD_BCRYPT, ['cost' => 12]);
    mysqli_query($connection, "INSERT INTO admins (username, password_hash) VALUES ('admin', '$hash')");
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } else {
        $stmt = mysqli_prepare($connection, 'SELECT id, password_hash FROM admins WHERE username = ?');
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $username;
            header('Location: dashboard.php');
            exit;
        }

        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Tour And Travel Touch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
        }
        .login-card h1 {
            color: #fff;
            font-weight: 700;
            font-size: 28px;
            text-align: center;
            margin-bottom: 8px;
        }
        .login-card h1 span { color: #ffa500; }
        .login-card .sub {
            color: rgba(255,255,255,0.5);
            text-align: center;
            margin-bottom: 32px;
            font-size: 14px;
        }
        .login-card .form-control {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 14px 16px;
            color: #fff;
            font-size: 15px;
            margin-bottom: 16px;
        }
        .login-card .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .login-card .form-control:focus {
            border-color: #ffa500;
            box-shadow: 0 0 0 3px rgba(255,165,0,0.15);
            background: rgba(255,255,255,0.08);
        }
        .login-card .btn-login {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #ffa500, #ff7b00);
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            margin-top: 8px;
        }
        .login-card .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,165,0,0.3);
        }
        .alert {
            border-radius: 12px;
            font-size: 14px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }
        .back-link {
            text-align: center;
            margin-top: 24px;
        }
        .back-link a {
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
        }
        .back-link a:hover { color: #ffa500; }
        .lock-icon {
            text-align: center;
            font-size: 48px;
            color: #ffa500;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="lock-icon"><i class="fa-solid fa-lock"></i></div>
        <h1><span>Admin</span> Login</h1>
        <p class="sub">Manage bookings &amp; users</p>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In</button>
        </form>

        <div class="back-link">
            <a href="<?= frontendUrl('index.html') ?>"><i class="fa-solid fa-arrow-left"></i> Back to website</a>
        </div>
    </div>
</body>
</html>
