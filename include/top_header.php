     <?php
        error_reporting(0); ?>
     <?php include_once "config.php" ?>
     <!-- Header Top Area Start -->
     <section class="dlauto-header-top-area">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="header-top-left">
                         <p>Need Help?: <a href="tel:09422571685"><i class="fa fa-phone"></a></i>Call: +95 0942251978</p>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <?php
                        $sql = "SELECT EmailId,ContactNo from tblcontactusinfo";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results as $result) {
                            $email = $result->EmailId;
                            $contactno = $result->ContactNo;
                        }
                        ?>
                     <?php if (strlen($_SESSION['login']) == 0) {
                        ?>

                         <div class="header-top-right">
                             <a href="login.php"><i class="fa fa-key"></i>login</a>
                             <a href="register.php"><i class="fa fa-user"></i> register</a>
                             <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
                             </meta>
                           
                             <div class="dropdown" >
                                 <div id="google_translate_element">
                                 </div>
                                 <script type="text/javascript">
                                     function googleTranslateElementInit() {
                                         new google.translate.TranslateElement({
                                             pageLanguage: 'en',
                                             includedLanguages: 'my,ja',
                                             layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                         }, 'google_translate_element');
                                     }
                                 </script>
                                 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                             </div>
                         </div>


                     <?php } else {

                            echo "Welcome To Driver Less Car rental ";
                        ?>

                         <div class="header-top-right">
                             <div class="dropdown">
                                 <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                         <?php
                                            $email = $_SESSION['login'];
                                            $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':email', $email, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {

                                                    echo htmlentities($result->FullName);
                                                }
                                            } ?>
                                         <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                     <ul class="dropdown-menu">
                                         <?php if ($_SESSION['login']) { ?>
                                             <li><a href="profile.php">Profile Settings</a></li>
                                             <li><a href="update-password.php">Update Password</a></li>

                                             <li><a href="logout.php">Sign Out</a></li>
                                         <?php } ?>
                                     </ul>
                                 </li>
                             </div>
                         </div>

                     <?php } ?>

               
                 </div>


             </div>
         </div>

     </section>
     <!-- Header Top Area End -->