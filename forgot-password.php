<?php  include("includes/header.php");  ?>
<nav class="navbar navbar-dark warning-color">
  <a class="navbar-brand" href="#">
    <img src="./assets/img/gct_logo.png" height="50" alt="mdb logo">
  </a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <h4 class="white-text mt-2">Garcia College of Technology</h4>
            <span class="sr-only">(current)</span>
        </a>
    </li>
  </ul>
</nav>
<?php $page_title="GCT SAIS"; ?>
<div class="container mt-5">
    <div class="row">
    <div class="mr-auto ml-auto">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="card rounded-0" style="background-color: #39445f;" style="max-width: 60%;">
                    <div class="card-header indigo darken-4">
                        <h3 class="text-center text-white">Enter your email</h3>
                        <hr class="bg-white">
                        <p class="text-center text-white">Please make sure to provide your valid and active electronic email address when resetting your accocunt so as to avoid resetting inconvenience. 
                            If you do not have a valid and active electronic email account, please consider signing up first before using this service.</p>
                    </div>
                    <div class="card-body p-1">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                            <form class="form" method="POST" role="form" autocomplete="off" id="formLogin">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                            <div class="md-form">
                                                <i class="fas fa-envelope white-text prefix"></i>
                                                <input class="form-control form-control-lg rounded-0 text-white" type="email" name="email" id="email" required>
                                                <label class="text-white" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            <button class="btn btn-success btn-lg float-right" type="submit" name="forgot_password" id="btnLogin"><i class="fa fa-sign-in"></i> Submit</button>	
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions

if (isset($_POST['forgot_password'])) {
    $email = htmlspecialchars($_POST['email']);
    $get_email = retrieve("SELECT * FROM students WHERE email=?",array($email));
    $get_password = retrieve("SELECT * FROM login_credentials WHERE user_id=?",array($get_email[0]['id']));
    $check_email = count($get_email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='module'>
        Swal.fire('Error','This email is invalid','error');
    </script>";
    }

    if ($check_email > 0) {
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = 2; //Debugging
        $mail->isSMTP();
        $mail->Host = "ssl://smtp.gmail.com:465"; //Host Name
        $mail->SMTPAuth = true; //if SMTP Host requires authentication to send email
        $mail->Username = "gct.assessorsoffice@gmail.com";
        $mail->Password = "@55355OR$";
        $mail->SMTPSecure = "false";
        $mail->Port = 465;
        $mail->setFrom('gct.assessorsoffice@gmail.com', 'GCT Assessors Office');
        $mail->AddReplyTo('gct.assessorsoffice@gmail.com', 'GCT Assessors Office');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 
                'verify_peer_name' => false, 'allow_self_signed' => true)); //start connection

        $mail->Username = "gct.assessorsoffice@gmail.com"; // set email add
        $mail->Password = "@55355OR$"; // set password
        $mail->FromName = 'GCT Assessors Office';
        $mail->Subject = "Forgot Password";
        $mail->Body = "<i>Hi ".$get_email[0]['firstname']. " ".$get_email[0]['lastname']." this is your Password</i>".$get_password[0]['password'];
        $mail->AltBody = "This is the plain text version of the email content";
        
        if (!$mail->send()) {
            ob_end_clean();
                echo "<script type='module'>
            Swal.fire('Error','Failure in sending a Password to email, please check your internet connection','error');
        </script>".$mail->ErrorInfo;
        } else {
                ob_end_clean();
                echo "<script type='module'>
                    Swal.fire('Success','Password sent successfully, please check your email','success');
                </script>";
                return true;
        }
    
    } else {
        echo "<script type='module'>
        Swal.fire('Error','This email is not existing in our system','error');
    </script>";
    }
}
?>
<?php include('includes/footer.php'); ?>