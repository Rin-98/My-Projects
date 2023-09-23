<?php
    include_once "connDB.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = null;

     // getting API for search a user
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");
    if (mysqli_num_rows($sql) > 0) {
        include "data.php";
    } else {
        $output = "There is no one";
    }
    echo $output;
?>