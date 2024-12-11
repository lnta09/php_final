<?php
    require('../model/m_user.php');

    $email = $_POST['email'];
    session_start();
    $_SESSION['email'] = $email;
    $token = bin2hex(random_bytes(16));
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $expiry = date("Y-m-d H:i:s", time() + 60 * 3);
    
    $new_user = new User();
    $this_user = $new_user->set_reset_token($email, $token, $expiry);
    
    $mail = require('../template/mailler.php');
    $mail->setFrom('noreply@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset';
    $mail->Body = <<<END
        Click <a href='http://localhost/final/controller/c_check_token.php?token=$token'>here</a> 
        to reset your password. This link will expire after 3 minutes.
    END;
    // try{
        $mail->send();
        // echo "Message sent, check your inbox";
    // } catch(Exception $e){
    //     echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    // }
    header("Location: ../resetMail.php");
?>