<?php

@session_start();
class Student {

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


	//admin login function
	public function login_student($matric_no, $password){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM student WHERE matric_no = :matric_no AND password = :password");
			$this->stmt->execute(array(':matric_no' =>$matric_no, ':password' => $password));
			$row = $this->stmt->rowCount();
			$student = $this->stmt->fetch();
			if($row > 0)
			{	
				@session_start();
				$_SESSION['stud_id'] = $student['id'];
				$_SESSION['fac_id'] = $student['faculty'];
				$_SESSION['dept_id'] = $student['department'];
				$_SESSION['hall_id'] = $student['hall'];
				$_SESSION['matric_no'] = $student['matric_no'];
			     return true;
				
			}
			else{
				return false;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	
	public function auth($url = 'index.php'){
		if(!isset($_SESSION['stud_id']))
		{
			header("Location:$url");
		}

	}

	public function upload_files($stud_id, $file_name, $file, $pre_section_id, $section_id, $date){
		try
		{
			$this->stmt = $this->handle->prepare("INSERT INTO file_upload (file_name, file, pre_section, section, student_id, date_uploaded, sign) VALUES (:file_name, :file, :pre_section, :section, :student_id, :date_uploaded, 0)");
			$this->stmt->execute(array(':file_name' => $file_name , ':file' => $file, ':pre_section' => $pre_section_id, ':section' => $section_id, ':student_id' => $stud_id, ':date_uploaded' => $date));
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


	public function check_password($stud_id){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT password FROM student WHERE id = :stud_id ");
			$this->stmt->execute(array(':stud_id' =>$stud_id));
			$fetch = $this->stmt->fetch();
			$password = $fetch['password'];

			return $password;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function change_password($stud_id, $password){
		try
		{
			$this->stmt = $this->handle->prepare("UPDATE student SET password = :password WHERE id = :stud_id ");
			$this->stmt->execute(array(':stud_id' =>$stud_id, ':password' => $password));

			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function my_upload($student_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM file_upload WHERE student_id = :student_id GROUP BY file_name");
			$this->stmt->execute(array(':student_id' =>$student_id));

			$file = $this->stmt->fetchAll();

			return $file;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function clearance_status($student_id, $pre_section, $section){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM file_upload WHERE student_id = :student_id AND pre_section = :pre_section AND section = :section");
			$this->stmt->execute(array(':student_id' =>$student_id, ':pre_section' => $pre_section, ':section' =>$section));

			$row = $this->stmt->rowCount();
			$status = $this->stmt->fetch();
			if($row > 0){
				return $status['sign'];
			}
			else{
				return "";
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function clearance_receipt($student_id, $pre_section, $section){
		try{
			$this->stmt = $this->handle->prepare("SELECT file.*, sign.signature FROM file_upload AS file, signature AS sign, staff WHERE file.student_id = :student_id AND file.pre_section = :pre_section AND file.section = :section AND file.pre_section = staff.pre_section_id AND file.section = staff.section_id AND staff.id = sign.staff_id");
			$this->stmt->execute(array(':student_id' =>$student_id, ':pre_section' => $pre_section, ':section' =>$section));

			$row = $this->stmt->rowCount();
			$status = $this->stmt->fetch();
			if($row > 0){
				return $status['signature'];
			}
			else{
				return "";
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	
	


	
}
?>