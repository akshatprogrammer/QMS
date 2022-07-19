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
$que="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$ans="";
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
                    <h1>Edit Options</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Options with Texts</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="category" class=" form-control-label">Question</label><input type="text" required id="company" name="question" value="<?php echo $que;?>" class="form-control"></div>
                                        <div class="form-group"><label for="category" class=" form-control-label">Option 1</label><input type="text" required id="company" name="opt1" value="<?php echo $opt1;?>" class="form-control"></div>
                                        <div class="form-group"><label for="category" class=" form-control-label">Option 2</label><input type="text" required id="company" name="opt2" value="<?php echo $opt2;?>" class="form-control"></div>
                                        <div class="form-group"><label for="category" class=" form-control-label">Option 3</label><input type="text" required id="company" name="opt3" value="<?php echo $opt3;?>" class="form-control"></div>
                                        <div class="form-group"><label for="category" class=" form-control-label">Option 4</label><input type="text" required id="company" name="opt4" value="<?php echo $opt4;?>"  class="form-control"></div>
                                        <div class="form-group"><label for="category" class=" form-control-label">Answer</label><input type="text" required id="company" name="ans" value="<?php echo $ans;?>"  class="form-control"></div>
                                        <div class="form-group">
                                            <input type="submit" value="Update Question" name="submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div>
                <!--/.col-->

            </div><!-- .animated -->
        </div><!-- .content -->
        <?php
            if(isset($_POST["submit"])){
                mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[ans]' where id = $id");
                ?>
                <script>
                    window.location = "edit_question.php?id=<?php echo $id1; ?>";
                </script>
                <?php
            }
        ?>
        <?php
        include "footer.php";
        ?>