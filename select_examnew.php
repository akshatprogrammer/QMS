<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
$cat = $_GET['cat'];
?>
<?php
include "connection.php";
include "header.php";
?>


    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <input type="button" class="btn btn-success form-control" value="<?php echo $cat; ?>" style="margin-top: 10px; background-color: blue; color: white" onclick="set_exam_type_session(this.value); openFullscreen()">
        </div>
    </div>
<?php
include "footer.php";
?>
<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?category="+ exam_category,true);
        xmlhttp.send(null);
    }
</script>
