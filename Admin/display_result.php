<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"])){
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
                                </center>
                                <?php 
                                $count=0;                                
                                $res = mysqli_query($link,"select * from quiz_result where exam_type='Java' order by correct desc");
                                $count = mysqli_num_rows($res);
                                if($count==0){
                                    ?>
                                    <center>
                                        <h1>No Result Found</h1>
                                    </center> 
                                    <?php
                                }
                                else{
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr style='background-color: #006df0; color: white'>";
                                    echo "<th>"; echo "username"; echo "</th>";
                                    echo "<th>"; echo "exam type"; echo "</th>";
                                    echo "<th>"; echo "total correct"; echo "</th>";
                                    echo "<th>"; echo "Marks"; echo "</th>";
                                    echo "<th>"; echo "exam time"; echo "</th>";
                                    echo "</tr>";
                                }
                                while ($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row ["username"]; echo "</td>";
                                    echo "<td>"; echo $row ["exam_type"]; echo "</td>";
                                    echo "<td>"; echo $row ["correct"]; echo "</td>";
                                    echo "<td>"; echo $row["correct"]*4; echo "</td>";
                                    echo "<td>"; echo $row ["exam_time"]; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                $count=0;                                
                                $res = mysqli_query($link,"select * from quiz_result where exam_type='Cpp' order by correct desc");
                                $count = mysqli_num_rows($res);
                                if($count==0){
                                    ?>
                                    <center>
                                        <h1>No Result Found</h1>
                                    </center> 
                                    <?php
                                }
                                else{
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr style='background-color: #006df0; color: white'>";
                                    echo "<th>"; echo "username"; echo "</th>";
                                    echo "<th>"; echo "exam type"; echo "</th>";
                                    echo "<th>"; echo "total correct"; echo "</th>";
                                    echo "<th>"; echo "Marks"; echo "</th>";
                                    echo "<th>"; echo "exam time"; echo "</th>";
                                    echo "</tr>";
                                }
                                while ($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row ["username"]; echo "</td>";
                                    echo "<td>"; echo $row ["exam_type"]; echo "</td>";
                                    echo "<td>"; echo $row ["correct"]; echo "</td>";
                                    echo "<td>"; echo $row["correct"]*4; echo "</td>";
                                    echo "<td>"; echo $row ["exam_time"]; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                    
                                
                                   $count=0;                                
                                $res = mysqli_query($link,"select * from quiz_result where exam_type='Web Development' order by correct desc");
                                $count = mysqli_num_rows($res);
                                if($count==0){
                                    ?>
                                    <center>
                                        <h1>No Result Found</h1>
                                    </center> 
                                    <?php
                                }
                                else{
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr style='background-color: #006df0; color: white'>";
                                    echo "<th>"; echo "username"; echo "</th>";
                                    echo "<th>"; echo "exam type"; echo "</th>";
                                    echo "<th>"; echo "total correct"; echo "</th>";
                                    echo "<th>"; echo "Marks"; echo "</th>";
                                    echo "<th>"; echo "exam time"; echo "</th>";
                                    echo "</tr>";
                                }
                                while ($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row ["username"]; echo "</td>";
                                    echo "<td>"; echo $row ["exam_type"]; echo "</td>";
                                    echo "<td>"; echo $row ["correct"]; echo "</td>";
                                    echo "<td>"; echo $row["correct"]*4; echo "</td>";
                                    echo "<td>"; echo $row ["exam_time"]; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                    
                                
                                   $count=0;                                
                                $res = mysqli_query($link,"select * from quiz_result where exam_type='Machine Learning' order by correct desc");
                                $count = mysqli_num_rows($res);
                                if($count==0){
                                    ?>
                                    <center>
                                        <h1>No Result Found</h1>
                                    </center> 
                                    <?php
                                }
                                else{
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr style='background-color: #006df0; color: white'>";
                                    echo "<th>"; echo "username"; echo "</th>";
                                    echo "<th>"; echo "exam type"; echo "</th>";
                                    echo "<th>"; echo "total correct"; echo "</th>";
                                    echo "<th>"; echo "Marks"; echo "</th>";
                                    echo "<th>"; echo "exam time"; echo "</th>";
                                    echo "</tr>";
                                }
                                while ($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row ["username"]; echo "</td>";
                                    echo "<td>"; echo $row ["exam_type"]; echo "</td>";
                                    echo "<td>"; echo $row ["correct"]; echo "</td>";
                                    echo "<td>"; echo $row["correct"]*4; echo "</td>";
                                    echo "<td>"; echo $row ["exam_time"]; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                    
                                ?>
                                </div>
                        </div> <!-- .card -->   
                    </div>
                    <!--/.col-->

                </div><!-- .animated -->
            </div><!-- .content -->
<?php
include "footer.php";
?>       