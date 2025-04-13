<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Panel</title>
    <link rel="stylesheet" href="admin_dashboard_style.css">
</head>
<body>
    <?php
        require "db.php";
        session_start();

        $sql = "SELECT * FROM register WHERE type='student'";
        $result = mysqli_query($conn, $sql);
            
    ?>

    <div class="container1">
        <nav class="admin_nav">
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="schedule_task.php">Schedule Tasks</a></li>
                <li><a href="view_task.php">Completion</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="heroic">
        <?php  echo "Welcome ".$_SESSION['user'];?>
    </div>

    <div class="admin_block">
        <h2>All Student List</h2>
        <table class="records_table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Gmail</th>
                    <th>Phone No</th>
                    <th>Tasks Given</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['user']) ?></td>
                    <td><?= htmlspecialchars($row['gmail']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['task']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>