<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


if (isset($_POST['submit'])) {
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'learn2code.qcu.capstone@gmail.com';
        $mail->Password = 'dbvkkbescodsilcb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email content
        $mail->isHTML(true);
        $mail->setFrom('learn2code.qcu.capstone@gmail.com', 'Hytec Power Inc.');
        $mail->addAddress($_POST['email'], $_POST['fullname']);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'] . '<br><br>Contact number: ' . $_POST['phone'];
        //$mail->AltBody = 'This is the plain text message body';

        // Send email
        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
<!-- CSS Files -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/contacts/contact-4/assets/css/contact-4.css" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include "sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include "navbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="bg-light py-3 py-md-5">


                        <div class="container">
                            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-xl-center">
                                <div class="col-12 col-lg-6">

                                    <iframe class="img-fluid rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.641482154125!2d121.04522287384455!3d14.732850373827674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b05aff953619%3A0xa8e475f45adcece3!2sHytec%20Power%20Incorporated!5e0!3m2!1sen!2sph!4v1710834259101!5m2!1sen!2sph" width="600" style="height: 680px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="row justify-content-xl-center">
                                        <div class="col-12 col-xl-11">
                                            <div class="bg-white border rounded shadow-sm overflow-hidden">

                                                <form action="" method="POST">
                                                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                                        <div class="col-12">
                                                            <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                                    </svg>
                                                                </span>
                                                                <input type="email" class="form-control" id="email" name="email" value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="phone" class="form-label">Phone Number</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                    </svg>
                                                                </span>
                                                                <input type="tel" class="form-control" id="phone" name="phone" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="subject" name="subject" value="" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button class="btn btn-primary btn-lg" type="submit" name="submit" style="background-color:#202020">Send Message</button>
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
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>