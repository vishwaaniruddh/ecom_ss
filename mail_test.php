<?php include('config.php');

if ( function_exists( 'mail' ) )
{
    echo 'mail() is available';
}
else
{
    echo 'mail() has been disabled';
}


if(mail("aniruddhvishwa@gmail.com","My subject",'Hello')){
    echo 'send';
}
else{
 echo 'fail';   
}
    ;


phpinfo();



return ; 
$sender = 'offers@englishpointmarina.com';
$recipient = 'vishwaaniruddh@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}





ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



return ; 



require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



// $lead_id = $_GET['id'];
$lead_id = '176';
$sql = mysqli_query($con,"select * from leads where id='".$lead_id."'");
$sql_result = mysqli_fetch_assoc($sql);

$fname = $sql_result['fname'];

$email = $sql_result['email'];

$EmailSubject2="Your surprise offer from EnglishPoint Marina";

$message2 ='';
$message2 .= '<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_-3574208931770910074m_586962815117523313x_gmail-m_3727689729610629891m_-8970067484825990113bodyTable" style="border-collapse:collapse;height:100%;margin:0px;padding:0px;width:100%">
<tbody>
<tr>
<td align="center" valign="top" id="m_-3574208931770910074m_586962815117523313x_gmail-m_3727689729610629891m_-8970067484825990113bodyCell" style="height:100%;margin:0px;padding:0px;width:100%">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
<tbody>
<tr>
<td align="center" valign="top" id="m_-3574208931770910074m_586962815117523313x_gmail-m_3727689729610629891m_-8970067484825990113templateHeader" style="background:none 50% 50%/cover no-repeat rgb(255,255,255);border-top:0px;border-bottom:0px;padding-top:45px;padding-bottom:45px">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;max-width:600px">
<tbody>
<tr>
<td valign="top" style="background:none 50% 50%/cover no-repeat transparent;border-top:0px;border-bottom:0px;padding-top:0px;padding-bottom:0px">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:9px">
<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:0px 9px;text-align:center"><img align="center" alt="" src="https://ci4.googleusercontent.com/proxy/bZT8sT8DB5Pmp84czbGxdAzSh5gLrb_RS4P5boUGzypxC5uj3HSmRG369zdwRSJywLUIMsMQiLmY17tX9BF-Xw4bjhvnl4bjwW0zY7kQfl8M246c4mcn6New_X2v1evsziJ1HM5KajkAxm_DUs7NNd5NuLJvnA=s0-d-e1-ft#https://mcusercontent.com/de976798b8f6f381d8a2d349b/images/faaf9799-9b8b-4996-af6c-7fdfdf01df48.png" width="564" style="max-width:1006px;padding-bottom:0px;vertical-align:bottom;border:0px;height:auto;outline:none;text-decoration:none;display:inline" class="CToWUd">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top" id="m_-3574208931770910074m_586962815117523313x_gmail-m_3727689729610629891m_-8970067484825990113templateBody" style="background:none 50% 50%/cover no-repeat rgb(255,255,255);border-top:0px;border-bottom:0px;padding-top:36px;padding-bottom:45px">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;max-width:600px">
<tbody>
<tr>
<td valign="top" style="background:none 50% 50%/cover no-repeat transparent;border-top:0px;border-bottom:0px;padding-top:0px;padding-bottom:0px">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:9px">
<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:0px 9px;text-align:center"><img align="center" alt="" src="https://ci3.googleusercontent.com/proxy/v8B0xCVG9wB-FrKc6LEvdoznafaqk4Q-meTlGdL5jYxZwtCtefYfVVlFhirtpFbjbSfKQsqNqMOzfAri0yigOfdcjpdC9dvAsUYhUoTNrlyEzG5bVzQaHAd3iBW91MwcZC-2tjSTSQVCSUm2-WlV0FJj9k9o9w=s0-d-e1-ft#https://mcusercontent.com/de976798b8f6f381d8a2d349b/images/b4302113-3d40-4caf-bf60-943e80da541d.jpg" width="564" style="max-width:1259px;padding-bottom:0px;vertical-align:bottom;border:0px;height:auto;outline:none;text-decoration:none;display:inline" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 1105.56px; top: 1434px;"><div id=":rd" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding-top:9px">
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:0px 18px 9px;line-height:100%;word-break:break-word;color:rgb(117,117,117);font-family:Helvetica;font-size:16px;text-align:left">
<h1 style="text-align:center;display:block;margin:0px;padding:0px;color:rgb(34,34,34);font-family:Helvetica;font-size:40px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal">
<strong><span style="font-size:16px">Thank you for visiting EnglishPoint Marina.</span></strong></h1>
<h3 style="display:block;margin:0px;padding:0px;color:rgb(68,68,68);font-family:Helvetica;font-size:22px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:left">
<br>
<span style="font-size:14px">Are you ready to head to the beach and have some fun with your loved ones?<br>
<br>
We have enclosed an exclusive, limited period, luxury holiday experience at Pinewood Beach Resort & Spa that you will love. (See attached Voucher)
<br>
<br>
Karibu Sana!</span></h3>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>



<div style="display:flex;">

<a  title="Book Now" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:rgb(255,255,255);display:block ; background:rgb(187,226,109) ; width: 100%;padding: 2%; margin: auto 1%;" href="https://englishpointmarina.online/followup.php?id='.$lead_id.'">Request your booking dates </a>

</div>







<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse;table-layout:fixed">
<tbody>
<tr>
<td style="min-width:100%;padding:18px">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top" id="m_-3574208931770910074m_586962815117523313x_gmail-m_3727689729610629891m_-8970067484825990113templateFooter" style="background:none 50% 50%/cover no-repeat rgb(51,51,51);border-top:0px;border-bottom:0px;padding-top:45px;padding-bottom:63px">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;max-width:600px">
<tbody>
<tr>
<td valign="top" style="background:none 50% 50%/cover no-repeat transparent;border-top:0px;border-bottom:0px;padding-top:0px;padding-bottom:0px">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse;table-layout:fixed">
<tbody>
<tr>
<td style="min-width:100%;padding:18px">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid rgb(80,80,80);border-collapse:collapse">
<tbody>
<tr>
<td><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding-top:9px">
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;min-width:100%;border-collapse:collapse">
<tbody>
<tr>
<td valign="top" style="padding:0px 18px 9px;word-break:break-word;color:rgb(255,255,255);font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody>
<tr>
<td width="650">
<p style="margin:10px 0px;padding:0px;color:rgb(255,255,255);font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">
Team EnglishPoint Marina, Mombasa</p>
</td>
</tr>
<tr>
<td width="650"><a href="mailto:offers@englishpointmarina.com" style="color:rgb(255,255,255);font-weight:normal;text-decoration:underline" rel="noreferrer" target="_blank">offers@englishpointmarina.com</a></td>
</tr>
</tbody>
</table>
&nbsp;
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody>
<tr>
<td width="650">
<p style="margin:10px 0px;padding:0px;color:rgb(255,255,255);font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">
Pinewood&nbsp;Beach Resort &amp; Spa, Diani</p>
</td>
</tr>
<tr>
<td width="650"><a href="mailto:offers@pinewood-beach.com" style="color:rgb(255,255,255);font-weight:normal;text-decoration:underline" rel="noreferrer" target="_blank">offers@pinewood-beach.com</a></td>
</tr>
<tr>
<td width="650"><a href="tel:+254%20700%20111%20104" style="color:rgb(255,255,255);text-decoration:underline;font-weight:normal" rel="noreferrer" target="_blank">+254 700 111 104</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center>';

echo $message2;
echo '<br>';
echo $email;



// echo 'gethostname'.gethostname(); // may output e.g,: sandie


echo '<br>';
$headers = '';
    $headers .= "Reply-To: The Sender offers@englishpointmarina.com\r\n"; 
    $headers .= "Return-Path: The Sender offers@englishpointmarina.com\r\n"; 
    $headers .= "From: offers@englishpointmarina.com" ."\r\n" .
    $headers .= "Organization: Sender Organization\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
    
            
    if(mail($email, "English Point Marina", $message2, $headers,'-f offers@englishpointmarina.com -F "English Point Marina"')){

        
        mail('vishwaaniruddh@gmail.com', "English Point Marina", $message2, $headers,'-f offers@englishpointmarina.com -F "English Point Marina"');

    }
    
    



// $mail2 = new PHPMailer\PHPMailer\PHPMailer();


//     //Server settings
//     $mail2->SMTPDebug = 2;                                 // Enable verbose debug output
//     // $mail2->isSMTP();                                      // Set mailer to use SMTP
//     // $mail2->Host = 'smtp.englishpointmarina.com';  // Specify main and backup SMTP servers
    
//     $mail2->Host = 'englishpointmarina.com';               // Specify main and backup SMTP servers
//     $mail2->SMTPAuth = true;                               // Enable SMTP authentication
//     $mail2->Username = 'offers@englishpointmarina.com';                 // SMTP username
//     $mail2->Password = 'M@rina2020';                       // SMTP password
//     $mail2->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//     $mail2->Port = 587;                                    // TCP port to connect to
    
    
    
    
    
//     $leadsmail2=" offers@englishpointmarina.com";
//     $mailheader2 = "From: ".$leadsmail2."\r\n"; 
//     $mailheader2.= "Reply-To: ".$leadsmail2."\r\n"; 
    
    
    
    
// //Recipients
// $mail2->setFrom('offers@englishpointmarina.com','EnglishPoint Marina');

// $mail2->addAddress($email);      
// $mail2->addBCC('vishwaaniruddh@gmail.com');


// $mail2->addAttachment("leads_pdf/$lead_id.pdf");



// $mail2->isHTML(true);                      
// $mail2->Subject = $EmailSubject2."\r\n";
// $mail2->Body    = $message2;
// $mail2->send();
    

?>

<script>
setTimeout(function(){
     // window.location.href="new_lead_mail.php?id=<?php echo $lead_id; ?>";
}, 500);

    

</script>


