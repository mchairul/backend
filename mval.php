<?php
<?php
/*
|-------------------------------------------------------------------
| VERIFICATION
|-------------------------------------------------------------------
| example of call verification
|
*/
ini_set('max_execution_time', 3000);
header("Content-type: application/json");
include "config.php";
$sql="SELECT id FROM call_data WHERE trx_id='$trxId' AND token=$token AND result='Success'";
//echo $sql;
$result=$db->query($sql);
$valid="invalid";
if ($result->num_rows > 0) {
	$sqlu="UPDATE call_data SET is_done=1 WHERE trx_id='$trxId'";
	$db->query($sqlu);
	$valid="valid";
}
$db->close();
$resp=array(
	"error" => FALSE,
	"valid" => $valid
);
echo json_encode($resp);