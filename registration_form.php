<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Registration:</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
        <h2>Registration Page</h2>
            <form action="register.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Name : </td>
                            <td>
                                <input type="text" name="name" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Date Of Birth : </td>
                            <td>    
                                <input type="date" name="date_of_birth" required />
                            </td>
                        </tr> 
                        <tr>
                            <td>State : </td>
                            <td>
                                <select name="state">
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>District : </td>
                            <td>
                                <select name="district">
                                    <option value="Lucknow">Lucknow</option>
                                    <option value="Jalandhar">Jalandhar</option>
                                    <option value="Kolkata">Kolkata</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email ID : </td>
                            <td>
                                <input type="text" name="email_id" value="" /> 
                            </td>
                        </tr>      
                        <tr>
                            <td>Phone : </td>
                            <td>
                                <input type="text" name="phone" value="" />
                            </td>
                        </tr>                    
                        <tr>
                            <td>Password : </td>
                            <td>
                                <input type="password" name="passwd" value="" /> 
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password : </td>
                            <td>
                                <input type="password" name="confirm_passwd" value="" />
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
                            <td colspan="2">
                                <input type="submit" value="Register" name="submit" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>