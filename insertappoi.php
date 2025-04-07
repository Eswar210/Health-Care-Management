<!DOCTYPE html>
<html lang="en">

<head>
    <title> New Appointment</title>
</head>
<style>
    body {
  background-image: url('images/background_appoi.jpg');
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
        <h1>New Appointment</h1>
        <div>
            <form action="insertappoi2.php" method="post">
                <p>
                    <label for="patient_id">Patient ID:</label>
                    <input type="number" name="patient_id" id="patient_id" required>
                </p>
                <p>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </p>
                <p>
                    <label for="problem_name">Related Problem:</label>
                    <select name="problem_name" id="problem_name">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "project");
                            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error); }
                            $query = "SELECT problem_name FROM problem";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['problem_name'] . "'>" . $row['problem_name'] . "</option>";
                            }
                            $conn->close();// close database connection
                        ?>
                    </select>
                </p>
                <input type="submit" value="Submit">
            </form>
        </div>
    </center>
</body>
</html>