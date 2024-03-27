<?php session_start();
error_reporting(0);
include_once "include/header.php" ?>
<?php

if (isset($_POST['send'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $message = $_POST['message'];
    $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "Query Sent. We will contact you shortly";
    } else {
        $error = "Something went wrong. Please try again";
    }
}
?>
<?php include_once "include/top_header.php" ?>
<?php include_once "include/main_header.php" ?>
<?php include_once "include/main_menu.php" ?>
<!-- Contact Area Start -->
<section class="dlauto-contact-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-left">
                    <h3>Get in touch</h3>
                    <?php if ($error) { ?>
                        <div class="errorWrap"><strong>ERROR</strong>:
                            <?php echo htmlentities($error); ?>
                        </div>
                    <?php } else if ($msg) { ?>
                        <div class="succWrap"><strong>SUCCESS</strong>:
                            <?php echo htmlentities($msg); ?>
                        </div>
                    <?php } ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="text" placeholder="Your Name" name="fullname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="tel" name="contactno" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-contact-field">
                                    <textarea placeholder="Write here your message" name="message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-contact-field">
                                    <button type="submit" name="send" class="dlauto-theme-btn"><i class="fa fa-paper-plane"></i>Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-right">
                    <h3>Contact information</h3>
                    <div class="map-responsive">

                        <iframe src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3788.44101230263!2d95.32069131537752!3d18.281429381214384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c74168b442ce2f%3A0xc7368071ac7ad279!2sMyat%20Thuta!5e0!3m2!1sen!2smm!4v1635389667177!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                    <div class="contact-details">
                        <p><i class="fa fa-map-marker"></i>125 School Road, Myanaung, Myanmar</p>
                        <div class="single-contact-btn">
                            <h4>Email Us</h4><a href="mailto:admin@driverless.com">info@example.com</a>
                        </div>
                        <div class="single-contact-btn">
                            <h4>Call Us</h4><a href="tel:09422571685">+(95)09-422571658</a>
                        </div>
                        <div class="social-links-contact">
                            <h4>Follow Us:</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Area End -->
<?php include_once "include/footer.php" ?>