<!DOCTYPE html>
<html lang="en">

<style>
h1{
  text-align:center;
}
body {
  background-image: url('background_staff.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  opacity: 0.85;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 400px;
  margin-top: 200px;
  
}

table td, table th {
  border: 3px solid #ddd;
  padding: 15px 30px;
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
    <title>Dashboard</title>
</head>
<body>
  <h1> Staff Information</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "project");

if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$sql = "SELECT staff_id,staff_name, phonenumber,email FROM staff";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email</th>
        </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["staff_id"] . "</td>
            <td>" . $row["staff_name"] . "</td>
            <td>" . $row["phonenumber"] . "</td>
            <td>" . $row["email"] . "</td>
          </tr>";
  }
  
  echo "</table>";
} 
else {
  echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>
</body>
</html>