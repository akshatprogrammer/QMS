<?php
session_start();
$quesno = $_GET['queno'];
$valuer = $_GET['value1'];
$_SESSION["answer"][$quesno] = $valuer;
?>