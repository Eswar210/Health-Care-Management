
<!DOCTYPE html>
<html lang="en">

<style>
h1{
  text-align:center;
}
body {
  background-image: url('background_doc.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
table {
  opacity: 0.75;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 80px;
  margin-top: 140px;
  
}

table td, table th {
  border: 4px solid #ddd;
  padding: 5px 30px;
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
    <title>Doctor</title>
</head>
<body>
  <h1> Doctor Information</h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM doctor";
$result = mysqli_query($conn, $sql);

// Check if there are any rows in the result set
if (mysqli_num_rows($result) > 0) {
  // Print table headers
  echo "<table><tr><th>doctor_id	</th><th>doctor_name	</th><th>age	</th><th>gender	</th><th>DOB	</th><th>qualification	</th><th>department	</th><th>email	</th><th>  phone_num  </th></tr>";

  // Loop through result set and print each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["doctor_id"]."</td><td>".$row["doctor_name"]."</td><td>".$row["age"]."</td><td>".$row["gender"]."</td><td>".$row["DOB"]."</td><td>".$row["qualification"]."</td><td>".$row["department"]."</td><td>".$row["email"]."</td><td>".$row["phone_num"]."</td></tr>";
  }
  // Close table tag
  echo "</table>";
} else {
  echo "No results found.";
}



$conn->close();
?>
</table>
</body>
</html>
</body>
</html>