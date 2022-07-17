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
$exam_category = '';
$id = $_GET['id'];
$res = mysqli_query($link, "select * from category where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row['category'];
}
?>
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Questions inside <?php echo "<font color='red'>" .  $exam_category . "</font>"; ?></h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form1" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Question with Texts</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="category" class=" form-control-label">Question</label><input type="text" required id="company" name="question" placeholder="Enter question" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 1</label><input type="text" required id="company" name="opt1" placeholder="Enter option" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 2</label><input type="text" required id="company" name="opt2" placeholder="Enter option" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 3</label><input type="text" required id="company" name="opt3" placeholder="Enter option" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 4</label><input type="text" required id="company" name="opt4" placeholder="Enter option" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Answer</label><input type="text" required id="company" name="ans" placeholder="Enter answer" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Name of Admin</label><input type="text" required id="company" name="admin" placeholder="Enter admin name" class="form-control"></div>
                                            <div class="form-group">
                                                <input type="submit" value="Add Question" name="submit" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Question with Images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="category" class=" form-control-label">Question</label><input type="text" name="fquestion" placeholder="Enter question" class="form-control"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 1</label><input type="file" name="fopt1" class="form-control" style="padding-bottom: 45px;"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 2</label><input type="file" name="fopt2" class="form-control" style="padding-bottom: 45px;"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 3</label><input type="file" name="fopt3" class="form-control" style="padding-bottom: 45px;"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Option 4</label><input type="file" name="fopt4" class="form-control" style="padding-bottom: 45px;"></div>
                                            <div class="form-group"><label for="category" class=" form-control-label">Answer</label><input type="file" name="fans" class="form-control" style="padding-bottom: 45px;"></div>
                                            <div class="form-group">
                                                <input type="submit" value="Add Question" name="submit1" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </form>
                </div>
                <!--/.col-->

            </div><!-- .animated -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Que No.</th>
                                    <th>Question</th>
                                    <th>Choice 1</th>
                                    <th>Choice 2</th>
                                    <th>Choice 3</th>
                                    <th>Choice 4</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                $res = mysqli_query($link, "select * from questions where category='$exam_category' && adminname='$_SESSION[admin]' order by qno asc");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["qno"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["question"];
                                    echo "</td>";
                                    echo "<td>";
                                    if (strpos($row["opt1"], 'opt_images/') != false) {
                                ?>
                                        <img src="<?php echo $row["opt1"] ?>" height="50" width="50">
                                    <?php

                                    } else {
                                        echo $row["opt1"];
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if (strpos($row["opt2"], 'opt_images/') != false) {
                                    ?>
                                        <img src="<?php echo $row["opt2"] ?>" height="50" width="50">
                                    <?php

                                    } else {
                                        echo $row["opt2"];
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if (strpos($row["opt3"], 'opt_images/') != false) {
                                    ?>
                                        <img src="<?php echo $row["opt3"] ?>" height="50" width="50">
                                    <?php

                                    } else {
                                        echo $row["opt3"];
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if (strpos($row["opt4"], 'opt_images/') != false) {
                                    ?>
                                        <img src="<?php echo $row["opt4"] ?>" height="50" width="50">
                                    <?php

                                    } else {
                                        echo $row["opt4"];
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if (strpos($row["opt4"], 'opt_images/') != false) {
                                    ?>
                                        <a href="edit_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                    <?php

                                    } else {
                                    ?>
                                        <a href="edit_opt.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                    <?php
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <a href="delete_opt.php?id=<?php echo $row["id"];  ?>&id1=<?php echo $id; ?>">Delete</a>
                                    <?php
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .content -->

        <?php
        if (isset($_POST['submit'])) {
            $loop = 0;
            $count = 0;
            $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);
            if ($count == 0) {
            } else {
                while ($row = mysqli_fetch_array($res)) {
                    $loop = $loop + 1;
                    mysqli_query($link, "update questions set qno='$loop' where id = $row[id]");
                }
            }
            $loop = $loop + 1;
            if($_POST['admin']==$_SESSION['admin']){
                mysqli_query($link, "insert into questions values (NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[ans]', '$exam_category','$_POST[admin]')") or die(mysqli_error($link));
                ?>
            <script>
                alert("Question Added Successfully!");
                window.location.href = window.location.href;
            </script>
        <?php
            }else{
                ?>
                <script>
                alert("Wrong Admin");
                </script>
                <?php
            }
        }
        ?>


        <?php
        if (isset($_POST['submit1'])) {
            $loop = 0;
            $count = 0;
            $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);
            if ($count == 0) {
            } else {
                while ($row = mysqli_fetch_array($res)) {
                    $loop = $loop + 1;
                    mysqli_query($link, "update questions set qno='$loop' where id = $row[id]");
                }
            }
            $loop = $loop + 1;
            $tm = md5(time());

            $fnm1 = $_FILES["fopt1"]["name"];
            $dst1 = "./opt_images/" . $tm . $fnm1;
            $dst_db1 = "opt_images/" . $tm . $fnm1;
            move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

            $fnm2 = $_FILES["fopt2"]["name"];
            $dst2 = "./opt_images/" . $tm . $fnm2;
            $dst_db2 = "opt_images/" . $tm . $fnm2;
            move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

            $fnm3 = $_FILES["fopt3"]["name"];
            $dst3 = "./opt_images/" . $tm . $fnm3;
            $dst_db3 = "opt_images/" . $tm . $fnm3;
            move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

            $fnm4 = $_FILES["fopt4"]["name"];
            $dst4 = "./opt_images/" . $tm . $fnm4;
            $dst_db4 = "opt_images/" . $tm . $fnm4;
            move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

            $fnm5 = $_FILES["fans"]["name"];
            $dst5 = "./opt_images/" . $tm . $fnm5;
            $dst_db1 = "opt_images/" . $tm . $fnm5;
            move_uploaded_file($_FILES["fans"]["tmp_name"], $dst5);


            mysqli_query($link, "insert into questions values (NULL, '$loop', '$_POST[question]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$exam_category')") or die(mysqli_error($link));

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