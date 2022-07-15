<?php
include "../connection.php";
$id = $_GET['id'];
mysqli_query($link,"delete from category where id=$id");
?>
<script>
    window.location = "add_exam.php";
</script>