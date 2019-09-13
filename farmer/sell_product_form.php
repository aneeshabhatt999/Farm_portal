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
        <title>Sell Product : </title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
        <h2>Sell Product Page : </h2>
            <form action="sell.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Name of the Crop : </td>
                            <td>
                                <input type="text" name="crop" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Quantity : </td>
                            <td>
                                <input type="number" min=1 name="quantity" value="" /> 
                            </td>
                        </tr> 
                        <tr>
                            <td>Units : </td>
                            <td>
                                <select name="units">
                                    <option value="kg">kg</option>
                                    <option value="ton">ton</option>
                                    <option value="metric ton">metric ton</option>
                                    <option value="quintal">quintal</option>
                                </select>
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