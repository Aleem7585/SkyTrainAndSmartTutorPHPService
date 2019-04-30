<?php
header('Content-Type:application/json');
$con = mysqli_connect('localhost','ansariey_ansarieyehospital','aleemsdream87');
mysqli_select_db($con,'ansariey_ansarieyehospital');

$_POST['vehicle_no']="kiv6072";
$_POST['reading']=123;

if(isset($_POST['vehicle_no'],$_POST['reading'])) {
		
		$vehicle_no = $_POST['vehicle_no'];
		$reading = $_POST['reading'];
		date_default_timezone_set("Asia/Karachi");
		$date = date('Y-m-d h:i:sa');
			
		if(!empty($vehicle_no) && !empty($reading)){
			
				$query = "insert into readings ( vehicle_no , reading, entry_time) values 
				( '$vehicle_no' ,'$reading', '$date')";
				$inserted = mysqli_query($con,$query);
				if($inserted == 1 ){
					$json['success'] = '';
				}else{
					$json['error'] = 'Something went wrong';
				}
				echo json_encode($json);
				}
			
		}else{
			echo json_encode("Contect with your IT Team");
		}
		
	

?>
				
			