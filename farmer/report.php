<?php
    session_start();
    $email_id = $_SESSION['email_id'];
    $name = $_SESSION['name'];

    if (isset($_POST['submit'])){
        $description = $_POST['description'];
        $person_name = $_POST['person_name'];
        $person_email_id = $_POST['person_email_id'];

        $_SESSION['name'] = $name;
        $_SESSION['email_id'] = $email_id;

        require_once 'db_settings.php';
        
        $query = "insert into reports values('$description','$person_name','$person_email_id')";
        mysqli_query($db, $query);
        header('Location: index.php');
    }else{
        header('Location: ../error.php');
    }      
?>