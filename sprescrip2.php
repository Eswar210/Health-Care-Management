<!DOCTYPE html>
<html lang="en">

<style>

body {
  background-image: url('background_pres.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 100px;
  margin-top: 10px;
  
}
h2{
  color: red;
  text-align:center
}
table td, table th {
  border: 4px solid #ddd;
  padding: 40px ;
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
    <title>Document</title>
</head>
<body>
<table>
<tr>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$prescription_number =$_POST['prescription_number'];

// Get prescription details
$prescription_sql = "SELECT * FROM prescription WHERE prescription_number = '$prescription_number'";
$prescription_result = mysqli_query($conn, $prescription_sql);

if (mysqli_num_rows($prescription_result)>0) {
  $row = mysqli_fetch_assoc($prescription_result);
  echo "<h2>Prescription Details</h2>";
  echo "<table>";
  echo "<tr>";
  echo "<th>prescription ID</th>";
  echo "<th>ID of the patient</th>";
  echo "<th>Name</th>";
  echo "<th>Problem</th>";
  echo "<th>Tablet Type-1</th>";
  echo "<th>No. of type1 tablets</th>";
  echo "<th>Tablet Type-2</th>";
  echo "<th>No. of type2 tablets</th>";
  echo "<th>Amount</th>";
  echo "</tr>";
  echo "<tr>";
  
  $patient_id = $row["patient_id"];
  $patient_sql = "SELECT patient_name FROM patients WHERE patient_id = '$patient_id'";
  $patient_result = mysqli_query($conn, $patient_sql);
  $patient_row = mysqli_fetch_assoc($patient_result);

  echo "<td>".$row["prescription_number"] . "</td>";
  echo "<td>".$patient_id."</td>";
  echo "<td>".$patient_row["patient_name"]."</td>";
  echo "<td>".$row["problem"]."</td>";
  echo "<td>".$row["tablet1"] . "</td>";
  echo "<td>".$row["1_no_of_tablets"] . "</td>";
  echo "<td>".$row["tablet2"] . "</td>";
  echo "<td>".$row["2_no_of_tablets"] . "</td>";
  echo "<td>".$row["total_amount"] . "</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br>";
}

else{
    echo "<p>No prescription found with name '$prescription_number'.";
}

$conn->close();
?>
</table>
</body>
</html>
</body>
</html>