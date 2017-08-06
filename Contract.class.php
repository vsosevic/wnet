<?php
include_once('DatabaseObjClass.php');

class Contract
{
	public $name_customer;
	public $company;
	public $number;
	public $date_sign;
	public $services_name;
	private static $_registry = array();

	private function __construct($name_customer, $company, $number, $date_sign, $services_name) {
		$this->name_customer = $name_customer;
		$this->company = $company;
		$this->number = $number;
		$this->date_sign = $date_sign;
		$this->services_name = $services_name;
	}
	public static function getContract($id, $statusesArray) {
		if (isset(self::$_registry[$id])) {
			return self::$_registry[$id];
		}
		$dbObj = DatabaseObj::getInstance();
		$statuses =  implode(",", $statusesArray);
		if ($statuses == NULL) {
			$statuses = "''";
		}
		$contractData = $dbObj->query("SELECT obj_customers.name_customer, obj_customers.company, obj_contracts.number, obj_contracts.date_sign, GROUP_CONCAT(obj_services.title_service) AS services FROM obj_customers INNER JOIN obj_contracts ON obj_contracts.id_customer = obj_customers.id_customer INNER JOIN obj_services ON obj_services.id_contract = obj_contracts.id_contract WHERE (obj_contracts.id_contract=". $id ." AND (obj_services.status IN (". $statuses .")) ) GROUP by obj_contracts.id_contract");
		if ($contractData == NULL) {
			return NULL;
		}
		$contractData = $contractData->fetch_assoc();
		
		self::$_registry[$id] = new Contract($contractData['name_customer'], $contractData['company'], $contractData['number'], $contractData['date_sign'], $contractData['services']);
		return self::$_registry[$id];
	}
}
?>