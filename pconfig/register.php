<?php
    if(isset($_POST['reg_submit'])){
        
        try{
            require_once("config.php");
            $email = $_POST['user_reg_email'];
            $first_name = $_POST['user_reg_firstname'];
            $last_name =  $_POST['user_reg_lastname'];
            $passport = $_POST['user_phone'];
            $password = $_POST['user_reg_pass'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid e-mail address.\n";
                exit;
            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT user_email FROM users_table WHERE user_email = :email";
            // use prepare() for preventing SQL injection
            $res = $conn->prepare($sql);
            $res->bindParam(':email', $email);
            $res->execute();
            if($row = $res->fetch(PDO::FETCH_ASSOC)){
                // header('Location: /');
                echo "<script type= 'text/javascript'>alert('User already exists with the given email');</script>";
            } else {
            $sql = "INSERT INTO users_table (user_email, user_firstname, user_lastname, phone, user_password)
            VALUES ( '".$email."', '".$first_name."', '".$last_name."', '".$user_phone."', '".$password."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            $conn = null;
            header('Location: ../');
            }
            
        }catch(PDOException $e){
            echo "<script type= 'text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    }
?>