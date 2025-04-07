<!DOCTYPE html>
<html>

<head>
	<title>Prescription </title>
</head>
<style>body {
  background-image: url('background_pres.jpg');
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
		
		$patient_id = $_POST['patient_id'];
		$o_no_of_tablets = $_POST['o_no_of_tablets'];
		$t_no_of_tablets = $_POST['t_no_of_tablets'];
		$problem = $_POST['problem'];

		$sql_max = "SELECT MAX(prescription_number) as max FROM prescription";
		$result_max = $conn->query($sql_max);
		$row_max = $result_max->fetch_assoc();
		$last = $row_max['max'];
		$new = $last + 1;

		$q_query = "SELECT medicine.tablet1, medicine.tablet2,medicine.tablet1_cost,medicine.tablet2_cost FROM medicine JOIN problem ON medicine.medicine_name = problem.medicine WHERE problem.problem_name = '$problem'";
		$result=$conn->query($q_query);
		$row=$result->fetch_assoc();
		$tab1=$row['tablet1'];
		$tab2=$row['tablet2'];
		$c1 = $row['tablet1_cost'] ?? 0;
		$c2 = $row['tablet2_cost'] ?? 0;
		$amt=300+($o_no_of_tablets*$c1)+($t_no_of_tablets*$c2);
		$sql = "INSERT INTO prescription VALUES ('$new','$patient_id','$problem','$tab1','$o_no_of_tablets','$tab2','$t_no_of_tablets','$amt')";
		
        
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in the database successfully."." </h3>";
			echo nl2br("\n$new\n $patient_id\n ");
		} 
        else {echo "ERROR: Hush! Sorry $sql. ".mysqli_error($conn);}
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>