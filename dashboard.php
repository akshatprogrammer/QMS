<?php
session_start();
include "header1.php";
if(!isset($_SESSION["username"])){
?>
<script>
    window.location = "login.php";
</script>
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
<?php
}
?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <!-- Yaha se shuru -->
        <br>
        <div class="row">
            <br>
            <div class="col-lg-2 col-lg-push-10">
                <div id="curr_q" style="float: left;">0</div>
                <div style="float: left;">/</div>
                <div id="total_q" style="float: left;">0</div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color:white;" id="load_que" >

                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                    <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Previous" onclick="load_prev()">&nbsp;
                        <input type="button" class="btn btn-success" value="Next" onclick="load_next()">&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <!-- Yaha pe khatm -->
    </div>
</div>
<script>
    function load_total() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_q").innerHTML =  xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }
    var qno=1;
    load_question(qno);
    function load_question(qno){
        document.getElementById("curr_q").innerHTML = qno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText=="over"){
                    window.location="result.php";
                }
                else{
                    document.getElementById("load_que").innerHTML = xmlhttp.responseText;
                    load_total();
                }
            }
        };
        xmlhttp.open("GET", "forajax/load_ques.php?qno="+qno, true);
        xmlhttp.send(null);
    }
    function radioclick(radiovalue,queno){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
            }
        };
        xmlhttp.open("GET", "forajax/save_answer_in_session.php?queno="+queno+"&value1="+radiovalue, true);
        xmlhttp.send(null);
    }
    function load_prev(){
        if(qno=="1"){
            load_question(qno);
        }
        else{
            qno = eval(qno)-1;
            load_question(qno);
        }
    }
    function load_next(){
            qno = eval(qno)+1;
            load_question(qno);
    }
</script>
<?php
include "footer.php";
?>