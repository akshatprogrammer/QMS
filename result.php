<?php
session_start();
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."$_SESSION[exam_time] minutes"));
include "connection.php";
?>
<?php
include "header1.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
            $correct = 0;
            $wrong = 0;
            $nota=0;
            if(isset($_SESSION["answer"])){
                for($i=1;$i<sizeof($_SESSION["answer"]);$i++){
                    $answer="";
                    $res = mysqli_query($link,"select * from questions where category='$_SESSION[category]'&&qno=$i");
                    while($row = mysqli_fetch_array($res)){
                        $answer = $row["answer"];
                    }
                    if(isset($_SESSION["answer"][$i])){
                        if($answer = $_SESSION["answer"][$i]){
                            $correct++;
                        }
                        else{
                            $wrong++;
                        }
                    }else{
                        $wrong++;
                    }
                }
            }
            $count=0;
            $res = mysqli_query($link,"select * from questions where category ='$_SESSION[category]'");
            $count = mysqli_num_rows($res);
            $wrong=$count-$correct;
            echo "<div class='resultshow'>";
            echo "<br>";echo "<br>";
            echo "<center>";
            echo "Total Question = ". $count; echo "<br>";
            echo "Correct Answer = ". $correct; echo "<br>";
            echo "Wrong Answer = ". $wrong; echo "<br>";
            echo "</center>";
            echo "</div>";
        ?>
    </div>
<?php
if(isset($_SESSION["exam_start"])){
    $date = date("Y-m-d");
    mysqli_query($link,"insert into quiz_result values(NULL,'$_SESSION[username]','$_SESSION[category]','$count','$correct','$wrong','$date')");

}
if(isset($_SESSION["exam_start"])){
    unset($_SESSION["exam_start"]);
    ?>
    <script>
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
</div>
<?php
include "footer.php";
?>