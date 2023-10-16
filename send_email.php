<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
    $experience = $_POST["experience"];

    // Check if a file was uploaded
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $file = $_FILES["file"]["tmp_name"];
        $filename = $_FILES["file"]["name"];
    } else {
        // Handle the case where the file was not uploaded as needed.
        // You can display an error message if necessary.
        header('Location: index.html'); // Redirect without showing an error message
        exit; // Exit the script
    }

    if (isset($_FILES["recibo"]) && $_FILES["recibo"]["error"] == 0) {
        $recibo = $_FILES["recibo"]["tmp_name"];
        $reciboFilename = $_FILES["recibo"]["name"];
    } else {
        // Handle the case where the recibo file was not uploaded as needed.
        // You can display an error message if necessary.
        header('Location: index.html'); // Redirect without showing an error message
        exit; // Exit the script
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->setLanguage("br");
        $mail->SMTPAuth = true;
        $mail->Username = 'ti3@altasports.com.br';
        $mail->Password = '#Meu270405';
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'email-ssl.com.br';
        $mail->Port = 465;

        // Sender information
        $mail->setFrom('ti3@altasports.com.br', 'Felipe Rocha');

        // Recipient information
        $mail->addAddress('joaofeliperochads@gmail.com', 'João Felipe Rocha da Silva');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "Name: $name<br>Surname: $surname<br>Age: $age<br>Years of Experience: $experience";
        $mail->AltBody = 'This is the body of the message for email clients that do not recognize HTML';

        // Attach the uploaded file
        $mail->addAttachment($file, $filename);
        $mail->addAttachment($recibo, $reciboFilename);

        $mail->send();
        header('Location: index.html');
        exit;
    } catch (Exception $e) {
        header('Location: index.html'); 
        exit;
    }
}
?>
<script>
    window.location.href = "index.html"; 
</script>
