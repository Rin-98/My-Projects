<?php 
    session_start();
    include_once "connDB.php";
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = null;

    if (mysqli_num_rows($sql) == 0) {
        $output = "No one available to chat";
    } elseif (mysqli_num_rows($sql) > 0) {
        include 'data.php';
    }
    echo $output;
?>