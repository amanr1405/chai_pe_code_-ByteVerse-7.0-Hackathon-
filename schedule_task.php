<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scheduled_task.css">
    <title>Edit Records</title>
</head>
<body>
<?php
require('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $student = $_POST['student'];
    $faculty = $_POST['faculty'];
    $task = $_POST['task'] ;
    $date = $_POST['date'] ;
    $sql= "INSERT INTO data (id,student,faculty,task,deadline) VALUES ('$id', '$student','$faculty','$task','$date')";
    $result = mysqli_query($conn,$sql);
    header("Location: schedule_task.php");
}
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


<div class="admin_block">
    <div class="insert">
    <h2>Provide Task</h2><br>
    <form method="post">
        <input name="id" placeholder="Student ID" required>
        <input name="student" placeholder="Student Name" required>
        <input name="faculty" placeholder="Your Name" required>
        <textarea name="task" placeholder="Enter the Task" required></textarea>
        <input type="date" name="date" placeholder="Deadline" required></in>
        <button type="submit">Schedule Task</button>
    </form>
    </div>
</div>

</body>
</html>