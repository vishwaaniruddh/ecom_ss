<?php 

    $name = $_POST['userName'];
    $msg = $_POST['userMsg'];
    $mobile = $_POST['userPhone'];
    
    $from = $_POST['email'];
    
    $msg.= $msg.'<br><br>Best Regards,<br>'.$name.'<br>'.$mobile;
    echo $name;exit;
    
    $headers .= "Reply-To: The Sender sales@yosshitaneha.com\r\n"; 
    $headers .= "Return-Path: The Sender sales@yosshitaneha.com\r\n"; 
    $headers .= "From: sales@yosshitaneha.com" ."\r\n" ;
    $headers .= "Organization: Sender Organization\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
            
    if(mail('developer.ruchi@gmail.com', "Enquiry mail from SriShringarr fashion studio", $msg, $headers)){
        echo 'sent';
    } else {
        echo 'not sent';
    }
        
    echo '<script> window.location.href="contact_us.php"</script>';
    
?>