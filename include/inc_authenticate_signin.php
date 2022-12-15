<?php
session_start();

if (isset($_SESSION['mail'])) {
   require 'inc_db_handler.php';

   $userEmail = $_SESSION['mail'];
  $user = $_SESSION['usr'];
   $query = "SELECT * FROM authenticate WHERE authEmail = '$userEmail';";
   $statement = mysqli_query($conn, $query);

   if (mysqli_num_rows($statement) > 0) {
      $row = mysqli_fetch_assoc($statement);
        // echo $row['otpExpires'];
      if ($row['otpExpires'] + 90 <= date("U")) {
         header('Location: ../index.php?error=otpExpired');
        $query = "DELETE FROM authenticate WHERE authEmail = '$userEmail';";
        $statement = mysqli_query($conn, $query);
         session_destroy();
         exit();
      } else {
         header('Location: ../authenticate.php?error=otpalreadySent');
         exit();
      }

   }


   $token = random_bytes(4);
   $expires = date("U"); // create otp

   $hashedToken = password_hash(bin2hex($token), PASSWORD_DEFAULT); //stored hashed otp
   $to = $userEmail;

   $query = "INSERT INTO authenticate(authEmail, authToken, otpExpires) VALUES ('$userEmail' , '$hashedToken' , '$expires');";
   $statement = mysqli_query($conn, $query);
   if (!$statement) {
      header("location: ../index.php?error=failed");
      exit();
   }

   //-------------------------------php mailer------------------------------------------------------//


   require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
   require("../vendor/phpmailer/phpmailer/src/SMTP.php");
   require("../vendor/phpmailer/phpmailer/src/Exception.php");


   $mail = new PHPMailer\PHPMailer\PHPMailer();
   $mail->IsSMTP();

   $mail->CharSet = "UTF-8";
   $mail->Host = "smtp.gmail.com";
   $mail->SMTPDebug = 1;
   $mail->Port = 465; //465 or 587

   $mail->SMTPSecure = 'ssl';
   $mail->SMTPAuth = true;
   $mail->IsHTML(true);

   //Authentication
   $mail->Username = "iba.authentication@gmail.com";
   $mail->Password = "jsazzrsfougkynub";

   //Set Params
   $mail->SetFrom("iba.authentication@gmail.com");
   $mail->AddAddress($to);
   $mail->Subject = "Authenticate Login";
   $mail->Body = "<p> Here is your OTP for Immigration Booking Application </p><br><b>OTP : </b>";
   $mail->Body .= bin2hex($token);

   // echo bin2hex($token);


      header('Location: ../authenticate.php?user='.$user);
   if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      $_SESSION['auth'] = 1;
      echo "Message has been sent";
      exit();
   }
} elseif (!isset($_SESSION['mail'])) {
   header('location: ../index.php?authfailed');
   exit();
}