<?php
    if(isset($_POST['edit_row'])){
        
        try{
            require_once("./config.php");
            $id = $_POST['id'];
            $status = $_POST['status'];
            $source = $_POST['source'];
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE permits_table SET curr_status = :status WHERE `permit_id` = :id";
            $res = $conn->prepare($sql);
            $res->bindParam(':status', $status);
            $res->bindParam(':id', $id);
            // use execute() because no results are returned
            $res->execute();
        }catch(PDOException $e){
            echo "<script type= 'text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    }
?>