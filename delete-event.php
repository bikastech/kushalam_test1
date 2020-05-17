<?php
require_once "db.php";

$id = $_POST['id'];
$sqlDelete = "Update tbl_events Set status = 2 WHERE id=".$id;

mysqli_query($db, $sqlDelete);
//mysqli_close($db);
echo json_encode(1);
die;
?>