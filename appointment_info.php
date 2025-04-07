<!DOCTYPE html>
<html lang="en">

<style>
h1{
  text-align:center;
}
body {
  background-image: url('background_appoi.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  opacity: 0.9;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
  margin-left: 150px;
  margin-top: 20px;
  
}

table td, table th {
  border: 4px solid #ddd;
  padding: 10px ;
  text-align: center;
  color: rgb(142,10,156);
  
}

table tr:nth-child(even){background-color: rgb(251,254,254);}
table tr:nth-child(odd){background-color: rgb(255,255,255);}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  rgb(255,224, 203);
  color: white;
  text-align: center;
  color: rgb(21,27,6);
}

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<body>
  <h1> Appointments</h1>
<table>
<tr>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT appointment_id ,patient_id,  problem , doctor_name , time FROM appointment ORDER BY appointment_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
        <th>Appointment NO.</th>
        <th>Patient_ID</th>
        <th>Doctor </th>
        <th>Problem</th>
        <th>Time </th>
        <th>Status</th> 
        </tr>";
  
        date_default_timezone_set('Asia/Kolkata');
  while($row = $result->fetch_assoc()) {
    $atime = strtotime($row["time"]);
    $system_time = time();
    $status = $atime < $system_time ? "OP" : "IP";
    echo "<tr>
            <td>" . $row["appointment_id"] . "</td>
            <td>" . $row["patient_id"] . "</td>
            <td>" . $row["doctor_name"] . "</td>
            <td>" . $row["problem"] . "</td>
            <td>" . $row["time"] . "</td>
            <td>" . $status . "</td>
          </tr>";
  }
  echo "</table>";
} 
else {
  echo "0 results";}
$conn->close();
?>
</table>
</body>
</html>
</body>
</html>