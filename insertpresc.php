
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Prescription </title>
</head>
<style>
  body {
  background-image: url('images/background_pres.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
  input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 70%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
    width: 40%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}
</style>
<body>
    <center>
        <h1>Insert Data in prescription table</h1>
<div>
        <form action="insertpresc2.php" method="post">
            <p>
                <label for="patient_id">patient_id:-</label>
                <input type="text" name="patient_id" id="patient_id">
            </p>
            <?php
            $conn =mysqli_connect("localhost", "root", "", "project");

            // Check connection
            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

            // Fetch all problems from the problem table
            $sql = "SELECT problem_name FROM problem";
            $result = $conn->query($sql);

            // Generate the select element with options
            echo '<p><label for="problem">Problem:</label>';
            echo '<select name="problem" id="problem">';
            while ($row = $result->fetch_assoc()) 
            {  echo '<option value="' . $row['problem_name'] . '">' . $row['problem_name'] . '</option>';}
            echo '</select></p>';

            $conn->close();// Close the database connection
            ?>
            <p>
                <label for="o_no_of_tablets">No. of type-1 tablets:-</label>
                <input type="number" name="o_no_of_tablets" id="o_no_of_tablets">
            </p>
            
            <p>
                <label for="t_no_of_tablets">No. of type-2 tablets:-</label>
                <input type="number" name="t_no_of_tablets" id="t_no_of_tablets">
            </p>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>