<?php
require_once '../dbconn.php';

if (isset($_GET['bookdelete'])) {
	$id = base64_decode($_GET['bookdelete']);

	mysqli_query($conn, "DELETE FROM `books` WHERE `id`='$id'");
	header("location: manage-books.php");
}
?>