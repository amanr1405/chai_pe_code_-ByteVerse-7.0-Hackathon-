<?php
    $server="localhost";
    $user="root";
    $pass= "";
    $db= "dbms";

    $conn=mysqli_connect($server,$user,$pass,$db);
    if(mysqli_connect_error()){
        die("Failed to connect to database".mysqli_connect_error());
    }
?>