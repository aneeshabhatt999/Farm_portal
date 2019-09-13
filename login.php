<?php
    if(isset($_POST['submit'])){
        $email_id = $_POST['email_id'];
        $passwd = $_POST['passwd'];
        $type = $_POST['type'];
        require_once 'includes/db_settings.php';

        if($type == 'farmer'){
            $query = "select * from farmers where email_id='$email_id' and passwd='$passwd'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            if($row['name']=="Bharat Goyal" && $row['farmer_id']==1)
            {
                session_start();
                $_SESSION['email_id'] = $email_id;
                $_SESSION['name'] = $row['name'];
                header('Location: administrator/');
                exit();
            }
        }
        
        else if($type == 'retailer'){
            $query = "select * from retailers where email_id='$email_id' and passwd='$passwd'";
        }

        $result = mysqli_query($db, $query);
        $row_count = mysqli_num_rows($result);
        if($row_count == 0){
            header('Location: error.php');
        }else{
                $row = mysqli_fetch_array($result);
                session_start();
                $_SESSION['email_id'] = $email_id;
                $_SESSION['name'] = $row['name'];
                // if(($row['name']=="Bharat Goyal") && ($row['email']=="bharatgoel456@gmail.com")){
                //     header('Location: administrator/');
                // }
                if($type == "farmer" && $row['name'!="Bharat Goyal"]){
                    header('Location: farmer/');
                }else if($type == "retailer"){
                    header('Location: retailer/');
            }
        }
    }
?>

