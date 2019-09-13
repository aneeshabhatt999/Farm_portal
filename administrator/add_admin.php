<?php
    $name = '';
    $email_id = '';
    $passwd = '';
    $confirm_passwd = '';
    $state = '';
    $district = '';


    if (isset($_POST['submit'])) {
        $name = trim($_POST['name']);
        $email_id = trim($_POST['email_id']);
        $passwd = $_POST['passwd'];
        $confirm_passwd = $_POST['confirm_passwd'];
        $state = trim($_POST['state']);
        $district = trim($_POST['district']);

        if($passwd == $confirm_passwd){
            
            require_once 'db_settings.php';
            $query = "insert into administrators(name,email_id,passwd,state,district) values('$name','$email_id','$passwd','$state','$district')";
            
            mysqli_query($db, $query);
            header('Location: index.php');
        }
        else{
            header('Location: error.php');
        }
        
    }
?>
