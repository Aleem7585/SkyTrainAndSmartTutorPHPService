<?php
header('Content-Type:application/json');
$con = mysqli_connect('localhost','ansariey_ansarieyehospital','aleemsdream87');
mysqli_select_db($con,'ansariey_ansarieyehospital');

if(isset($_POST['Name'],$_POST['EmailAddress'],$_POST['Password'])) {
		
		$Name = $_POST['Name'];
		$EmailAddress = $_POST['EmailAddress'];
		$Password = $_POST['Password'];
		$PhoneNo = $_POST['PhoneNo'];
		$Education = $_POST['Education'];
		$IsTeacher = $_POST['IsTeacher'];

		$date = date('Y-m-d');
		
		if(!empty($Name) && !empty($EmailAddress) && !empty($Password) && !empty($PhoneNo) && !empty($Education) && !empty($IsTeacher)){
			
		//$encrypted_password = md5($password);

				$query = "insert into st_users (Name, EmailAddress ,Password,PhoneNo, Education, IsTeacher) values 
				( '$Name', '$EmailAddress','$Password','$PhoneNo', '$Education', '$IsTeacher')";
				$inserted = mysqli_query($con,$query);
				if($inserted == 1 ){
					$json['success'] = '';
				}else{
					$json['error'] = 'Wrong password';
				}
				echo json_encode($json);
				}
			
		}else{
			echo json_encode("you must type both inputs");
		}
		

?>
				
			