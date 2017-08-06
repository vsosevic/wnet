<?php
include_once('Contract.class.php');
$servArr = array();

if ($_POST['service_1']) {
	$servArr[] = "'work'";
}
if ($_POST['service_2']) {
	$servArr[] = "'connectiong'";
}
if ($_POST['service_3']) {
	$servArr[] = "'disconnected'";
}

$contract = Contract::getContract($_POST['id_contract'], $servArr);
print (json_encode($contract));
?>