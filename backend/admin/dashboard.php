<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

setCorsHeaders();

// Require login
if (empty($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch bookings
$bookings = [];
$bq = mysqli_query($connection, 'SELECT * FROM information ORDER BY created_at DESC');
if ($bq) {
    while ($row = mysqli_fetch_assoc($bq)) {
        $bookings[] = $row;
    }
}

// Fetch users
$users = [];
$uq = mysqli_query($connection, 'SELECT id, fullname, email, created_at FROM users ORDER BY created_at DESC');
if ($uq) {
    while ($row = mysqli_fetch_assoc($uq)) {
        $users[] = $row;
    }
}

// Stats
$totalBookings = count($bookings);
$totalUsers = count($users);
$monthBookings = 0;
$monthUsers = 0;
$firstOfMonth = date('Y-m-01');

foreach ($bookings as $b) {
    if (($b['created_at'] ?? '') >= $firstOfMonth) $monthBookings++;
}
foreach ($users as $u) {
    if (($u['created_at'] ?? '') >= $firstOfMonth) $monthUsers++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Tour And Travel Touch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background: #f4f6f9; }
        .topbar {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            color: #fff;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .topbar h2 { font-size: 20px; font-weight: 700; margin: 0; }
        .topbar h2 span { color: #ffa500; }
        .topbar .top-links { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; }
        .topbar .top-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 13px;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .topbar .top-links a:hover { color: #fff; background: rgba(255,255,255,0.1); }
        .topbar .top-links .btn-logout {
            background: rgba(255,75,75,0.15);
            color: #ff6b6b;
        }
        .topbar .top-links .btn-logout:hover { background: rgba(255,75,75,0.25); color: #ff6b6b; }
        .container-dash { max-width: 1400px; margin: 0 auto; padding: 32px 24px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.04);
        }
        .stat-card .num { font-size: 32px; font-weight: 700; color: #1a1a2e; }
        .stat-card .label { font-size: 13px; color: #888; margin-top: 4px; }
        .stat-card .icon { float: right; font-size: 28px; opacity: 0.15; }
        .stat-card.orange .num { color: #ffa500; }
        .stat-card.green .num { color: #00b894; }
        .stat-card.blue .num { color: #0984e3; }
        .stat-card.purple .num { color: #6c5ce7; }
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-title .badge-count {
            background: #ffa500;
            color: #fff;
            font-size: 12px;
            padding: 2px 10px;
            border-radius: 20px;
        }
        .table-wrap {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.04);
            margin-bottom: 40px;
            overflow-x: auto;
        }
        .table-wrap table { margin-bottom: 0; }
        .table-wrap th {
            background: #f8f9fb;
            color: #555;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            border-bottom: 1px solid #eee;
        }
        .table-wrap td {
            padding: 14px 16px;
            font-size: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }
        .table-wrap tr:hover td { background: #fafbff; }
        .empty-state { text-align: center; padding: 60px 20px; color: #999; }
        .empty-state i { font-size: 40px; margin-bottom: 12px; }
        .admin-badge {
            display: inline-block;
            background: #ffa50015;
            color: #ffa500;
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 6px;
        }
        @media (max-width: 768px) {
            .topbar { padding: 12px 16px; flex-direction: column; text-align: center; }
            .container-dash { padding: 20px 12px; }
        }
    </style>
</head>
<body>

<div class="topbar">
    <h2><span>Tour And Travel Touch</span> — Admin</h2>
    <div class="top-links">
        <a href="dashboard.php"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
        <a href="<?= frontendUrl('index.html') ?>"><i class="fa-solid fa-globe"></i> View Site</a>
        <a href="logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>

<div class="container-dash">

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card orange">
            <div class="icon"><i class="fa-solid fa-calendar-check"></i></div>
            <div class="num"><?= $totalBookings ?></div>
            <div class="label">Total Bookings</div>
        </div>
        <div class="stat-card green">
            <div class="icon"><i class="fa-solid fa-user"></i></div>
            <div class="num"><?= $totalUsers ?></div>
            <div class="label">Registered Users</div>
        </div>
        <div class="stat-card blue">
            <div class="icon"><i class="fa-solid fa-calendar-week"></i></div>
            <div class="num"><?= $monthBookings ?></div>
            <div class="label">Bookings This Month</div>
        </div>
        <div class="stat-card purple">
            <div class="icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="num"><?= $monthUsers ?></div>
            <div class="label">New Users This Month</div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="section-title">
        <i class="fa-solid fa-receipt" style="color:#ffa500;"></i> Bookings
        <span class="badge-count"><?= $totalBookings ?></span>
    </div>
    <div class="table-wrap">
        <?php if ($totalBookings > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name / Details</th>
                    <th>Destination</th>
                    <th>Travelers</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Booked At</th>
                </tr>
            </thead>
            <tbody>
                <?php $sn = 1; ?>
                <?php foreach ($bookings as $b): ?>
                <tr>
                    <td><?= $sn++ ?></td>
                    <td><?= htmlspecialchars($b['textdata'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($b['whereto'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($b['howmany'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($b['arrival'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($b['leaving'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td style="font-size:13px;color:#888;"><?= htmlspecialchars($b['created_at'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="empty-state">
            <i class="fa-solid fa-inbox"></i>
            <p>No bookings yet.</p>
        </div>
        <?php endif; ?>
    </div>

    <!-- Users Table -->
    <div class="section-title">
        <i class="fa-solid fa-users" style="color:#00b894;"></i> Registered Users
        <span class="badge-count"><?= $totalUsers ?></span>
    </div>
    <div class="table-wrap">
        <?php if ($totalUsers > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                <?php $sn = 1; ?>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $sn++ ?></td>
                    <td><?= htmlspecialchars($u['fullname'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($u['email'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td style="font-size:13px;color:#888;"><?= htmlspecialchars($u['created_at'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="empty-state">
            <i class="fa-solid fa-user-slash"></i>
            <p>No users registered yet.</p>
        </div>
        <?php endif; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
