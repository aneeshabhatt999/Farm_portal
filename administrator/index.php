<?php
    require_once 'secure.php';
    $email_id = $_SESSION['email_id'];
    $name = $_SESSION['name'];

    $_SESSION['email_id'] = $email_id;
    $_SESSION['name'] = $name;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Dashboard</title>
        <link href="css/default.css" rel="stylesheet" type="text/css" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu1.php'; ?>
        <div id="content">
            <h1>Welcome <?php echo"$name";?>!</h1>
            <!-- <h3><a href="logout.php">Logout</a></h3>
            <h3><a href="view_problems.php">View Farmer's Problems</a></h3>
            <h3><a href="add_admin_form.php">Add Administrator</a></h3> -->
        </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>
