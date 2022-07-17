<?php
session_start();
include "header.php";
include "../connection.php";
if (!isset($_SESSION["admin"])) {
?>
    <script>
        window.location = "index.php";  
    </script>
<?php
}
?>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Share Quiz</h1>
                </div>
            </div>
        </div>

    </div>
    <script>
        
        function SendEmail() {
            var x = Math.floor((Math.random() * 1000) + 123);
            var temp = x;
            var cat = document.getElementById("cat").value;
            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "akshatvideos89@gmail.com",
                Password: "F4A106CFB951FCEDBD36DB8EA2E8F7E640EE",
                To: document.getElementById("email").value,
                From: "akshatvideos89@gmail.com",
                Subject: "UID is: "+temp + " Category is "+cat,
                Body: "http://localhost/QMS/login.php?uid=" + temp + "&cat="+cat + "<br>" + "http://localhost/QMS/select_examnew.php?cat="+cat + " is you test link",
            }).then((success) => {
                alert("message sent successfully. Please check the spam folder in your mail.");
            }).catch((error) => {
                alert("error sending message");
            });
        }
    </script>
    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>QUIZ</h1>
                            <?php
                            $res = mysqli_query($link,"select * from  category where adminname='$_SESSION[admin]'") or die(mysqli_error($link));
                            echo "<table>";
                            while($row = mysqli_fetch_array($res)) {
                                echo "<tr> <td>" . $row['category'] . " </td> </tr>";
                            }
                            echo "</table> <br> <br>";
                            ?>
                            <div class="d-grid">
                                <form id="form" onsubmit="SendEmail();reset(); return false;">
                                    <h1></h1>
                                    <label for="email">Enter your email:</label>
                                    <input type="email" id="email" name="email"> <br>
                                    <label for="cat"></label>
                                    Enter Category: <input type="text" id="cat" name="cat"> <br>
                                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div>
                <!--/.col-->

            </div><!-- .animated -->
        </div><!-- .content -->
        <?php
        include "footer.php";
        ?>