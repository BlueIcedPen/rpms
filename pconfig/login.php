<?php 
    if(isset($_POST['login_submit'])){
        try{
            require_once("config.php");
            $email = $_POST['user_login_email'];
            $password = $_POST['user_login_pass'];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT user_id, user_email, phone, user_firstname, user_lastname, user_image FROM users_table WHERE user_email = :email AND user_password = :pass";
            // use prepare() for preventing SQL injection
            $res = $conn->prepare($sql);
            $res->bindParam(':email', $email);
            $res->bindParam(':pass', $password);
            $res->execute();
            if($row = $res->fetch(PDO::FETCH_ASSOC)){
                if(isset($_POST['remember_me'])) {
                    setcookie('email', $row['user_email'], time()+86400*7,'/');
                    setcookie('firstname', $row['user_firstname'], time()+86400*7,'/');
                    setcookie('lastname', $row['user_lastname'], time()+86400*7,'/');
                    // server should keep session data for AT LEAST 1 hour
                    ini_set('session.gc_maxlifetime', 3600);    

                    // each client should remember their session id for EXACTLY 1 hour
                    session_set_cookie_params(3600);

                    session_start();
                    $_SESSION['status'] = 0;
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['user_firstname'];
                    $_SESSION['lastname'] = $row['user_lastname'];
                    $_SESSION['image'] = $row['user_image'];
                }
                session_start();
                $_SESSION['status'] = 0;
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['firstname'] = $row['user_firstname'];
                $_SESSION['lastname'] = $row['user_lastname'];
                $_SESSION['image'] = $row['user_image'];
                exit(header('Location: ../permit/welcome.php'));
            }else {
                exit(header('Location: /'));
            }
            $conn = null;
        }catch(PDOException $e){
            echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    }
?>