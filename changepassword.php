<!DOCTYPE html>
<html lang="en">

<style>

table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 45%;
  margin-left: 80px;
  margin-top: 10px;
  
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
    <title>Document</title>
</head>
<body>
<table>
<tr>
</tr>
<?php

		
$conn = new mysqli("localhost", "root", "", "project");
// Check connection
if($conn === false){die("ERROR: Could not connect. ".mysqli_connect_error());}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $patient_id = $_POST['patient_id'];

    $patient_sql = "SELECT password FROM patients WHERE patient_id = '$patient_id'";
    $patient_result = mysqli_query($conn, $patient_sql);
    $row = mysqli_fetch_assoc($patient_result);
    if ($row["password"] == $old_password) {
        $update_sql = "UPDATE patients SET password = '$new_password' WHERE patient_id = '$patient_id'";
        $update_result = mysqli_query($conn, $update_sql);
        if ($update_result) {
            echo "Password Updated Successfully.";
                exit();
        } 
        else {
                echo "Error updating password. Please try again later.";
        } 
    }
    else {
        echo "Old password is incorrect. Please try again.";
}
}
?>

</table>
</body>
</html>
</body>
</html>