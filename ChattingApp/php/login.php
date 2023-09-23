<?php
    session_start();
    include_once "connDB.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {

        //check users entered email and password matched to database 
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if (mysqli_num_rows($sql) > 0) {  // if users info match
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id']; // using this session,used user unique_id in other php file
            echo "success";
        } else {
            echo "Wrong info!Try again";
        }
    } else {
        echo "Need to write something!!!!!!";
    }
?>