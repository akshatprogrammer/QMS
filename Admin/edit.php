<?php
include "header.php";
include "../connection.php";
$id = $_GET["id"];
$res = mysqli_query($link,"select * from category where id=$id");
while($row = mysqli_fetch_array($res)){
    $exam = $row['category'];
    $time = $row['time_minutes'];
}
?>
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Exam Category</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form name="form1" action="" method="post">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Exam</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="category" class=" form-control-label">Category</label><input type="text" id="company" name="category" placeholder="Enter exam category" class="form-control" value="<?php echo $exam; ?>"></div>
                                        <div class="form-group"><label for="time" class=" form-control-label">Time (in Minutes)</label><input type="text" id="vat" placeholder="Enter Time"  name = "time" class="form-control" value="<?php echo $time; ?>"></div>
                                        <div class="form-group">
                                            <input type="submit" value="Update Exam" name="submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </form>
                    </div>

                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->

                </div><!-- .animated -->
            </div><!-- .content -->

<?php
if(isset($_POST["submit"])){
    mysqli_query($link,"update category set category='$_POST[category]' , time_minutes = '$_POST[time]' where id=$id") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
        alert("Exam Added Successfully");
        window.location.href="add_exam.php";
    </script>
    <?php
}
?>            
            <?php
            include "footer.php";
            ?>