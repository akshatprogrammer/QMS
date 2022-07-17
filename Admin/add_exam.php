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
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Exam Category</h1>
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
                                        <div class="card-header"><strong>Add Exam</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="category" class=" form-control-label">Category</label><input type="text" id="company" name="category" placeholder="Enter exam category" class="form-control" required></div>
                                            <div class="form-group"><label for="time" class=" form-control-label">Time (in Minutes)</label><input type="text" id="vat" placeholder="Enter Time" name="time" class="form-control" required></div>
                                            <div class="form-group"><label for="time" class=" form-control-label">Admin Name: </label><input type="text" id="vat" placeholder="Enter name of admin" name="admin" class="form-control" required></div>
                                            <div class="form-group">
                                                <input type="submit" value="Add Exam" name="submit" class="btn btn-success">
                                            </div>
                                            <div class="alert alert-danger" id="error" style="margin-top: 10px; display: none;">
                                                <strong>Already! Try Editing it</strong> .
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">View Exam Category</strong>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">Exam Name</th>
                                                        <th scope="col">Exam Time</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 0;
                                                    $res = mysqli_query($link, "select * from category where adminname='$_SESSION[admin]'");
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        $count = $count + 1;
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $count; ?></th>
                                                            <td><?php echo $row["category"]; ?></td>
                                                            <td><?php echo $row["time_minutes"]; ?></td>
                                                            <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                                            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>

                                                </tbody>
                                            </table>
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
    if (isset($_POST["submit"])) {
        $count = 0;
        $res = mysqli_query($link, "select * from category where category='$_POST[category]'");
        $count = mysqli_num_rows($res);
        if ($count > 0) {
    ?>
            <script type="text/javascript">
                document.getElementById("error").style.display = "block";
                document.getElementById("success").style.display = "none";
            </script>
        <?php
        } else {
            if($_POST["admin"]==$_SESSION["admin"])
         {   mysqli_query($link, "insert into category values(NULL,'$_POST[category]','$_POST[time]','$_POST[admin]')") or die(mysqli_error($link));
            ?>
            <script type="text/javascript">
                alert("Exam Added Successfully");
                window.location.href = window.location.href;
            </script>
            <?php
    }
            else{
                ?>
            <script type="text/javascript">
                alert("HEHE Wrong Admin :(");
            </script>
                <?php
            }
        }
    }
    ?>
    <?php
    include "footer.php";
    ?>