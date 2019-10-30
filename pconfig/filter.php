<?php 
    // if(isset($_POST['admin_submit'])){
        try{
            require_once("./config.php");
            $email = $_POST['admin_email'];
            $password = $_POST['admin_pass'];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM permits_table WHERE curr_status = \"Submitted\" ORDER BY permit_id";
            $res = $conn->query($sql);
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $rows[] = $r;
            }
            //echo result as json
            echo json_encode($rows);
            $conn = null;
        }catch(PDOException $e){
            echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    // }
?>