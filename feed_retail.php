<?php
    session_start();
    $email_id = $_SESSION['email_id'];
    require_once 'includes/db_settings.php';
    $query = "select * from farmer_posts";    
    $result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Ads : </title>
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
        <?php if(mysqli_num_rows($result)==0){?>
            <h2 style="color: red">There are no ads to display.</h2>
        <?php }else{?>
        <h2>Following ads are available : </h2>
        <form>
            <table>
                <thead>
                    <tr>
                        <th>Crop&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>Quantity&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>Units&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>Name of the farmer&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>Email ID&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {                    
                    ?>
                    <tr>
                        <td><?php echo $row['crop'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['units'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email_id'];?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        <?php }?>
        </form>  
    </div>
    <?php require_once 'footer.php'; ?>
    </body>
</html>
<?php
    mysqli_close($db);
?>