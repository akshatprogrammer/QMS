<?php
session_start();
include "../connection.php";
$qno = "";
$ques = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$ans = "";
$count = 0;
$answer = "";

$queno = $_GET['qno'];

if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}
// echo $_SESSION["category"] . " " . $_GET["qno"];
$res = mysqli_query($link, "select * from questions where category='$_SESSION[category]' && qno='$_GET[qno]'");
$count = mysqli_num_rows($res);
if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $qno = $row["qno"];
        $ques = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
?>
    <br>
    <table>
        <tr>
            <td style="font-weight: bold; font-size:18px; padding-left:5px;" colspan="2">
                <?php echo "( " . $qno . " ) " . $ques; ?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $qno; ?>)"
                <?php
                if ($ans == $opt1) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px">
                <?php
                if (strpos($opt1, 'images/') != false) {
                ?>
                    <img src="admin/<?php echo $optl; ?>" height="30" width="30">
                <?php
                } else {
                    echo $opt1;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $qno; ?>)"
                <?php
                if ($ans == $opt2) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px">
                <?php
                if (strpos($opt2, 'images/') != false) {
                ?>
                    <img src="admin/<?php echo $opt2; ?>" height="30" width="30">
                <?php
                } else {
                    echo $opt2;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>"  onclick="radioclick(this.value,<?php echo $qno; ?>)"
                <?php
                if ($ans == $opt3) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px">
                <?php
                if (strpos($opt3, 'images/') != false) {
                ?>
                    <img src="admin/<?php echo $opt3; ?>" height="30" width="30">
                <?php
                } else {
                    echo $opt3;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>"  onclick="radioclick(this.value,<?php echo $qno; ?>)"
                <?php
                if ($ans == $opt4) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px">
                <?php
                if (strpos($opt4, 'images/') != false) {
                ?>
                    <img src="admin/<?php echo $opt4; ?>" height="30" width="30">
                <?php
                } else {
                    echo $opt4;
                }
                ?>
            </td>
        </tr>

    </table>
<?php
}
