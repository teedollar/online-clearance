<?php

@session_start();
class Status {

	public $handle;
	public $stmt;
	public $db_name = "onlineclearance";


	public function __construct(){
		$this->handle = $this->dbEngine();
	}

	public function dbEngine(){
		try{
			$this->handle = new PDO("mysql:host=localhost;dbname=$this->db_name","root","");
				$this->handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $this->handle;
	}


	public function clearance_status($student_id, $pre_section, $section){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM file_upload WHERE student_id = :student_id AND pre_section = :pre_section AND section = :section");
			$this->stmt->execute(array(':student_id' =>$student_id, ':pre_section' => $pre_section, ':section' =>$section));

			$row = $this->stmt->rowCount();
			if($row > 0){
				return $this->stmt->fetch();
			}
			else{
				return "Not yet submitted";
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


}
