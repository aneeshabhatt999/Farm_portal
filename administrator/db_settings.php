<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'farm_portal';
    $db = @mysqli_connect($server,$user,$password,$database) or die('We are having some error with the Server. Please try again later');
?>