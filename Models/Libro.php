<?php

class Libro {

	private $db, $connect;

	public function __construct(){

		require_once 'Connect.php';
		
		$this->connect=new Connect();
		$this->db = $this->connect->get_connection();
	}


	public function getAll(){
		$query= this->db->query("select * from libro");
		while($row = $query->fetch_object()){

			$resultSet[] = $row;

		}

		return $resultSet;


	}


}

?>