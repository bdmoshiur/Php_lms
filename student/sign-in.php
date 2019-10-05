<?php
 require_once '../dbconn.php';

session_start();
if (isset($_SESSION['student_login'])) {
        header("location: index.php");
    }

 ?>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `students` WHERE `email`= '$email' OR `username`= '$email' ";
   $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) ==1 ) {
       $row = mysqli_fetch_assoc($result);
       if (password_verify ($password ,$row['password'] )) {
           if ($row['status'] == 1) {

              $_SESSION['student_login'] = $email;
              $_SESSION['student_id'] = $row['id'];
              header("location :index.php");

           }else{
            $error = "Your status inactive!";
           }
       }else{
        $error = "Password invalid!";
       }
    }else{
        $error = "Email or Username invalid!";
    }
}
?>





<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div>
          <h1 class="text-center">LMS</h1>


                  <?php
                if (isset($error)) {
            ?>
             <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-danger" role="alert">
                    <?= $error?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              </div>
          </div>
             <?php
                }
            ?>


        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= isset($email) ? $email :'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="login" value="Sign in">
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assetsvendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assetsvendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assetsvendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assetsjavascripts/template-script.min.js"></script>
<script src="../assetsjavascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
