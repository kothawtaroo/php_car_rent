<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>
   <!-- Footer Area Start -->
    <footer class="dlauto-footer-area">
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-footer">
                            <div class="footer-logo">
                                <a href="#"><img src="assets/img/footer-logo.png" alt="footer-logo" /></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis pariatur quidem provident sunt consequatur vel ..</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-footer quick_links">
                            <h3>Quick Links</h3>
                            <ul class="quick-links">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Case Studies</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                            <ul class="quick-links">
                                <li><a href="admin/index.php">Admin Login</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">latest News</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                    <div class="single-footer newsletter_box">

                            <h3>newsletter</h3>
                            <form method="post">
                                <input type="email" name="subscriberemail" required placeholder="Email Address" />
                                <button type="submit" name="emailsubscibe"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p class="copy-right">Copyright &copy; 2021 Driver Less Car Rental . All Rights Reserved.</p>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                       
                        <div class="footer-social">
                            <ul>
                                <li><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="www.likin.com"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="www.skype.com"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!--Jquery js-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap js-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Owl-Carousel js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--Lightgallery js-->
    <script src="assets/js/lightgallery-all.js"></script>
    <script src="assets/js/custom_lightgallery.js"></script>
    <!--Slicknav js-->
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!--Magnific js-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--Nice Select js-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Datepicker JS -->
    <script src="assets/js/jquery.datepicker.min.js"></script>
    <!--ClockPicker JS-->
    <script src="assets/js/jquery-clockpicker.min.js"></script>
    <!--Main js-->
    <script src="assets/js/main.js"></script>
    
    

</body>

</html>