<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])) {
    // Your existing code to set up PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Your existing code to configure PHPMailer
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sumitthakur8313@gmail.com';  // Replace with your email
        $mail->Password   = 'yymqmlpkxtjjeult';   // Replace with your email password
        $mail->SMTPSecure = 'tls';  // Use 'tls' instead of 'ssl'
        $mail->Port       = 587;

        // Your existing code to get form data
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $recipientEmail = filter_var($_POST["recipient_email"], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($_POST["message"]);
        $taskType = htmlspecialchars($_POST["task_type"]);

        // Your existing code to send email
        $mail->setFrom($email, $name);
        $mail->addAddress($recipientEmail);
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true);
        $mail->Body = "Task Name: $name <br> Status: $taskType <br> Message: $message";
        $mail->send();

        // Insert form data into the database
        include 'connect.php'; // Assuming this file contains your database connection

        $sql = "INSERT INTO tform (name, email, recipient_email, task_type, message) 
                VALUES ('$name', '$email', '$recipientEmail', '$taskType', '$message')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "
                <script> 
                    alert('Message and data were sent successfully!');
                    document.location.href = 'task.php';
                </script>
            ";
        } else {
            echo "<script>alert('Error sending message and storing data in the database.');</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



?>