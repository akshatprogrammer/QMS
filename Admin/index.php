<?php
session_start();
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="data:image/png;base64,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" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit1">
                            Login
                        </button>
                        <button type="button" class="btn btn-info" onclick="location.href = '../guidelines/index.html'" style="margin-top: 20px;">Please read Info before creating quiz!</button>
                    </div>
                    <div class="alert alert-danger" id="error" style="margin-top: 10px; display: none;">
                        <strong>Invalid!</strong> Username or Password.
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="indexReg.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>

<?php
if (isset($_POST["submit1"])) {
    $username = mysqli_real_escape_string($link,$_POST["username"]);
    $password = mysqli_real_escape_string($link,$_POST["pass"]);
    $count=0;
    $res = mysqli_query($link,"select * from admin where username='$username' && password='$password'");
    $count = mysqli_num_rows($res);

    if($count==0){
        ?>
            <script type="text/javascript">
            document.getElementById("error").style.display="block";
            </script>
        <?php
    }
    else{
        $_SESSION["admin"]=$username;
        ?>
        <script type="text/javascript">
            window.location="demo.php";
        </script>
        <?php
    }
}
?>
