<?php
//@session_start();
//require_once "Student.php";

class Admin /*extends Student*/{

	/*public function __construct(){
		$this->stmt = new Student();
	}*/

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
	public function login_admin($email, $password){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT id, email, password FROM admin WHERE email = :email AND password = :password");
			$this->stmt->execute(array(':email' =>$email, ':password' => $password));
			$row = $this->stmt->rowCount();
			$user = $this->stmt->fetch();
			if($row > 0)
			{	
				@session_start();
				 $_SESSION['id'] = $user['id'];
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

	public function selectAllPre_section(){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM pre_section ");
			$this->stmt->execute();
			$user = $this->stmt->fetchAll();
			return $user;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function assign_staff($sname, $oname, $address, $email, $password, $phone, $pre_section, $section_name){
		try
		{
			$this->stmt = $this->handle->prepare("INSERT INTO staff (surname, othername, home_address, email, password, phone_number, pre_section_id, section_id) VALUES (:sname, :oname, :address, :email, :password, :phone, :pre_section, :section_name)");
			$this->stmt->execute(array(':sname' => $sname, ':oname' => $oname, ':address' => $address, ':email' => $email, ':password' => $password, ':phone' => $phone, ':pre_section' => $pre_section, ':section_name' => $section_name));
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function add_student($sname, $oname, $address, $email, $phone, $matric_no, $faculty, $department, $hall){
		try
		{
			$this->stmt = $this->handle->prepare("INSERT INTO student (surname, othername, home_address, email, phone_number, matric_no, password, faculty, department, hall) VALUES (:sname, :oname, :address, :email, :phone, :matric_no, :password, :faculty, :department, :hall)");
			$this->stmt->execute(array(':sname' => $sname, ':oname' => $oname, ':address' => $address, ':email' => $email, ':phone' => $phone, ':matric_no' => $matric_no, ':password' => $matric_no, ':faculty' => $faculty, ':department' => $department, ':hall' => $hall));
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function role_assigned()
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT id, pre_section_id, section_id FROM staff ORDER BY id DESC LIMIT 10");
			$this->stmt->execute();
			$result = $this->stmt->fetchAll();

			$table_name = "";
			foreach ($result as $key => $value) {
				if($value['pre_section_id'] == 1) 
				{
					$table_name = "faculty";
				}
				if($value['pre_section_id'] == 2)
				{
					$table_name = "department";
				}
				if($value['pre_section_id'] == 3)
				{
					$table_name = "hall";
				}
				if($value['pre_section_id'] == 4)
				{
					$table_name = "section";
				}
				
				$section_id = $value['section_id'];
				$staff_id = $value['id'];

				$stmt = $this->handle->prepare("SELECT stf.surname, stf.othername, stf.id, tbl.name FROM staff AS stf, $table_name AS tbl  WHERE stf.section_id = tbl.id AND stf.id  = '$staff_id' ORDER BY stf.id DESC ");
				$stmt->execute();
				$staff_fetch = $stmt->fetch();

				$all_staff[] = $staff_fetch;
			}
			

			return $all_staff;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function fetch_faculty ()
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM faculty");
			$this->stmt->execute();
			$faculty = $this->stmt->fetchAll();
			return $faculty;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function fetch_hall ()
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM hall");
			$this->stmt->execute();
			$hall = $this->stmt->fetchAll();
			return $hall;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function newest_added_student ()
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT student.surname, department.* FROM student, department WHERE student.department = department.id LIMIT 7");
			$this->stmt->execute();
			$student = $this->stmt->fetchAll();
			return $student;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	

	//select from the section
	/*public function select_from_section($table_name){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT id, name FROM :table_name ");
			$this->stmt->execute(array(':table_name' => $table_name));
			$list = $this->stmt->fetchAll();
			return $list;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}*/

	/*public function select_section($pre_section_id){
		try
		{
			$pre_section = "department";
			//getting the name of the appropriate table
			if($pre_section_id == 1)
			{
				$pre_section = "faculty";
			}
			if($pre_section_id == 2)
			{
				$pre_section = "department";
			}
			if($pre_section_id == 3)
			{
				$pre_section = "section";
			}

			//selecting sfrom the appropriate table
			$this->stmt = $this->handle->prepare("SELECT id, name FROM $pre_section ");
			$this->stmt->execute(array(':table_name' => $pre_section));
			$list = $this->stmt->fetchAll();
			//$list = $this->select_from_section($pre_section);

			$section_list = array();
			foreach ($list as $key => $value) {
				$section_id = $value['id'];
				$section_name = $value['name'];

				//puting the information into an array
				$section_list = array('id' => $section_id, 'name' => $section_name);

			}
			//encoding array to json format
			return json_encode($section_list);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
*/
	

	
}
?>