<?php
    require "db.php";
    session_start();
    $message = "";
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $user=$_POST['user'];
            $pass=$_POST['pass'];

            $sql="SELECT * FROM register WHERE user=? AND password=?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $_SESSION['user'] = $user;
                    header("Location: admin_dashboard.php");
                    exit();
                } 
                else {
                    $message= "Invalid Credentials";
                }
            }


        }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="admin_login_style.css">
</head>
<body>
    <div class="container">
        <div class="inner_container">
            <?php if(!empty($message)): ?>
            <p class="msg"><?php echo $message; ?><br></p>
            <?php endif; ?>
            <h3>Login</h3>
            <form action="admin_login.php" method="post">
                <input type="text" placeholder="Username" name="user"><br><br>
                <input type="password" placeholder="Password" name="pass"><br><br>
                <button type="submit">Submit</button><br><br>
            </form>
            <h3>Build your Account! <a href="register.php">Register</a></h3>
        </div>
    </div>
</body>
</html>