<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../inc/PHPMailer/src/Exception.php';
require '../inc/PHPMailer/src/PHPMailer.php';
require '../inc/PHPMailer/src/SMTP.php';
require '../inc/PHPMailer/config.php';

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);
//if (isset($_POST['submit'])) {
    //$email = $_POST['email'];



    /*if (empty($email)) {
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        echo "invalidEmailCharsError";
    } else {*/
        $fp_uniqid = bin2hex(random_bytes(24));

        $email = 'mail@mail.com';
        $query = "SELECT email FROM users WHERE email='$email'";
        $stmt = $userPDO->query($query);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            echo 'userNullError';
        } else {

            $message_body = "Hi {{name}},
    You recently requested to reset your password for your Mentor High account. This password reset is only valid for the next 24 hours.

If you did not request a password reset, please ignore this email or contact support if you have questions.

    Thanks,
    Mentor High Web Team

If the button above does not work, copy and paste the URL below into your web browser.

localhost/login/pass-reset.inc.php?fp_id=$fp_uniqid&token=$email";

            $mail = new PHPMailer(true); // Passing `true` enables exceptions
            try {

                resetPasswordMail($mail);
                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = "Reset your password";
                $mail->Body    = $message_body;

                $mail->send();

                /* Insert form data into database */
                $query = "UPDATE users SET fp_id = '$fp_uniqid' WHERE email='mail@mail.com'";
                $stmt = $userPDO->prepare($query);
                $stmt->execute();

                echo 'success';
            } catch (Exception $e) {
                $failure = 'Message could not be sent. Error: ' . $mail->ErrorInfo;
            }
        }
    //}
//}

if ($_GET['fp_id'] == $fp_uniqid && $_GET['token'] == $email) {
    echo 'hello!';
}