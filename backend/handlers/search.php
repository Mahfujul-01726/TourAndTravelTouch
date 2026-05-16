<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['search'])) {
    header('Location: /index.html');
    exit;
}

$searchTerm = trim($_POST['search']);
$results = [];

$stmt = mysqli_prepare($connection, 'SELECT * FROM information WHERE textdata LIKE ?');
if ($stmt) {
    $likeParam = '%' . $searchTerm . '%';
    mysqli_stmt_bind_param($stmt, 's', $likeParam);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Tour And Travel Touch</title>
    <link rel="stylesheet" href="/assets/css/theme-orange.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 40px 20px; background: #f9f9f9; }
        .container { max-width: 900px; margin: 0 auto; }
        h2 { text-align: center; margin-bottom: 30px; }
        .nav-links { text-align: center; margin-bottom: 20px; }
        .nav-links a { margin: 0 10px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #ffa500; color: white; }
        tr:hover { background: #f5f5f5; }
        .no-data { text-align: center; padding: 40px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Search Results</h2>
        <div class="nav-links">
            <a href="/index.html" class="btn btn-primary">Home</a>
            <a href="/index.html" class="btn btn-secondary">New Search</a>
        </div>

        <?php if (count($results) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Where To</th>
                        <th>How Many</th>
                        <th>Arrival</th>
                        <th>Leaving</th>
                        <th>Name & Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sn = 1; ?>
                    <?php foreach ($results as $data): ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= htmlspecialchars($data['whereto'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($data['howmany'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($data['arrival'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($data['leaving'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($data['textdata'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">
                <p>No bookings found for "<?= htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8') ?>"</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
