<?php

class Connect{
	private $conn;

	public function __construct(){
		mysqli_report(MYSQLI_REPORT_ERROR);
		$this->conn = new mysqli("localhost:3306", "luisfer", "root", "examen");
	}
	public function get_connection(){
		return $this->conn;
	}
}

?>