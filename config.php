<?php
$dbhost = "YOUR_DB_HOST";
$db_user = "YOUR_DB_USER";
$db_password = "YOUR_DB_PASSWORD";
$db_name = "YOUR_DB_NAME";
$db = new mysqli($dbhost, $db_user, $db_password, $db_name);
if($db->connect_errno > 0) {
	die('Unable to connect to database [' . $db->connect_error . ']');
}
?>