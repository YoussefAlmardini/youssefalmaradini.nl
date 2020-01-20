<?php
$sent = false;
if(isset($_POST['submit'])){
    $to = "yosef.mardini@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
    $last_name = $_POST['surname'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    $sent = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YM contact</title>
    <link rel="stylesheet" href="../styles/contact.css">
    <!-- Header -->
    <?php include_once "../components/header.php"; ?>
</head>
<body>
    <!-- Navigation -->
    <?php include_once "../components/nav.php"; ?>
    <div class="container minHeight">

        <form id="contact-form" method="post" action="contact.php" role="form">
            <div class="container formMessage">
                <p>
                    Contact
                    <br>
                    <div class="green">
                        <?php if($sent){
                            echo "Mail Sent. Thank you $first_name, I will contact you shortly.";
                        }?>
                    </div>
                </p>
            </div>
            <div class="messages">

            </div>

            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Firstname *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname *</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Please specify your need *</label>
                            <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                <option value=""></option>
                                <option value="Request quotation">full website</option>
                                <option value="Request order status">graphics design</option>
                                <option value="Request copy of an invoice">code issue</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="submit" class="btn btn-success btn-send" value="Send message">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted" style="margin-top: 2.5%; text-align: center !important;">
                            <strong>*</strong> These fields are required.</p>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- Footer -->
    <?php include_once "../components/footer.php"; ?>

</body>
</html>