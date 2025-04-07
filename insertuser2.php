<!DOCTYPE html>
<html>

<head>
	<title>Staff </title>
</head>
<style>body {
  background-image: url('images/background_staff.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
	</style>
<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "project");
		if($conn === false){die("ERROR: Could not connect. ".mysqli_connect_error());}
		
		$staff_name = $_POST['staff_name'];
		$phonenumber = $_POST['phonenumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql_max_id = "SELECT MAX(staff_id) as max_id FROM staff";
		$result_max_id = $conn->query($sql_max_id);
		$row_max_id = $result_max_id->fetch_assoc();
		$last_id = $row_max_id['max_id'];
		$new_id = $last_id + 1;
		$sql = "INSERT INTO staff VALUES ('$new_id','$staff_name','$phonenumber','$email','$password')";
		
        
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in the database successfully."." </h3>";

			echo nl2br("\n$new_id\n$staff_name\n $email\n $phonenumber\n");
		} 
        else {
			echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
		}
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>