<?php
session_start();
include "header.php";
include "../connection.php";
$res = mysqli_query($link,"select * from category");
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
        var x = Math.floor((Math.random() * 1000) + 123);
        var temp  = x;
        function sendEmail(){
            var st = document.getElementById("start").value;
            var et = document.getElementById("end").value;
            var sh = st.substr(0,2);
            var eh = et.substr(0,2);
            var sm = st.substr(3);
            var em = et.substr(3);
            var sdate = document.getElementById("dateS").value;
            var edate = document.getElementById("dateE").value;
            var sMon = sdate.substr(5,2);
            var eMon = edate.substr(5,2);

            var sDay = sdate.substr(8,2);
            var eDay = edate.substr(8,2);
            const d = new date();
            let th = d.getHours();
            let tm = d.getMinutes();
            let tday = d.getDay();
            let tmonth = d.getMonth();
             
            Email.send({
                
            Host: "smtp.elasticemail.com", 
            Username: "fakesocial89@gmail.com",
            Password: "08080949B500D11285079276711A994A8B4E",
            To: document.getElementById("email").value,
            From: "fakesocial89@gmail.com",
            Subject: `Just messaged you from the website form`,
            Body: "http://localhost/QMS/login.php?uid="+temp+" <br> Your UID is " + temp +"<br>" + "SH-> " + sh +" " +sm + " " + sDay,
            }).then((success) => {
            alert("hi");
            
            }).catch((error) => {
                
            alert("error sending message");
            })
            // temp=temp+1;
  }
        </script>
    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid">
                            <form method="post">   
                                <h1>Share</h1>
                                <label for="email">Enter your email:</label>
                                <input type="email" id="email" name="email" required> <br>
                                Start Date :
                                <input type="date" id="dateS" min="2022-07-17" max="2022-08-15" required> TIME: 
                                <input type="text" placeholder="HH:MM" id="start" pattern="^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$" required> <br>
                                End Time :
                                <input type="date" id="dateE" min="2022-07-17" max="2022-08-15" required> TIME: 
                                <input type="text" placeholder="HH:MM" id="end" pattern="^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$" required> <br>
                                <input type="submit" class="btn btn-primary btn-block" value="Send" onclick="sendEmail()"/>
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