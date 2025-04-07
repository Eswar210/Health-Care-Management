<!DOCTYPE html>
<html lang="en">

<style>
h1{
  text-align:center;
}
body {
  background-image: url('images/background_pat.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  opacity: 0.85;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: 300px;
  margin-top: 100px;
  
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
  <h1> Patient Information </h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  patient_id,patient_name,age,DOB,gender,phone_num,aadhar_no	 FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
        <tr>
        <th>patient_id</th>
        <th>Patient_name</th>
        <th>Age</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Phone number</th>
        <th>Aadhaar number</th>
        </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["patient_id"] . "</td>
            <td>" . $row["patient_name"] . "</td>
            <td>" . $row["age"] . "</td>
            <td>" . $row["DOB"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["phone_num"] . "</td>
            <td>" . $row["aadhar_no"] . "</td>
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