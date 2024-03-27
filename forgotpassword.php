<?php include_once "include/config.php" ?>
    <?php include_once "include/header.php" ?>
        <?php include_once "include/top_header.php" ?>
            <?php include_once "include/main_header.php" ?>
                <?php  include_once "include/main_menu.php" ?>

                    <?php
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile No is invalid');</script>"; 
}
}

?>
                        <script type="text/javascript">
                            function valid() {
                                if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                                    alert("New Password and Confirm Password Field do not match  !!");
                                    document.chngpwd.confirmpassword.focus();
                                    return false;
                                }
                                return true;
                            }

                        </script>

                        <!-- Login Area Start -->
                        <section class="dlauto-login-area section_70">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="login-box">
                                            <div class="login-page-heading">
                                                <h3>Password Recovery</h3></div>
                                            <form name="chngpwd" method="post" onSubmit="return valid();">
                                                <div class="account-form-group">
                                                    <input type="text" placeholder="Email Address*" name="email" required="required"><i class="fa fa-user"></i></div>
                                                <div class="account-form-group">
                                                    <input type="text" placeholder="Your Reg. Phone*" name="mobile" required="required"><i class="fa fa-phone"></i></div>

                                                <div class="account-form-group">
                                                    <input type="password" placeholder="Password" name="newpassword" required="required"><i class="fa fa-lock"></i></div>
                                                <div class="account-form-group">
                                                    <input type="password" placeholder="Confirm Password" name="confirmpassword" required="required"><i class="fa fa-lock"></i></div>

                                                <p>
                                                    <button type="submit" name="update" value="updatePassword" class="dlauto-theme-btn">Reset My Password</button>
                                                </p>
                                            </form>
                                            <div class="login-sign-up">
                                                <a href="login.php">
                                                    << Back to Login</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Login Area End -->
                        <?php include_once "include/footer.php" ?>
