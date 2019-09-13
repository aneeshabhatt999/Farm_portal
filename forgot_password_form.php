<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Forgot Password:</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
        <h2>Forgot Password Page : </h2>
            <form action="forgot_password.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Email ID : </td>
                            <td>
                                <input type="text" name="email_id" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Role : </td>
                            <td>
                                <input type="radio" name="type" value="farmer" />Farmer
                                <input type="radio" name="type" value="retailer" />Retailer
                                <!-- <input type="radio" name="type" value="administrator" />Administrator -->
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