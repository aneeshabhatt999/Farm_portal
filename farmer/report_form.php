<?php
    session_start();
    $email_id = $_SESSION['email_id'];
    $name = $_SESSION['name'];

    $_SESSION['email_id'] = $email_id;
    $_SESSION['name'] = $name;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Report : </title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
        <h2>Report Page : </h2>
            <form action="report.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Problem Description : </td>
                            <td>
                                <input type="text" name="description" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Person Involved : </td>
                            <td>
                                <input type="text" name="person_name" value="" /> 
                            </td>
                        </tr> 
                        <tr>
                            <td>Email ID of the person : </td>
                            <td>
                                <input type="text" name="person_email_id" value="" /> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Submit" name="submit" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>