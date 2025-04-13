<?php
require "db.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    echo "Session not set. Please login.";
    exit();
}

$facultyName = $_SESSION['user'];

// Use a prepared statement to prevent SQL injection
$sql = "SELECT id, student, filedata FROM files WHERE faculty = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $facultyName);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Panel</title>
    <link rel="stylesheet" href="view_task.css">
</head>
<body>

<!-- Navigation Menu -->
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

<!-- Task List Table -->
<div>
    <h2>Your Student List</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Task Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['student']) ?></td>
                    <td>
                        <?php if (!empty($row['filedata'])): ?>
                            <!-- Show checkmark if file is uploaded -->
                            ✅ Uploaded
                        <?php else: ?>
                            <!-- Show Pending if file is not uploaded -->
                            ❌ Pending
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="3">No student uploads found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
