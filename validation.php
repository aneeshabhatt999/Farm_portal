<?php
    $template = 1;

    $email_id = '';
    $name = '';
    $dob = '';
    $state = '';
    $phone = '';
    $district = '';
    $passwd = '';
    $confirm_passwd = '';
    $type = '';

    $errors = array();

    if(isset($_POST['submit'])){
        $phone = trim($_POST['phone']);
        
        $dob = $_POST['date_of_birth'];
        $d = strtotime($dob);
        $date_of_birth = date('Y-m-d', $d);

        $email_id = trim($_POST['email_id']);
        $passwd = trim($_POST['passwd']);
        $confirm_passwd = trim($_POST['confirm_passwd']);
        $name = trim($_POST['name']);
        $state = trim($_POST['state']);       
        $district = trim($_POST['district']);
        $type = $_POST['type'];
        
        
        if($email_id==''){
            $errors['email_id'] = 'The email ID can not be empty';
        }
        if($passwd==''){
            $errors['passwd'] = 'The Password can not be empty';
        }
        if($confirm_passwd==''){
            $errors['confirm_passwd'] = 'The Confirm Password can not be empty';
        }
        if($name==''){
            $errors['name'] = 'The Name can not be empty';
        }
        if($state==''){
            $errors['state'] = 'The State can not be empty';
        }
        if($district==''){
            $errors['district'] = 'The District can not be empty';
        }
        if($dob==''){
            $errors['dob'] = 'The Date of Birth can not be empty';
        }
        
        
        if(count($errors)==0){
            if(!preg_match('/\w+@\w+[.]\w+/', $email_id)){
                $errors['email_id'] = 'The email ID is not Valid';
            }
            if(strlen($passwd)<8){
                $errors['passwd'] = 'The Password is too short';
            }
            if($passwd!=$confirm_passwd){
                $errors['confirm_passwd'] = 'The Passwords do not match';
            }
            if(!preg_match('/^[A-Za-z]+(\s[A-Za-z]+)*$/', $name)){
                $errors['name'] = 'The Name has some Invalid Characters';
            }
            if(!preg_match('/^[A-Za-z]+(\s[A-Za-z]+)*$/', $state)){
                $errors['state'] = 'The State has some Invalid Characters';
            }
            if(!preg_match('/^[A-Za-z]+(\s[A-Za-z]+)*$/', $district)){
                $errors['district'] = 'The District has some Invalid Characters';
            }
            if(!preg_match('/^[0-9\-\+]{9,15}$/', $phone)){
                $errors['phone'] = 'The Phone Number is invalid';     
            }
            if(substr($dob, 0, 4) > 2019){
                $errors['dob'] = 'The Date is invalid';   
            }

            
        }
        
        
        if(count($errors)==0){
            require_once 'includes/db_settings.php';
            if($type == "farmer"){
                $query = "select * from farmers where email_id='$email_id'";
            }else{
                $query = "select * from retailers where email_id='$email_id'";
            }
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result)==1){
                $errors['email_id'] = 'The email ID is already registered';
            }
        }
        
        
        if(count($errors)==0){
            require_once 'includes/db_settings.php';
            if($type == 'farmer'){
                $query = "insert into farmers(name,dob,state,district,email_id,phone,passwd) values('$name','$date_of_birth','$state','$district','$email_id','$phone','$passwd')";
            }else{
                $query = "insert into retailers(name,dob,state,district,email_id,phone,passwd) values('$name','$date_of_birth','$state','$district','$email_id','$phone','$passwd')";
            }
            mysqli_query($db, $query);
            $template = 2;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Validation</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php require_once 'menu.php'; ?>
        <div id="content">
            <?php if($template==1) { ?>
            <h2>Registration Page</h2>
            <form action="validation.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>Email Id : </td>
                            <td>
                                <input type="text" name="email_id" value="<?php echo $email_id;?>" />*
                                <?php if(isset($errors['email_id'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['email_id'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Password : </td>
                            <td>
                                <input type="password" name="passwd" value="<?php echo $passwd;?>" />*
                                <?php if(isset($errors['passwd'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['passwd'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password : </td>
                            <td>
                                <input type="password" name="confirm_passwd" value="<?php echo $confirm_passwd;?>" />*
                                <?php if(isset($errors['confirm_passwd'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['confirm_passwd'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Name : </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $name;?>" />*
                                <?php if(isset($errors['name'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['name'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date Of Birth : </td>
                            <td>    
                                <input type="date" name="date_of_birth"/>*
                                <?php if(isset($errors['dob'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['dob'];?></span>
                                <?php } ?>
                            </td>
                        </tr> 
                        <tr>
                            <td>State : </td>
                            <td>
                                <input type="text" name="state" value="<?php echo $state;?>" />*
                                <?php if(isset($errors['state'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['state'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>District: </td>
                            <td>
                                <input type="text" name="district" value="<?php echo $district;?>" />*
                                <?php if(isset($errors['district'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['district'];?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone: </td>
                            <td>
                                <input type="text" name="phone" value="<?php echo $phone;?>" />*
                                <?php if(isset($errors['phone'])){ ?>
                                &nbsp;&nbsp;&nbsp;<span class="error"><?php echo $errors['phone'];?></span>
                                <?php } ?>
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
                                <input type="submit" value="Register" name="submit" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php } ?>
            <?php if($template==2) { ?>
            <h2>Registration Complete</h2>
            <?php } ?>
        </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>