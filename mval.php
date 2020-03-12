<?php
/*
|-------------------------------------------------------------------
| VERIFICATION
|-------------------------------------------------------------------
| example of call verification
|
*/
header("Content-type: application/json");

if (!isset($_POST["trxid"]) && !isset($_POST["code"])) {
     echo "not completed";
     exit();
}

include "config.php";
$sql = "SELECT trxid FROM call_data WHERE trxid='" . $_POST["trxid"] . "' AND token='" . $_POST["code"] . "' and is_done = 0";
//echo $sql;
$result = $db->query($sql);
$error = TRUE;
$info = "invalid token";
if ($result->num_rows > 0) {
     $sqlu = "UPDATE call_data SET is_done  = 1 WHERE trxid = '" . $_POST["trxid"] . "'";
     $db->query($sqlu);
     $info = "ok";
     $error = FALSE;
}
$db->close();
$resp=array(
     "error" => $error,
     "info" => $info
);
echo json_encode($resp);
