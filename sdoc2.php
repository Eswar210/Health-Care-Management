<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
  background-image: url('oo.jpg');
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
h1 {
        color: red;
    }
table td, table th {
  border: 4px solid #ddd;
  padding: 10px;
  text-align: center;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}
table tr:nth-child(odd) {
  background-color: #f2f2f2;
}

table tr:hover {
  background-color: #ddd;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(31, 106, 119);
  color: white;
  text-align: center;
}
</style>
</head>
<body>
<table>
<tr></tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$doctor_name = "Dr. " . $_POST['doctor_name'];

// Get doctor details
$doctor_sql = "SELECT * FROM doctor WHERE doctor_name = '$doctor_name'";
$doctor_result = mysqli_query($conn, $doctor_sql);

if (mysqli_num_rows($doctor_result) > 0) {
  $row = mysqli_fetch_assoc($doctor_result);
  echo "<h1 style='text-align: center;'>Doctor Details</h1>";
  echo "<table>";
  echo "<tr><th>Doctor ID</th><td>" . $row["doctor_id"] . "</td></tr>";
  echo "<tr><th>Name</th><td>" . $row["doctor_name"] . "</td></tr>";
  echo "<tr><th>Age</th><td>" . $row["age"] . "</td></tr>";
  echo "<tr><th>Qualification</th><td>" . $row["qualification"] . "</td></tr>";
  echo "<tr><th>Department</th><td>" . $row["department"] . "</td></tr>";
  echo "<tr><th>Gender</th><td>" . $row["gender"] . "</td></tr>";
  echo "<tr><th>Email</th><td>" . $row["email"] . "</td></tr>";
  echo "<tr><th>Phone</th><td>" . $row["phone_num"] . "</td></tr>";
  echo "</table>";
  echo "<br>";
} else {
  echo "<p>No doctor found with the name '$doctor_name'. Please check, the name may not be correct.";
}

$conn->close();
?>
</table>
</body>
</html>
