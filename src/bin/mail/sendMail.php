<?php



// Inclusion de phpmailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if(!include '../../../data/phpmailer/src/SMTP.php'){

    include '../../data/phpmailer/src/Exception.php';
    include '../../data/phpmailer/src/PHPMailer.php';
    include '../../data/phpmailer/src/SMTP.php';
}
else{

    include '../../../data/phpmailer/src/Exception.php';
    include '../../../data/phpmailer/src/PHPMailer.php';
}




// Fonction qui envoie un mail

function sendMail($email=" ",$object=" ",$body=" "){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact.jeune64@gmail.com';
    $mail->Password = 'wjzrxyuzhqygzqqt';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('contact.jeune64@gmail.com',"Gmail.com");

    $mail->addAddress("$email");

    $mail->isHTML(true);

    $mail->Subject = $object;

    $mail->Body = $body;

    $mail->send();

}

?>