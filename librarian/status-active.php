<?php
 require_once '../dbconn.php';
 $id = base64_decode($_GET['id']);

$sql = "UPDATE students SET status = 1 WHERE `id`= '$id' ";
mysqli_query($conn,$sql);
header("location:student.php");

?>