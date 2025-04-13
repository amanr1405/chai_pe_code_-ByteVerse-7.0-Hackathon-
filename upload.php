<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Task</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>

<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // user entered ID
    $student = $_POST['student'];
    $faculty = $_POST['faculty'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileTmp = $_FILES['uploadedFile']['tmp_name'];
    $fileData = file_get_contents($fileTmp);

    $stmt = $conn->prepare("INSERT INTO files (id, student, faculty, filename, filedata) VALUES (?, ?, ?, ?, ?)");
    $null = NULL; // placeholder for BLOB
    $stmt->bind_param("isssb", $id, $student, $faculty, $fileName, $null);
    $stmt->send_long_data(4, $fileData);

    if ($stmt->execute()) {
        echo "✅ File uploaded successfully!";
    } else {
        echo "❌ Upload failed: " . $stmt->error;
    }
}
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
    </di>

<div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Enter ID:</label><br>
        <input type="number" name="id" required><br><br>

        <label>Your Name:</label><br>
        <input type="text" name="student" required><br><br>

        <label>Faculty Name:</label><br>
        <input type="text" name="faculty" required><br><br>

        <label>Select file to upload:</label><br>
        <input type="file" name="uploadedFile" required><br><br>

        <button type="submit" name="submit">Upload</button>
    </form>
</div>

</body>
</html>
