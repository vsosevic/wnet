<?php
// namespace wnet;

class DatabaseObj
{
	protected $connection;
	private static $instance = null;

	public static function getInstance() {
	    if (self::$instance == null) {
	        self::$instance = new DatabaseObj;
	    }
	    return self::$instance;
	}
	public function __construct()
	{
		$DB_DSN = '127.0.0.1';
		$DB_USER = 'root';
		$DB_PASSWORD = '';
		$DB_NAME = 'wnet';
		$this->connection = new mysqli($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
		if (!$this->connection) {
			throw new Exception("Could not connect to DB", 1);
		}
	}

	public function query($sql)
	{
		if (!$this->connection) {
			return false;
		}

		$result = $this->connection->query($sql);

        return $result;
	}
}
?>