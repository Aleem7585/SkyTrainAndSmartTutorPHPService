<?php
header('Content-Type:application/json');
$con = mysqli_connect('localhost','ansariey_ansarieyehospital','aleemsdream87');
mysqli_select_db($con,'ansariey_ansarieyehospital');

if(isset($_POST['vehicle_no'],$_POST['password'],$_POST['user_name'])) {
		
		$user_name = $_POST['user_name'];
		$vehicle_no = $_POST['vehicle_no'];
		$password = $_POST['password'];
		$date = date('Y-m-d');
		
		if(!empty($vehicle_no) && !empty($vehicle_no) && !empty($password)){
			
			$encrypted_password = md5($password);

				$query = "insert into skytrain_users (user_name, password ,valid,vehicle_no, created_date) values 
				( '$user_name', '$password',1,'$vehicle_no', '$date')";
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
				
			