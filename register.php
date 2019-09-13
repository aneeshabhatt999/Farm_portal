<?php
    $name = '';
    $dob = '';
    $state = '';
    $district = '';
    $email_id = '';
    $phone = '';
    $passwd = '';
    $confirm_passwd = '';
    $type = '';


    if (isset($_POST['submit'])) {
        $name = trim($_POST['name']);

        $dob = $_POST['date_of_birth'];
        $d = strtotime($dob);
        $date_of_birth = date('Y-m-d', $d);

        $state = trim($_POST['state']);
        $district = trim($_POST['district']);
        $email_id = trim($_POST['email_id']);
        $phone = trim($_POST['phone']);
        $passwd = $_POST['passwd'];
        $confirm_passwd = $_POST['confirm_passwd'];
        $type = $_POST['type'];

        if($passwd == $confirm_passwd){
            
            require_once 'includes/db_settings.php';

            if($type == 'farmer'){
                $query = "insert into farmers(name,dob,state,district,email_id,phone,passwd) values('$name','$date_of_birth','$state','$district','$email_id','$phone','$passwd')";
            }else{
                $query = "insert into retailers(name,dob,state,district,email_id,phone,passwd) values('$name','$date_of_birth','$state','$district','$email_id','$phone','$passwd')";
            }
            mysqli_query($db, $query);
            header('Location: index.html');
        }
        else{
            header('Location: error.php');
        }
        
    }
?>
