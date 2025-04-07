<!DOCTYPE html>
<html>

<head>
	<title>Appointment created </title>
</head>
<style>body {
  background-image: url('images/background_appoi.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
    </style>
<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "project");
		if($conn === false){die("ERROR: Could not connect. ".mysqli_connect_error());}
		
		$patient_id = $_POST['patient_id'];
		$name = $_POST['name'];
		$problem_name = $_POST['problem_name'];
		
		$sql_max_id = "SELECT MAX(appointment_id) as max_id FROM appointment";
		$result_max_id = $conn->query($sql_max_id);
		$row_max_id = $result_max_id->fetch_assoc();
		$last_id = $row_max_id['max_id'];
		$new_id = $last_id + 1;

        $docname_query = "SELECT doctor.doctor_name FROM doctor JOIN problem ON doctor.department = problem.department 
                          WHERE problem.problem_name = '$problem_name' 
                          ORDER BY 
                          (SELECT time FROM appointment WHERE appointment.doctor_name = doctor.doctor_name ORDER BY time DESC LIMIT 1)
                          ASC LIMIT 1";
                            
        $docname_result = $conn->query($docname_query);
        $docname_row = $docname_result->fetch_assoc();
        $docname = $docname_row['doctor_name'];
        
        $last_appointment_query = "SELECT time FROM appointment WHERE doctor_name = '$docname' ORDER BY time DESC LIMIT 1";
        $last_appointment_result = $conn->query($last_appointment_query);
        if($last_appointment_result->num_rows > 0) {
            $last_appointment_row = $last_appointment_result->fetch_assoc();
            $last_time = $last_appointment_row['time'];
            $current_time = new DateTime();
            $systime = time(); 
            $last_time_obj = new DateTime($last_time);
            $last_time_obj->add(new DateInterval('PT2H'));
            if($last_time_obj->format('H:i:s') < '10:00:00') {
                $last_time_obj->setTime(10, 0, 0);
                $time = $last_time_obj->format('Y-m-d H:i:s');
            } else if($last_time_obj->format('H:i:s') >= '20:00:00') {
                $last_time_obj->add(new DateInterval('P1D'));
                $last_time_obj->setTime(10, 0, 0);
                $time = $last_time_obj->format('Y-m-d H:i:s');
            } else {
                $time = $last_time_obj->format('Y-m-d H:i:s');
                }
        }
        else {
            $time_obj = new DateTime("+2 hours");
            $time_obj->setTime(10, 0, 0);
            $time = $time_obj->format('Y-m-d H:i:s');
        }
        if (strtotime($time) < $systime) {
            $time = date('Y-m-d H:i:s', strtotime('tomorrow 10:00:00'));
        }


        $sql = "INSERT INTO appointment VALUES ('$new_id','$patient_id','$docname','$problem_name','$time')";
        
        if(mysqli_query($conn, $sql)){
            echo "<p style='color: red;'>Appointment created successfully.</p>";
            echo "<p style='color: red;'>ID of $new_id is scheduled to $time for $name with $docname</p>";
        } else {
            echo "<p style='color: red;'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
