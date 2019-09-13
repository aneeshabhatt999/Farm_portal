<?php
    $email_id = '';
    $type = '';
    
    if(isset($_POST['submit'])){
        $email_id = $_POST['email_id'];
        $type = $_POST['type'];

        require_once 'includes/db_settings.php';
        if($type == 'farmer'){
            $query = "select * from farmers where email_id='$email_id'";
        }else if($type == 'retailer'){
            $query = "select * from retailers where email_id='$email_id'";
        }
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $email_id = $row['email_id'];
            $str = str_shuffle("123abc456");
            if($type == 'farmer'){
                $query = "update farmers set passwd='$str' where email_id='$email_id'";
            }else if($type == 'retailer'){
                $query = "update retailers set passwd='$str' where email_id='$email_id'";
            }else{
                $query = "update administrators set passwd='$str' where email_id='$email_id'";
            }
            mysqli_query($db, $query);
            require_once('includes/class.phpmailer.php');
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet="UTF-8";
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            
            $mail->Username = 'php.batch.215@gmail.com';
            $mail->Password = 'abc#1234';
            $mail->SMTPAuth = true;
            $mail->From = 'php.batch.2015@gmail.com';
            
            $mail->FromName = 'Unisoft Technologies';
            $mail->AddAddress($email_id);

            $mail->IsHTML(true);
            $mail->Subject = "Password Reset";
            $mail->Body = 'Your new password is '.$str;

            if(!$mail->Send())
            {
                echo "Mailer Error: ".$mail->ErrorInfo;
            }else{
                header('Location: congo.php');
            }
        }else{
            header('Location: error.php');
        }
    }
?>
