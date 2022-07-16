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
$id = $_GET['id'];
$id1 = $_GET['id1'];
$que = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$ans = "";
$res = mysqli_query($link, "select * from questions where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $que = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $ans = $row["answer"];
}
?>
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><strong>Update questions with Images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="category" class=" form-control-label">Question</label><input type="text" required name="fquestion" value="<?php echo $question; ?>" class="form-control"></div>
                                            <div class="form-group">
                                                <img src="<?php echo $opt1; ?>" height="50" width="50"> <br>
                                                <label for="category" class=" form-control-label">Option 1</label><input type="file" name="fopt1" required class="form-control" style="padding-bottom: 45px;">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $opt2; ?>" height="50" width="50"> <br>
                                                <label for="category" class=" form-control-label">Option 2</label><input type="file" name="fopt2" required class="form-control" style="padding-bottom: 45px;">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $opt3; ?>" height="50" width="50"> <br>
                                                <label for="category" class=" form-control-label">Option 3</label><input type="file" name="fopt3" required class="form-control" style="padding-bottom: 45px;">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $opt4; ?>" height="50" width="50"> <br>
                                                <label for="category" class=" form-control-label">Option 4</label><input type="file" name="fopt4" required class="form-control" style="padding-bottom: 45px;">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $ans; ?>" height="50" width="50"> <br>
                                                <label for="category" class=" form-control-label">Answer</label><input type="file" name="fans" required class="form-control" style="padding-bottom: 45px;">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Update Question" name="submit1" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .card -->
                </div>
                <!--/.col-->

            </div><!-- .animated -->
        </div><!-- .content -->
        <?php
        if (isset($_POST["submit1"])) {
            $opt1 = $_FILES["fopt1"]["name"];
            $opt2 = $_FILES["fopt2"]["name"];
            $opt3 = $_FILES["fopt3"]["name"];
            $opt4 = $_FILES["fopt4"]["name"];
            $ans = $_FILES["fans"]["name"];

            $tm = md5(time());

            if ($opt1 != "") {

                $dst1 = "./opt_images/" . $tm . $opt1;
                $dst_db1 = "opt_images/" . $tm . $opt1;
                move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

                mysqli_query($link,"update questions set question='$_POST[fquestion]', opt1 = '$dst_db1' where id = $id");
            }
            if ($opt2 != "") {

                $dst2 = "./opt_images/" . $tm . $opt2;
                $dst_db2 = "opt_images/" . $tm . $opt2;
                move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

                mysqli_query($link,"update questions set question='$_POST[fquestion]', opt2 = '$dst_db2' where id = $id");
            }
            if ($opt3 != "") {

                $dst3 = "./opt_images/" . $tm . $opt3;
                $dst_db3 = "opt_images/" . $tm . $opt3;
                move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

                mysqli_query($link,"update questions set question='$_POST[fquestion]', opt3 = '$dst_db3' where id = $id");
            }
            if ($opt4 != "") {

                $dst4 = "./opt_images/" . $tm . $opt4;
                $dst_db4 = "opt_images/" . $tm . $opt4;
                move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

                mysqli_query($link,"update questions set question='$_POST[fquestion]', opt1 = '$dst_db4' where id = $id");
            }
            if ($ans != "") {

                $dst5 = "./opt_images/" . $tm . $ans;
                $dst_db5 = "opt_images/" . $tm . $ans;
                move_uploaded_file($_FILES["fans"]["tmp_name"], $dst5);

                mysqli_query($link,"update questions set question='$_POST[fquestion]', answer = '$dst_db5' where id = $id");
            }
            mysqli_query($link,"update questions set question='$_POST[fquestion]' where id = $id");
            ?>
            <script>
                alert("Question Added Successfully!");
                window.location.href = window.location.href;
            </script>
        <?php
        }
        ?>
        <?php
        include "footer.php";
        ?>