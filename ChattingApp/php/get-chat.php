<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        include_once "connDB.php";
        $out_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $in_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = null;

        $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.unique_id = incoming_msg_id
                WHERE (outgoing_msg_id = {$out_id} AND incoming_msg_id = {$in_id})
                OR (outgoing_msg_id = {$in_id} AND incoming_msg_id = {$out_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row['outgoing_msg_id'] === $out_id) { //if it's equal,he is a sender
                    $output .= '<div class="chat out">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                } else { //or he is receiver
                    $output .= '<div class="chat in">
                                <img src="php/images/'. $row['img'] .'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
            echo $output;
        }        

    } else {
        header("../login.php");
    }
?>