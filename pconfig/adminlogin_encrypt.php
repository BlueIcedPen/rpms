<?php 
    // if(isset($_POST['admin_submit'])){
        try{
            require_once("./config.php");
            $email = $_POST['admin_email'];
            $password = $_POST['admin_pass'];
            // $image = $_POST['user_image'];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT salt FROM admin_table WHERE admin_email = :email";
            $res = $conn->prepare($sql);
            $res->bindParam(':email', $email);
            $res->execute();
            if($row = $res->fetch(PDO::FETCH_ASSOC)){
                $salt = $row['salt'];
                $salted_password = $password . $salt;
                $passhash = hash('sha256', $salted_password);
                $sql = "SELECT admin_email, phone, admin_firstname, admin_lastname FROM admin_table WHERE admin_email = :email AND admin_password = :pass";
                // use prepare() for preventing SQL injection
                $res = $conn->prepare($sql);
                $res->bindParam(':email', $email);
                $res->bindParam(':pass', $passhash);
                $res->execute();
                if($row = $res->fetch(PDO::FETCH_ASSOC)){
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['firstname'] = $row['admin_firstname'];
                    $_SESSION['lastname'] = $row['admin_lastname'];
                    $_SESSION['type'] = $row['type'];
                    // server should keep session data for AT LEAST 1 hour
                    ini_set('session.gc_maxlifetime', 3600);    

                    // each client should remember their session id for EXACTLY 1 hour
                    session_set_cookie_params(3600);
                    exit(header('Location: ../admin/submitted.php'));
                }else {
                    exit(header('Location: ../'));
                }

            }else {
                exit(header('Location: ../'));
            }
            $conn = null;
        }catch(PDOException $e){
            echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    // }
?>