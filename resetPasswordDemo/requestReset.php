<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST['email'])){
    $emailTo = $_POST['email'];

    $code  = uniqid(true);
    $query = mysqli_query($conn , "INSERT INTO resetpassword(code , email) VALUES ('$code' , '$emailTo')");

    if(!$query){
        exit("errrrr");
    }
// Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'yourmail@gmail.com';                     // SMTP username
    $mail->Password   = 'your password';                               // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('yourmail@gmail.com', 'youtube');
    $mail->addAddress("$emailTo ", 'SANJAY USER ');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('ro-reply@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    // Content
    $url = "http://" . $_SERVER['HTTP_HOST'].dirname($_SERVER["PHP_SELF"])."/resetpassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'your password reset link ';
    $mail->Body    = "<h2>you requested a password reset </h2>
                    click <a href = '$url'>this link </a> to do so $code ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Reset Password  link has been sent to your email ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

exit();

}

?>



<form method="POST">
    <input type="text" name="email" placeholder="email ... " autocomplete="off">
    <input type="submit" name="submit" value="reset mail">
</form>