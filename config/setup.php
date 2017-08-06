<?php
include('database.php');

try {
	$db = new PDO($DB_DSN_G, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//DB creation
	// $sql = "DROP DATABASE IF EXISTS wnet";
	// $db->exec($sql);
	$sql = "CREATE DATABASE IF NOT EXISTS wnet";
	$db->exec($sql);

	//Table users
	$sql = "USE wnet;
		CREATE TABLE `obj_customers`
			(id_customer INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name_customer VARCHAR(250) NOT NULL,
			company ENUM('company_1', 'company_2', 'company_3')
			) ENGINE=InnoDB;
		CREATE TABLE `obj_contracts`
			(id_contract INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			id_customer INT(11) UNSIGNED,
			number VARCHAR(100) NOT NULL,
			date_sign TIMESTAMP,
			FOREIGN KEY (id_customer) REFERENCES obj_customers (id_customer)
				ON DELETE CASCADE
       			ON UPDATE CASCADE
			) ENGINE=InnoDB;
		CREATE TABLE `obj_services`
			(id_service INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			id_contract INT(11) UNSIGNED,
			title_service VARCHAR(250) NOT NULL,
			status ENUM('work', 'connecting', 'disconnected'),
			FOREIGN KEY (id_contract) REFERENCES obj_contracts (id_contract)
				ON DELETE CASCADE
       			ON UPDATE CASCADE
			) ENGINE=InnoDB;
			INSERT INTO `obj_customers` (`id_customer`, `name_customer`, `company`) VALUES (NULL, 'Sosevich Vladimir', 'company_1'), (NULL, 'Kravchuk Petro', 'company_2') , (NULL, 'Strutinska Irina', 'company_1'), (NULL, 'Vishnevska Olga', 'company_3'), (NULL, 'Gagarin Alex', 'company_3'), (NULL, 'Kudlaj Alina', 'company_1');
			INSERT INTO `obj_contracts` (`id_contract`, `id_customer`, `number`, `date_sign`) VALUES (NULL, '1', 'dw23', CURRENT_TIMESTAMP), (NULL, '1', 'dfds45', CURRENT_TIMESTAMP), (NULL, '2', 'sdf4342', CURRENT_TIMESTAMP), (NULL, '2', 'df45', CURRENT_TIMESTAMP), (NULL, '1', 'deret343', CURRENT_TIMESTAMP), (NULL, '5', 'hgty432', CURRENT_TIMESTAMP), (NULL, '5', 'dsdre4343', CURRENT_TIMESTAMP), (NULL, '5', 'fsdfsd444', CURRENT_TIMESTAMP), (NULL, '7', 'fsfsdfs44', CURRENT_TIMESTAMP);
			INSERT INTO `obj_services` (`id_service`, `id_contract`, `title_service`, `status`) VALUES (NULL, '1', 'service_1', 'work'), (NULL, '1', 'service_2', 'work'), (NULL, '1', 'service_3', 'work'), (NULL, '1', 'service_4', 'work'), (NULL, '2', 'service_1', 'work'), (NULL, '2', 'service_2', 'work'), (NULL, '2', 'service_3', 'connected'), (NULL, '2', 'service_4', 'connected'),(NULL, '3', 'service_1', 'work'), (NULL, '3', 'service_2', 'connected'), (NULL, '3', 'service_3', 'disconnected'), (NULL, '3', 'service_4', 'disconnected'),(NULL, '4', 'service_1', 'work'), (NULL, '4', 'service_2', 'connected'), (NULL, '4', 'service_3', 'disconnected'), (NULL, '4', 'service_4', 'disconnected'),(NULL, '5', 'service_1', 'work'), (NULL, '5', 'service_2', 'connected'), (NULL, '5', 'service_3', 'disconnected'), (NULL, '5', 'service_4', 'disconnected'),(NULL, '6', 'service_1', 'work'), (NULL, '6', 'service_2', 'connected'), (NULL, '6', 'service_3', 'disconnected'), (NULL, '6', 'service_4', 'disconnected'),(NULL, '7', 'service_1', 'work'), (NULL, '7', 'service_2', 'connected'), (NULL, '7', 'service_3', 'disconnected'), (NULL, '7', 'service_4', 'disconnected'),(NULL, '8', 'service_1', 'work'), (NULL, '8', 'service_2', 'connected'), (NULL, '8', 'service_3', 'disconnected'), (NULL, '8', 'service_4', 'disconnected');
			";
	$db->exec($sql);
	} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
$db = null;
?>