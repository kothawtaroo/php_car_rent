<?php include_once "include/config.php" ?>
   <?php include_once "include/header.php" ?>
    <?php include_once "include/top_header.php" ?>
        <?php include_once "include/main_header.php" ?>
            <?php  include_once "include/main_menu.php" ?>
<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_email.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
               
                <!-- Register Area Start -->
                <section class="dlauto-login-area section_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="login-box">
                                    <div class="login-page-heading"><i class="fa fa-key"></i>
                                        <h3>sign Up</h3></div>
                                    <form method="post" name="signup" onSubmit="return valid();">
                                        <div class="account-form-group">
                                            <input type="text" placeholder="FULL NAME" name="fullname" required="required"><i class="fa fa-user"></i></div>
                                        <div class="account-form-group">
                                            <input type="text" placeholder="Email" name="emailid" required="required" id="emailid" onBlur="checkAvailability()"><i class="fa fa-envelope-o"></i>
                                            </div>
                                        <div class="account-form-group">
                                            <input type="text" placeholder="phone" name="mobileno" maxlength="12"required="required"><i class="fa fa-phone"></i></div>
                                        <div class="account-form-group">
                                            <input type="password" placeholder="Password" name="password" required="required"><i class="fa fa-lock"></i></div>
                                        <div class="account-form-group">
                                            <input type="password" placeholder="Confirm Password" name="confirmpassword" required="required"><i class="fa fa-lock"></i></div>
                                        
                                        <div class="remember-row">
                                            <p class="checkbox remember signup">
                                                <input class="checkbox-spin" type="checkbox" id="Freelance" required="required">
                                                <label for="Freelance"><span></span>accept terms & condition</label>
                                            </p>
                                        </div>
                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                        <p>
                                            <button type="submit" value="Sign Up" name="signup" id="submit" class="dlauto-theme-btn">Register now</button>
                                        </p>
                                    </form>
                                    <div class="login-sign-up"><a href="login.php">Already have an account?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Register Area End -->
                <?php include_once "include/footer.php" ?>
