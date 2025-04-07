<!DOCTYPE html>
<html>

<head>
	<title> Doctor info </title>
</head>
<style>body {
  background-image: url('background_doc.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
	</style>

<body>
	<center>
		<?php

		
		$conn = mysqli_connect("localhost", "root", "", "project");
		
		// Check connection
		if($conn === false){die("ERROR: Could not connect. ".mysqli_connect_error());}
		
		$doctor_name = $_POST['doctor_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$dob = $_POST['DOB'];
		$qualification = $_POST['qualification'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$phone_num = $_POST['phone_num'];

		// Retrieve the last doctor_id value in the doctor table
		$sql_max_id = "SELECT MAX(doctor_id) as max_id FROM doctor";
		$result_max_id = $conn->query($sql_max_id);
		$row_max_id = $result_max_id->fetch_assoc();
		$last_id = $row_max_id['max_id'];

		// Increment the last doctor_id value to generate a new ID for the next record
		$new_id = $last_id + 1;
		$sql = "INSERT INTO doctor VALUES ('$new_id','$doctor_name','$age','$gender','$dob','$qualification','$department','$email','$phone_num')";

		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in the database successfully.". " </h3>";

			echo nl2br("\n$new_id\n $doctor_name\n ". "$age\n $email\n $qualification\n$phone_num");
		} 
        else {
			echo "ERROR: Hush! Sorry $sql. ".mysqli_error($conn);
		}
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>