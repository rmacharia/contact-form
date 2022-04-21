<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                     
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail->SMTPDebug  = false;  
                //$mail->do_debug = 1;                   // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';               // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'r.macharia254@gmail.com';                     // SMTP username
                $mail->Password   = 'xxxxxx';                             
               $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom('r.macharia254@gmail.com', 'Roy');
                $mail->addAddress($email);     // Add a recipient
                
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Subscription status';
                $mail ->Body =  ' 
                <html> 
                <body> 
                     
                     <b>Your message has been sent successfully  </b>
                </body> 
                </html>';
    
                
                $mail->send();
                    
                    exit();
    }
  }
?>
