<?php
    require "db.php";
    $message = "";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $user=$_POST['user'];
        $gmail=$_POST['gmail'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        $phone=$_POST['phone'];
        $type=$_POST['type'];
        $captcha=$_POST['captcha'];

        if($cpass!==$pass)
        {
            $message= "Confirm your password";
        }

        elseif($captcha!=='13AP25')
        {
            $message= "Invalid Captcha";
        }

        else
        {
            $sql="INSERT INTO register (`user`, `password`, `gmail`, `type`, `phone`, `date`)VALUES ('$user', '$pass', '$gmail', '$type', '$phone', CURRENT_TIMESTAMP);";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                if($type=='faculty'){
                    header("Location: admin_login.php");
                    exit();
                }
            else{
                    header("Location:student_login.php");
                    exit();
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registeration</title>
</head>
<body>
    <div class="container">
        
        <div class="inner_container">
        <h2>Register</h2>
            <?php if(!empty($message)): ?>
            <p class="msg"><?php echo $message; ?><br></p>
            <?php endif; ?>
            <form action="register.php" method="post">
            <input type="text" placeholder="Username" name="user"><br><br>
            <input type="text" placeholder="Gmail ID" name="gmail"><br><br>
            <input type="radio" name="type" value="faculty">
            <label for="html">Faculty</label><br><br>
            <input type="radio" name="type" value="student">
            <label for="css">Student</label><br><br>
            <input type="password" placeholder="Password" name="pass"><br><br>
            <input type="password" placeholder="Confirm Password" name="cpass"><br><br>
            <input type="number" placeholder="Phone No." name="phone"><br><br>
            <div class="captcha">
                <h5>13AP25</h5>
            </div>
            <input type="text" placeholder="Captcha" name="captcha"><br><br>
            <button type="submit">Submit</button><br><br>
            </form>
            <h3>Already had an account?<a href="login.php">Login</a></h3>
        </div>
    </div>
</body>
</html>