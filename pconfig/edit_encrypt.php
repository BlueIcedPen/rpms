<?php
    if(isset($_POST['submit'])){
        
        try{
            require_once("./config.php");
            $email = $_POST['email'];
            $first_name = $_POST['firstname'];
            $last_name =  $_POST['lastname'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            if($password === $confirm){

                // image file directory
                $target_dir = "../img/uploads/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES['image']['tmp_name']);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else{
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT user_id, salt, user_password FROM users_table WHERE user_email = :email";

                // use prepare() for preventing SQL injection
                $res = $conn->prepare($sql);
                session_start();
                $res->bindParam(':email', $_SESSION['email']);
                $res->execute();
                    if($row = $res->fetch(PDO::FETCH_ASSOC)){
                        $salt = $row['salt'];
                        $salted_password = $password . $salt;
                        $passhash = hash('sha256', $salted_password);
                        $id = $row['user_id'];
                        $p = $row['user_password'];
                        // header('Location: /');
                        $sql = "UPDATE users_table SET user_firstname = :firstname, user_lastname = :lastname, user_image = :image, user_email = :email WHERE `user_id` = :id AND user_password = :pass";
                        // $sql = "UPDATE users_table SET user_image = :image WHERE `user_id` = :id AND user_password = :pass";
                        // use exec() because no results are returned
                        $res = $conn->prepare($sql);
                        $res->bindParam(':id', $id);
                        $res->bindParam(':firstname', $first_name);
                        $res->bindParam(':lastname', $last_name);
                        $res->bindParam(':email', $email);
                        $res->bindParam(':pass', $passhash);
                        $res->bindParam(':image', $target_file);
                        $res->execute();
                        $_SESSION['status'] = 0;
                        $_SESSION['email'] = $email;
                        $_SESSION['firstname'] = $first_name;
                        $_SESSION['lastname'] = $last_name;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        header('Location: ../user/userProfile.php');
                    }
                }
            }
            
        }catch(PDOException $e){
            echo "<script type= 'text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    }
?>