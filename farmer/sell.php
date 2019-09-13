<?php

    $crop = '';
    $quantity = 0;
    $units = '';

    if (isset($_POST['submit'])){
        session_start();
        $email_id = $_SESSION['email_id'];
        $name = $_SESSION['name'];

        $crop = $_POST['crop'];
        $quantity = $_POST['quantity'];
        $units = $_POST['units'];
        $_SESSION['crop'] = $crop;
        $_SESSION['quantity'] = $quantity;
        $_SESSION['units'] = $units;
        $_SESSION['name'] = $name;
        $_SESSION['email_id'] = $email_id;

        require_once 'db_settings.php';
        
        $query = "insert into farmer_posts values('$crop',$quantity,'$units','$name','$email_id')";
        mysqli_query($db, $query);
        header('Location: ../feed.php');
    }else{
        header('Location: ../error.php');
    }  
?>
