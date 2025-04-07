<!DOCTYPE html>
<html>

<head>
	<title> Patient Information </title>
</head>
<style>body {
  background-image: url('images/background_pat.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
	</style>

<body>
	<center>
		<?php

		
		$conn = new mysqli("localhost", "root", "", "project");
		// Check connection
		if($conn === false){die("ERROR: Could not connect. ".mysqli_connect_error());}

		$patient_name = $_POST['patient_name'];
		$age = $_POST['age'];
		$DOB = $_POST['DOB'];
		$gender = $_POST['gender'];
		$phone_num = $_POST['phone_num'];
		$aadhar_no = $_POST['aadhar_no'];
		$password = "password";	
		echo "<h3>Your Default password is - password you can change it after"." </h3>";
		
		$sql_max_id = "SELECT MAX(patient_id) as max_id FROM patients";
		$result_max_id = $conn->query($sql_max_id);
		$row_max_id = $result_max_id->fetch_assoc();
		$last_id = $row_max_id['max_id'];
		$new_id = $last_id + 1;

		$sql = "INSERT INTO patients VALUES ('$new_id','$patient_name','$age','$DOB','$gender','$phone_num','$aadhar_no','$password')";
		
        
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in the database successfully."." </h3>";
			echo nl2br("\n$new_id\n"."$patient_name\n $phone_num\n");
		} 
        else {echo "ERROR: Hush! Sorry $sql. ".mysqli_error($conn);}
		mysqli_close($conn);// Close connection
		?>
	</center>
</body>

</html>