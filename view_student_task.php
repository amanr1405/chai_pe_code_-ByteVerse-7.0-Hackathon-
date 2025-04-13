<?php
require "db.php"; // Include the database connection
session_start(); // Start the session

// Check if the student is logged in
if (!isset($_SESSION['user'])) {
    echo "Session not set. Please login.";
    exit();
}

$studentName = $_SESSION['user']; // Get the student name from session

// SQL query to get tasks assigned to this student
$sql = "SELECT id, faculty, task, deadline FROM data WHERE student = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studentName);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="view_student_task.css">
</head>
<body>

<!-- Navigation Menu -->
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

<!-- Task List Table -->
<div>
    <h2>Your Assigned Tasks</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Faculty</th>
                <th>Task</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['faculty']) ?></td>
                    <td><?= htmlspecialchars($row['task']) ?></td>
                    <td><?= htmlspecialchars($row['deadline']) ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No tasks assigned yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
