<?php
    session_start();
    include_once "connDB.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){ //check email
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'"); //check exist email
            if (mysqli_num_rows($sql) > 0){ //check existed email
                echo "{$email} is already exist!";
            } else {
                if (isset($_FILES['image'])) { // check upload photo
                    $img_name = $_FILES['image']['name']; // getting user upload image name
                    $img_type = $_FILES['image']['type']; // get user upload image type
                    $tmp_name = $_FILES['image']['tmp_name']; //this tempoary name is use to save/move file in folder

                    //explode image and get the last extension of an user upload img file

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //getting the extension of user upload image

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if (in_array($img_ext, $extensions) === true) { //check image extension 
                        $time = time(); // take current time to have unique name in all image i got
                                     
                        //move the user upload image to our particular folder

                        $new_img_name = $time.$img_name;

                        if (move_uploaded_file($tmp_name, "images/".$new_img_name)) { //if user upload img move to our folder successfully
                            $status = "Active now"; //once user signup then his status will be online
                            $random_id = rand(time(), 10000000); //creting random id for user

                            //insert all user data into database
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                    VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if ($sql2) { //if these data are insert
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session,used user unique_id in other php file
                                    echo "success";
                                }
                            } else {
                                echo "Somethings went wrong!";
                            }
                        }

                    } else {
                        echo "Plese select an image!";
                    }
                } else {
                    echo "Plese select an image!";
                }
            }
        } else {
            echo "Invalid Email!";
        }
    } else {
        echo "All input field are required";
    }
?>