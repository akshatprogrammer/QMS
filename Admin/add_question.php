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
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Select Exam Category</h1>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Exam Name</th>
                                        <th scope="col">Exam Time</th>
                                        <th scope="col">Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $res = mysqli_query($link, "select * from category");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["time_minutes"]; ?></td>
                                            <td><a href="edit_question.php?id=<?php echo $row["id"]; ?>">Select</a></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- .card -->
                </div>
                <!--/.col-->
            </div><!-- .animated -->
        </div><!-- .content -->
        <?php
        include "footer.php";
        ?>