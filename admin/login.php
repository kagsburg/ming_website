<?php 
include 'db/config.php';
if(isset($_SESSION['user'])){
header('Location:.');
}                                         
   $statusMsg = "";
if(isset($_POST['username'],$_POST['password'])){
     $name=mysqli_real_escape_string($db,$_POST['username']);
$pass=mysqli_real_escape_string($db,$_POST['password']);
if($name&&$pass){
$cust=mysqli_query($db,"SELECT * FROM users WHERE username='$name' AND password='".md5($pass)."' AND activate='1'");
$rows=mysqli_num_rows($cust);
if($rows>0){
$row=mysqli_fetch_array($cust);
$cust_id=$row['user_id'];
$level=$row['level'];
$_SESSION['user']=$cust_id;
$_SESSION['userlevel']=$level;
$_SESSION['username']=$row['username'];
header("location:.");
}else{
    $statusMsg="Invalid Username or Password";
}
}
}else {
    // echo error to submit all detials
}

?>
<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured Minagrico Admin ">
        <meta name="author" content="">

        <!-- App Favicon -->
        <!-- <link rel="icon"   type="image/png"    href="assets/images/fav.png" /> -->

        <!-- App title -->
        <title>Minagrico Admin</title>

        <!-- App CSS -->
   <link href="images/icon/favicon.ico" rel="icon">

    <!-- Vendor CSS-->
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
        <style>
            body {
  background: none;
  font-family: 'Arimo', sans-serif;
  margin: 0;
  padding-bottom: 60px;
  overflow-x: hidden;
  color: #797979;
}
html {
  position: relative;
  min-height: 100%;
    background: url(images/bg-title-01.jpg);
    background-size: cover;
    background-position: bottom;
}


        </style>

    </head>
    <body>
        <?php 
        if ($statusMsg != ""){ ?>
        <div class="alert  alert-danger alert-dismissible fade show">
            <?php echo $statusMsg; ?>
        </div>
            <?php 
        }

        ?>
            <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                            <div class="mb-2">
                                            <img src="images/icon/logo.png" alt="logo" class="img-thumbnail img-circle">
                                        </div>
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="exampleInputEmail" name="username" 
                                        placeholder="Enter Username...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" name="password" placeholder="Password">
                                </div>
                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                                <!-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<!-- 
        <div class="text-center logo-alt-box">
       
            <a href="" class="logo"><img src="images/icon/logo.png"></a>
           
        </div>

        <div class="wrapper-page">

        	<div class="m-t-30 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-10" action="" method="POST">

						<div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required placeholder="Username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required placeholder="Password" name="password">
                            </div>
                        </div>

                       

						<div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-success text-uppercase" type="submit">Log In</button>
                            </div>
                        </div>



					</form>

                </div>
            </div>
          

        </div> -->
        <!-- end wrapper page -->
            <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

	</body>

</html>