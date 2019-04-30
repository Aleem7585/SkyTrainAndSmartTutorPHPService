

<?php
header('Content-Type:application/json');
$con = mysqli_connect('localhost','ansariey_ansarieyehospital','aleemsdream87');
mysqli_select_db($con,'ansariey_ansarieyehospital');


if(isset($_POST['vehicle_no'],$_POST['password'])) {
		$vehicle_no = $_POST['vehicle_no'];
		$password = $_POST['password'];
		
		if(!empty($vehicle_no) && !empty($password)){
			
			$encrypted_password = md5($password);
			$query = "Select * from skytrain_users where vehicle_no='$vehicle_no' and password = '$password'";
			$result = mysqli_query($con,$query);
			
			//$r=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
				 while($row = $result->fetch_assoc()) {
				     session_start();
				     $_SESSION['page_count'] = $row["vehicle_no"];
        $json['success'] = $row["user_name"];
				echo json_encode($json);
    }
				
				
			}
			
		}else{
			echo json_encode("you must type both inputs");
		}
		
	}

?>