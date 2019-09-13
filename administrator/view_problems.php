<?php
    session_start();
    $email_id = $_SESSION['email_id'];
    require_once 'db_settings.php';
    $query = "select * from reports";    
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
            <h2 style="color: red">There are no problems to display.</h2>
        <?php }else{?>
        <h2>Following problems are recorded : </h2>
        <form>
            <table>
                <thead>
                    <tr>
                        <th>Problem Description: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                        <th>Person Involved: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                        <th>Person's Email ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {                    
                    ?>
                    <tr>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['person_name'];?></td>
                        <td><?php echo $row['person_email_id'];?></td>
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