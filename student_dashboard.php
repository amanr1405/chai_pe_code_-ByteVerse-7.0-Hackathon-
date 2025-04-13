<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_dashboard.css">
    <title>Student Panel</title>
</head>
<body>
    <?php
        require "db.php";
        session_start();

        $name=$_SESSION['user'];

        $sql = "SELECT faculty,task,deadline FROM data WHERE student='$name'";
        $result = mysqli_query($conn, $sql);
            
    ?>

    <div class="container1">
        <nav class="admin_nav">
            <ul>
                <li><a href="student_dashboard.php">Dashboard</a></li>
                <li><a href="upload.php">Upload Tasks</a></li>
                <li><a href="view_student_task.php">View Tasks</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="heroic">
        <?php  echo "Welcome ".$_SESSION['user'];?>
    </div>

    <div class="admin_block">
        <h2>Task Alloted</h2>
        <table class="records_table">
            <thead>
                <tr>
                    <th>Faculty</th>
                    <th>Tasks Given</th>
                    <th>Deadline</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['faculty']) ?></td>
                    <td><?= htmlspecialchars($row['task']) ?></td>
                    <td><?= htmlspecialchars($row['deadline']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>