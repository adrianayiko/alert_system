<?php
include 'connection.php';

$id = $_GET['id'];
$sql = "UPDATE notifications SET status = 1 WHERE id = $id AND status = 0";
mysqli_query($con, $sql);
?>
