<?php

@session_start();
//require_once "Student.php";
class Staff {

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

	//admistaffn login function
	public function login_staff($email, $password){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT * FROM staff WHERE email = :email AND password = :password");
			$this->stmt->execute(array(':email' =>$email, ':password' => $password));
			$row = $this->stmt->rowCount();
			$staff = $this->stmt->fetch();
			if($row > 0)
			{	
				@session_start();
				$_SESSION['staff_id'] = $staff['id'];
				$_SESSION['pre_sec_id'] = $staff['pre_section_id'];
				$_SESSION['sec_id'] = $staff['section_id'];
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
		if(!isset($_SESSION['staff_id']))
		{
			header("Location:$url");
		}

	}

	public function check_password($staff_id){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT password FROM staff WHERE id = :staff_id ");
			$this->stmt->execute(array(':staff_id' =>$staff_id));
			$fetch = $this->stmt->fetch();
			$password = $fetch['password'];

			return $password;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function change_password($staff_id, $password){
		try
		{
			$this->stmt = $this->handle->prepare("UPDATE staff SET password = :password WHERE id = :staff_id ");
			$this->stmt->execute(array(':staff_id' =>$staff_id, ':password' => $password));

			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


	public function upload_signature($staff_id, $file, $pre_section, $section){
		try
		{
			$this->stmt = $this->handle->prepare("INSERT INTO signature (staff_id, signature, pre_section_id, section_id) VALUES (:staff_id, :file, :pre_section, :section)");
			$this->stmt->execute(array(':staff_id' => $staff_id , ':file' => $file, ':pre_section' => $pre_section, ':section' => $section));
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function check_signature($staff_id){
		try
		{
			$this->stmt = $this->handle->prepare("SELECT id FROM signature WHERE staff_id = :staff_id ");
			$this->stmt->execute(array(':staff_id' =>$staff_id));
			
			$row = $this->stmt->rowCount();
			return $row;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function select_students_to_sign ($staff_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT stud.id, stud.surname, stud.othername, stud.matric_no, dept.name AS dept FROM student AS stud, department AS dept, file_upload, staff WHERE stud.id = file_upload.student_id AND stud.department = dept.id AND file_upload.pre_section = staff.pre_section_id AND file_upload.section = staff.section_id AND staff.id = :staff_id AND file_upload.sign = 0 GROUP BY stud.id");
			$this->stmt->execute(array(':staff_id' => $staff_id));
			
			$student = $this->stmt->fetchAll();
			return $student;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

		public function select_a_student_to_sign ($student_id, $staff_id)
		{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT stud.id AS s_id, stud.surname, stud.othername, stud.matric_no, dept.name AS dept, file_upload.id AS file_id, file_upload.file_name, file_upload.date_uploaded, file_upload.file FROM student AS stud, department AS dept, file_upload, staff WHERE stud.id = file_upload.student_id AND stud.department = dept.id AND file_upload.pre_section = staff.pre_section_id AND file_upload.section = staff.section_id AND staff.id = :staff_id AND stud.id = :stud_id AND file_upload.sign = 0 ");
			$this->stmt->execute(array(':staff_id' => $staff_id, 'stud_id' => $student_id));
			
			$student = $this->stmt->fetchAll();
			return $student;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function select_student_data($student_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT student.*, department.name AS dept FROM student, department WHERE student.id = :stud_id AND department.id = student.department ");
			$this->stmt->execute(array('stud_id' => $student_id));
			
			$student_data = $this->stmt->fetch();
			return $student_data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


	public function select_staff_data($staff_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT surname, othername FROM staff WHERE id = :staff_id");
			$this->stmt->execute(array('staff_id' => $staff_id));
			
			$staff_data = $this->stmt->fetch();
			return $staff_data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function clear_student ($student_id, $pre_section_id, $section_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("UPDATE file_upload SET sign = 1 WHERE pre_section = :pre_section_id AND section = :section_id AND student_id = :student_id");
			$this->stmt->execute(array('student_id' => $student_id, 'pre_section_id' => $pre_section_id, 'section_id' => $section_id));

			return true;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function select_signature($staff_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT id FROM signature WHERE staff_id = :staff_id");
			$this->stmt->execute(array('staff_id' => $staff_id));
			$row = $this->stmt->rowCount();
			return $row;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function select_file($file_id)
	{
		try
		{
			$this->stmt = $this->handle->prepare("SELECT file FROM file_upload WHERE id = :file_id");
			$this->stmt->execute(array('file_id' => $file_id));
			$file = $this->stmt->fetch();
			return $file;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	
}
?>