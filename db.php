<?php
session_start();
$db = new mysqli('localhost', 'root', 'root', 'event_share_test');
if (!$db)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>