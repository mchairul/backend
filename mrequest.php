<?php
/*
|-------------------------------------------------------------------
| REQUEST CALL
|-------------------------------------------------------------------
| before you connect to the citcall API make sure that:
| 1. You have read the citcall API documentation
| 2. your userid has been registered and your IP has been filtered in citcall system
|
*/
include "config.php";
ini_set('max_execution_time', 3000);
//read and check POST param from android app
if (!isset($_POST["cid"]) && !isset($_POST["tryno"]) && !isset($_POST["username"]) && !isset($_POST["passwd"])) {
	echo "not completed";
	exit();
}
$data = array(
    "userid" => $_POST["username"],
    "msisdn" => $_POST["cid"],
    "password" => $_POST["passwd"],
	"gateway" => $_POST["tryno"],
);
$url = "http://104.199.196.122/gateway/v1/call";
$content = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($content))
);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$data =  json_decode($json_response);

$rc = $data->rc;
$trx_id = $data->trx_id;
$msisdn = $data->msisdn;
$via = $data->via;
$token = $data->token;
$dial_code = $data->dial_code;
$dial_status = $data->dial_status;
$call_status = $data->call_status;
$result = $data->result;


$sql = "insert into `call_data`
		(trx_id,msisdn,via,token,dial_code,dial_status,call_status,result,is_done) 
		values 
		('$trx_id','$msisdn','$via','$token','$dial_code','$dial_status','$call_status','$result',0)";
$db->query($sql);
echo $json_response;
?>