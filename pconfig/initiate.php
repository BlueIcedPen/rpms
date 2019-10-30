<?php
    if(isset($_POST['submit'])){
        
        try{
            require_once("config.php");
            $email = $_POST['email'];
            $first_name = $_POST['firstname'];
            $last_name =  $_POST['lastname'];
            $previous_name =  $_POST['previousname'];
            $title = $_POST['title'];
            $nationality = $_POST['nationality'];
            $birth_date = $_POST['birthDate'];
            $issue_place = $_POST['issuePlace'];
            $issue_date = $_POST['issueDate'];
            $birth_date = $_POST['birthDate'];
            $birth_place = $_POST['birthPlace'];
            $expiry_date = $_POST['expiry'];
            $local_address = $_POST['ghAddress'];
            $res_address = $_POST['residential'];
            $overseas_address = $_POST['overseasAddress'];
            $closest_relative = $_POST['closest'];
            $prof_address = $_POST['postal'];
            $phone = $_POST['phone'];
            $edu_qualification = $_POST['edu_qual'];
            $occupation = $_POST['occupation'];
            $employer_name = $_POST['boss'];
            $employer_address = $_POST['bossAddress'];
            $first_arrival = $_POST['first_arrival'];
            $latest_arrival = $_POST['latest_arrival'];
            $previous_expiry = $_POST['previous_expiry'];
            $apply_reason = $_POST['reason'];
            $stay_length = $_POST['stayLength'];
            $marital_status = $_POST['maritalStatus'];
            $spouse_name = $_POST['spouseName'];
            $spouse_nationality = $_POST['spouseNationality'];
            $spouse_place = $_POST['spousePlace'];
            $spouse_date = $_POST['spouseDate'];
            $spouse_occupation = $_POST['spouseOccupation'];
            $passport = $_POST['passnumber'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];


            if($password === $confirm){

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid e-mail address.\n";
                    exit;
                }

                // image file directory
                $target_dir = "../img/uploads/passport/";
                $target_dir2 = "../img/uploads/data/";
                $target_dir3 = "../img/uploads/letter/";
                $target_file = $target_dir . basename($_FILES['pass_picture']['name']);
                $target_file2 = $target_dir2 . basename($_FILES['pass_data']['name']);
                $target_file3 = $target_dir3 . basename($_FILES['letter']['name']);
                $uploadOk = 1;
                $uploadOk2 = 1;
                $uploadOk3 = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $imageFileType2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $imageFileType3 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES['pass_picture']['tmp_name']);
                $check2 = getimagesize($_FILES['pass_data']['tmp_name']);
                $check3 = getimagesize($_FILES['letter']['tmp_name']);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                
                if($check2 !== false) {
                    echo "File is an image - " . $check2["mime"] . ".";
                    $uploadOk2 = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk2 = 0;
                }
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT user_id FROM users_table WHERE user_email = :email";
                    $res = $conn->prepare($sql);
                    $res->bindParam(':email', $email);
                    $res->execute();
                    if($row = $res->fetch(PDO::FETCH_ASSOC)){
                        $id = $row['user_id'];
                            $sql = "INSERT INTO permits_table (user_id, user_email, user_firstname, user_lastname, user_passport, user_title, previous_name, issue_date, issue_place, `expiry_date`, nationality,birth_date,birth_place,local_address,phone,foreign_address,closest_relative,edu_qualifications,profession,profession_address,employer_name,first_arrival_date,latest_arrival_date,previous_expiry,apply_reason,proposed_stay_length,marital_status,spouse_name,spouse_nationality,spouse_place_of_birth,spouse_date_of_birth,pass_image,pass_data,letter)
                            VALUES ( '".$id."', '".$email."', '".$first_name."', '".$last_name."', '".$passport."', '".$title."', '".$previous_name."', '".$issue_date."', '".$issue_place."', '".$expiry_date."', '".$nationality."', '".$birth_date."', '".$birth_place."', '".$local_address."', '".$phone."', '".$overseas_address."', '".$closest_relative."', '".$edu_qualification."', '".$occupation."', '".$prof_address."', '".$employer_name."', '".$first_arrival."', '".$latest_arrival."', '".$previous_expiry."', '".$apply_reason."', '".$stay_length."', '".$marital_status."', '".$spouse_name."', '".$spouse_nationality."', '".$spouse_place."', '".$spouse_date."', '".$target_file."', '".$target_file2."', '".$target_file3."')";
                            // use exec() because no results are returned
                            $conn->exec($sql);
                        echo "<script type= 'text/javascript'>alert('Works');</script>";
                            $conn = null;
                            move_uploaded_file($_FILES["pass_picture"]["tmp_name"], $target_file);
                            move_uploaded_file($_FILES["pass_data"]["tmp_name"], $target_file2);
                            move_uploaded_file($_FILES["letter"]["tmp_name"], $target_file3);
                            exit(header('Location: ../permit/welcome.php'));
                    }else {
                        exit(header('Location: ../'));
                    }
            }
            
        }catch(PDOException $e){
            echo "<script type= 'text/javascript'>alert('".$e->getMessage()."');</script>";
        }
    }
?>