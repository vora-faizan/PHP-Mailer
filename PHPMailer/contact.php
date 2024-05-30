<?php

if(isset($_POST['email']))
{
  
  
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
// $msg_subject = $_POST['msg_subject'];
$text = $_POST['comments'];
  
  
  
  $message  = "<html><body>";
   
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
$message .= "<tr><td>";
   
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
   
$message .= "<thead>
  <tr height='80'>
    <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' > 
    CONTACT US DETAIL
    </th>
  </tr>
</thead>";
    
$message .= "<tbody>
             
       <tr>
       <td colspan='4' style='padding:2px;'>
         <p style='font-size:20px;'>First Name : <b>".$first_name."</b></p>
       </td>
       </tr>
       <tr>
       <td colspan='4' style='padding:2px;'>
         <p style='font-size:20px;'>Last Name : <b>".$last_name."</b></p>
       </td>
       </tr>

       <tr>
       <td colspan='4' style='padding:2px;'>
         <p style='font-size:20px;'>Email : <b>".$email."</b></p>
       </td>
       </tr>
       <tr>
       <td colspan='4' style='padding:2px;'>
         <p style='font-size:20px;'>Phone Number : <b>".$phone_number."</b></p>
       </td>
       </tr>
   
 
       
       <tr>
       <td colspan='4' style='padding:2px;'>
         <p style='font-size:20px;'>Message : <b>".$text."</b></p>
       </td>
       </tr>
       
       
      
       
      
              </tbody>";
    
$message .= "</table>";
   
$message .= "</td></tr>";
$message .= "</table>";
   
$message .= "</body></html>";
  
  
  //print_r($message);exit();
}
else
{
  header("Refresh:0; ");
}

 use PHPMailer\PHPMailer\PHPMailer; 
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception; 

   
 require  'PHPMailer/src/Exception.php'; 
 require  'PHPMailer/src/PHPMailer.php'; 
 require  'PHPMailer/src/SMTP.php'; 
   
 //require 'vendor/autoload.php'; 
   
 $mail = new PHPMailer(true);
   
 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username   = 'faizanvohra382@gmail.com';                    //SMTP username
 $mail->Password   = 'nqgo lczk pnld pofh';                         // SMTP password
 $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 587;
   
             $mail->setfrom('faizanvohra382@gmail.com', 'Contact Detail');             
             $mail->addaddress('faizanvora.anskeytechnology@gmail.com'); // first email address
            //  $mail->addAddress('');
             // second email address
              // second email address
             // where you want to send mail 
              
             
             $mail->isHTML(true);                                                                                            
             $mail->Subject = 'Contact Detail'; 
              //$mail->Body = 'HTML message body in <b>bold</b> '; 
             $mail->Body    = $message;              

             $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
             //$mail->send(); 
        if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
        } 
        else
        {
          echo 'Message has been sent';
          // Redirect back to the previous page
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit;
      }
