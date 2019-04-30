<?php
header('Content-Type:application/json');
$con = mysqli_connect('localhost','ansariey_ansarieyehospital','aleemsdream87');
mysqli_select_db($con,'ansariey_ansarieyehospital');

 $DefaultId = 0;
 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];

 $GetOldIdSQL ="SELECT ID FROM skytrain_images  ORDER BY ID ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id'];
 }
 
 $ImagePath = "/$DefaultId.png";
 
 $ServerURL = "ansarieyehospital.com/skytrain/$ImagePath";
 
 $InsertSQL = "insert into skytrain_images  (path,name) values ('$ServerURL','$ImageName')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);

?>