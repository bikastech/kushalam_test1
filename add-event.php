<?php
require_once "db.php";

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sqlInsert = "INSERT INTO tbl_events (
										title,
										start,
										end,
										user_id,
										status
									) VALUES (
										'".$title."',
										'".$start."',
										'".$end ."',
										'".$_SESSION['user_id'] ."',
										1
									)";

$result = mysqli_query($db, $sqlInsert);

if (! $result) {
    $result = mysqli_error($db);
}
?>