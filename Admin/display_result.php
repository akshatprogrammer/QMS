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
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">

        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h1>Leaderboard</h1>
                            <input type="button" onclick="printDiv('print')" value="Print Leaderboard" />
                        </center>
                        <div id="print">
                        <?php
                            $newsql = mysqli_query($link,"select * from category");
                            while($newrow = mysqli_fetch_array($newsql)){
                        $count = 0;
                        $res = mysqli_query($link, "select * from quiz_result where exam_type='$newrow[category]' order by correct desc");
                        $count = mysqli_num_rows($res);
                        if ($count == 0) {
                        ?>
                            <center>
                                <!-- <h1>No Result Found for</h1> -->
                            </center>
                        <?php
                        } else {
                            echo "<table class='table table-bordered'>";
                            echo "<tr style='background-color: #006df0; color: white'>";
                            echo "<th>";
                            echo "username";
                            echo "</th>";
                            echo "<th>";
                            echo "exam type";
                            echo "</th>";
                            echo "<th>";
                            echo "total correct";
                            echo "</th>";
                            echo "<th>";
                            echo "Marks";
                            echo "</th>";
                            echo "<th>";
                            echo "exam time";
                            echo "</th>";
                            echo "</tr>";
                        }
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["username"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["exam_type"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["correct"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["correct"] * 4;
                            echo "</td>";
                            echo "<td>";
                            echo $row["exam_time"];
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";   
                    }
                        ?>         
                        </div>
                    </div>
                </div> <!-- .card -->
            </div>
            <!--/.col-->

        </div><!-- .animated -->
    </div><!-- .content -->
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <?php
    include "footer.php";
    ?>