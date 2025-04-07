<!DOCTYPE html>
<html lang="en">

<style>
h1{
  text-align:center;
  color: red;
}
body {
  background-image: url('background_pres.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  opacity: 0.85;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: 300px;
  margin-top: 40px;
  
}

table td, table th {
  border: 4px solid #ddd;
  padding: 10px;
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
  <h1>Prescriptions</h1>
<table>
<tr>
<th>number</th>
<th>Patient_ID</th>
<th>Problem</th>
<th>Tablet1</th>
<th>How many tablets</th>
<th>Tablet2</th>
<th>How many tablets</th>
<th>Amount</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM prescription ORDER BY prescription_number DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["prescription_number"]. "</td><td>" . $row["patient_id"]
      ."</td><td>" . $row["problem"] .  "</td><td>" . $row["tablet1"]."</td><td>" 
      . $row["1_no_of_tablets"] .  "</td><td>" . $row["tablet2"]."</td><td>" .
      $row["2_no_of_tablets"]."</td><td>".$row["total_amount"]."</td></tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>
</body>
</html>