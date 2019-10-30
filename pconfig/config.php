<?php
    $servername = "localhost";
    $username = "homestead";
    $password = "secret";
    $dbname = "rpms_db";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Established!";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>