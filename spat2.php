<!DOCTYPE html>
<html lang="en">

<style>

body {
  background-image: url('search_pat.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 400px;
  margin-top: 10px;
  
}
h1{
  margin-top:50px;
  text-align:center;
  color:red;
}

table td, table th {
  border: 4px solid #ddd;
  padding: 10px ;
  text-align: center;
  
}

table tr:nth-child(even){background-color: #f2f2f2;}
table tr:nth-child(odd){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  rgb(31, 106, 119);
  color: white;
  text-align: center;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>
<body>
<table>
<tr>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patient_id_name = $_POST['patient_id_name'];

// Check if the input is numeric (ID) or alphanumeric (Name)
if (is_numeric($patient_id_name)) {
    // Input is numeric (ID), perform search based on ID
    $patient_sql = "SELECT * FROM patients WHERE patient_id = '$patient_id_name'";
} else {
    // Input is alphanumeric (Name), perform search based on Name
    $patient_sql = "SELECT * FROM patients WHERE patient_name = '$patient_id_name'";
}

$patient_result = mysqli_query($conn, $patient_sql);

if (mysqli_num_rows($patient_result) > 0) {
    $row = mysqli_fetch_assoc($patient_result);
    echo "<h1>Patient Details</h1>";
    echo "<table>";
    echo "<tr><th>Patient ID</th><td>" . $row["patient_id"] . "</td></tr>";
    echo "<tr><th>Name</th><td>" . $row["patient_name"] . "</td></tr>";
    echo "<tr><th>Age</th><td>" . $row["Age"] . "</td></tr>";
    echo "<tr><th>Gender</th><td>" . $row["gender"] . "</td></tr>";
    echo "<tr><th>Aadhar</th><td>" . $row["aadhar_no"] . "</td></tr>";
    echo "<tr><th>Phone</th><td>" . $row["phone_num"] . "</td></tr>";
    echo "</table>";
    echo "<br>";
    
    $patient_id = $row["patient_id"];
    // Get past appointments
    $appointments_sql = "SELECT * FROM appointment WHERE patient_id = '$patient_id' ORDER BY time DESC";
    $appointments_result = mysqli_query($conn, $appointments_sql);
    
    if (mysqli_num_rows($appointments_result) > 0) {
        echo "<h1>Appointments</h1>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Doctor</th><th>problem</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($appointments_result)) {
            $atime = strtotime($row["time"]);
            $system_time = time();
            $status = $atime < $system_time ? "COMPLETED" : date("Y-m-d H:i:s", $atime);
            echo "<tr>";
            echo "<td>" . $row["appointment_id"] . "</td>";
            echo "<td>" . $row["doctor_name"] . "</td>";
            echo "<td>" . $row["problem"] . "</td>";
            echo "<td>" . $status. "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    } else {
        echo "<h1>No appointments found.</h1>";
    }
    
    // Get prescriptions
    $prescriptions_sql = "SELECT * FROM prescription WHERE patient_id = '$patient_id'";
    $prescriptions_result = mysqli_query($conn, $prescriptions_sql);
    
    if (mysqli_num_rows($prescriptions_result) > 0) {
        echo "<h1>Prescriptions</h1>";
        echo "<table>";
        echo "<tr><th>Number</th><th>problem</th><th>tablet1</th><th>1_no_of_tablets</th><th>tablet2</th><th>2_no_of_tablets</th><th>total_amount</th></tr>";
        while ($row = mysqli_fetch_assoc($prescriptions_result)) {
            echo "<tr>";
            echo "<td>" . $row["prescription_number"] . "</td>";
            echo "<td>" . $row["problem"] . "</td>";
            echo "<td>" . $row["tablet1"] . "</td>";
            echo "<td>" . $row["1_no_of_tablets"] . "</td>";
            echo "<td>" . $row["tablet2"] . "</td>";
            echo "<td>" . $row["2_no_of_tablets"] . "</td>";
            echo "<td>" . $row["total_amount"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else{
        echo "<h1>No prescriptions found.</h1>";
    }
}
else{
    echo "<p>No patient found with ID '$patient_id' or may be the name is not correct";
}

$conn->close();
?>
</table>
</body>
</html>
</body>
</html>