<?php
    session_start();
    if(!isset($_SESSION['email_id'])){
        header('Location: ../index.html');
    }
?>