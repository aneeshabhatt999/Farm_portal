<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Login</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
            <h2>Login Page</h2>
            <form action="login.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Email Id : 
                            </td>
                            <td><input type="text" name="email_id" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password : 
                            </td>
                            <td><input type="password" name="passwd" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Role : </td>
                            <td>
                                <input type="radio" name="type" value="farmer" checked="checked" />Farmer
                                <input type="radio" name="type" value="retailer" />Retailer
                            </td>
                            </tr>
                        <tr>
                            <td colspan="2" class="center">
                                <input type="submit" value="Login" name="submit" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
            <h3><a href="forgot_password_form.php">Forgot Password</a></h3>
        </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>
