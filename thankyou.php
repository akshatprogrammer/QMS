<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
            outline: none;
        }
        
        section {
            position: absolute;
            height: 100%;
            width: 100%;
            background: url();
            background-position: center;
            filter: blur(2px) brightness(30%);
        }
        
        body {
            background-image: url("https://aniportalimages.s3.amazonaws.com/media/details/TallylogoANI.jpg");
            background-repeat: no-repeat;
  background-size: 100% 100%;
            margin-top: 100px;
            display: flex;
            min-height: 50vh;
            align-content: center;
            justify-content: center;
        }
        
        .container {
            width: 360px;
            background: #000;
            box-shadow: 0 0 8px rgba(250, 250, 250, 0.6);
            opacity: 0.6;
            margin: 30px;
            padding-top: 10px;
        }
        
        .container form {
            width: 100%;
            text-align: center;
            padding: 25px 20px;
        }
        
        form h1 {
            color: white;
            padding: 10px 0p;
        }
        
        form .id {
            position: relative;
        }
        
        .id i {
            position: absolute;
            font-size: 20px;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        
        form input {
            width: 100%;
            height: 50px;
            margin: 4px 0;
            border: 1px solid #ece7e7;
            border-radius: 3px;
            background: #181717;
            padding: 0 15px;
            font-size: 20px;
        }
        
        form textarea {
            padding: 5px 15px;
            border: 1px solid #f8f6f6;
            border-radius: 3px;
            background: #181717;
            padding: 0 15px;
            font-size: 20px;
            width: 100%;
            margin: 4px 0;
        }
        
        button {
            margin-top: 5px;
            border: none;
            background: #00fff0;
            color: #222;
            padding: 10px 0;
            width: 100%;
            font-size: 20px;
            font-weight: 800;
            cursor: pointer;
            border-radius: 3px;
        }
        
        form input:focus,
        form textarea:focus {
            border: 1px solid #00fff0;
            color: #00fff0;
            transition: all 0.3s ease;
        }
        
        form input:focus::placeholder,
        form textarea:focus::placeholder {
            padding-left: 4px;
            color: #00fff0;
            transition: all 0.3s ease;
        }
        
        #thankyou {
            display: none;
            height: 10%;
            width: 10%;
            padding: 30px;
        }
        #textt{
            color:white;
        }
    </style>
</head>

<body>
    <div class="thankyou">
        <header class="site-header" id="header">
            <h1 class="site-header__title" data-lead-id="site-header-title"></h1>
        </header>

        <!-- <div class="main-content">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <p class="main-content__body" data-lead-id="main-content-body"></p>
        </div> -->

    </div>


    <section></section>
    <div class="container ">
        <form method="post">
            <h1>Give your FeedBack</h1>
            <div class="id">
                <input type="text" name="name" required placeholder="Full name">
                <i class="far fa-user"></i>
            </div>
            <div class="id">
                <input type="email" name="email" required placeholder="Email Adress">
                <i class="far fa-envwlope"></i>
            </div>
            <textarea cols="15" rows="5" name="opp" required placeholder="Enter your opinion.."></textarea>
            <input type="submit" name="submit" value="Send" id="textt">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $res = mysqli_query($link,"insert into feedback values (NULL,'$_POST[name]','$_POST[email]','$_POST[opp]')") or die(mysqli_error($link));
    if($res){
        ?>
        <script>
            alert("FEEDBACK SENT");
            window.location = "login.php";
        </script>
        <?php
    }
}
?>