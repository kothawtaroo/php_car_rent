<?php session_start(); 
include_once "include/config.php" ?>
<?php include_once "include/header.php" ?>
    <?php include_once "include/top_header.php" ?>
        <?php include_once "include/main_header.php" ?>
            <?php  include_once "include/main_menu.php" ?>

<?php
   
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->FullName;
$currentpage=$_SERVER['REQUEST_URI'];
 //echo "<script>window.location='index.php'</script>";     
  //echo "<script>alert('Login Successful')</script>";   
 echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
    
} 
    else
   {
			if (isset($_SESSION['loginError']))
			{
				$countError=$_SESSION['loginError'];
				if ($countError==1)
			{
                   
				$_SESSION['loginError']=2;
				echo "<script>window.alert('Login failed! Please try again! Error Attempt 2')</script>";
			}
			if ($countError==2)
			{
			
                echo "<script>window.alert('Login failed! Error Attempt 3! Account is locked for 20seconds! Please try again later.')</script>";
				echo "<script>window.location='LoginTimer.php'</script>";
			}
		
		}
			else
			{
               
				$_SESSION['loginError']=1;
				echo "<script>window.alert('Login failed! Please try again! Error Attempt 1')</script>";
			}
		}

}

?>
  
   
                <!-- Login Area Start -->
                <section class="dlauto-login-area section_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="login-box">
                                    <div class="login-page-heading"><i class="fa fa-key"></i>
                                        <h3>sign in</h3></div>
                                    <form  method="post" onSubmit="return valid();">
                                
                                
                                        <div class="account-form-group">
                                            <input type="text" placeholder="Email Address*" name="email" required="required"><i class="fa fa-user"></i></div>
                                        <div class="account-form-group">
                                            <input type="password" placeholder="Password" name="password" required="required"><i class="fa fa-lock"></i></div>

                                        <p>
                                            <button type="submit" name="login" value="Login" class="dlauto-theme-btn">Login now</button>
                                        </p>
                                    </form>
                                    
                                    
                                    <div class="login-sign-up"><a href="register.php">Do you need an account?</a><br><a href="forgotpassword.php">Forgot Password?</a></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Login Area End -->
                <?php include_once "include/footer.php" ?>
