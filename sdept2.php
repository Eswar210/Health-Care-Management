<!DOCTYPE html>
<html lang="en">

<style>

body {
  background-image: url('search_doc.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-color: rgba(255, 255, 255, 0.2);
}
table {
  opacity: 0.9;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 400px;
  margin-top: 20px;
  
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
h1{
  margin-top:50px;
  text-align:center;
  color:red;
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
$department =$_POST['department'];

// Get department details
$department_sql = "SELECT * FROM doctor WHERE department = '$department'";
$department_result = mysqli_query($conn, $department_sql);

    echo "<h1>Doctors who belongs to $department department</h1>";
    echo "<table>";
    echo "<tr><th>Doctor ID</th><th>Name</th><th>Age</th><th>Qualification</th><th>Gender</th><th>Email</th><th>Phone</th></tr>";
    
    while ($row = mysqli_fetch_assoc($department_result)) {
        echo "<tr>";
        echo "<td>".$row["doctor_id"] . "</td>";
        echo "<td>".$row["doctor_name"] . "</td>";
        echo "<td>".$row["age"]."</td>";
        echo "<td>".$row["qualification"] . "</td>";
        echo "<td>".$row["gender"] . "</td>";
        echo "<td>".$row["email"] . "</td>";
        echo "<td>".$row["phone_num"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "<br>";

$conn->close();
?>
</table>
</body>
</html>
</body>
</html>