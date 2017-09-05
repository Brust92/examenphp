<?php

class Libro {

	private $db, $connect;

	public function __construct(){

		require_once('Connect.php');
		
		$this->connect=new Connect();
		$this->db = $this->connect->get_connection();
	}


	public function getAll(){
		$resultSet = [];
		$Query = $this->db->prepare('select * from libro where idlibro = 3');
		$Query->execute();

		foreach($Query->fetch_object() as $row){
			$resultSet[] =$row; 
		}

		 //$resultSet = $Query->fetch();

			//$resultSet[] = new Post($post[0],$post[1],$post[2]);
			//echo $resultSet;

		return $resultSet;


	}




}
$libro= new libro();
$libro->getAll();

?>