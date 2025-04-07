<!DOCTYPE html>
<html lang="en">

<style>
    h1 {
        font-family: "Georgia", Times, serif;
        color: yellow;
        text-align: center;
    }

    h2 {
        font-family: "Georgia", Times, serif;
        color: yellow;
        text-align: center;
    }

    body {
        background-image: url('images/background_doc.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .center-table {
        width: 80%;
        margin: 0 auto; /* Center the table on the page */
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: left;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        margin: 10px;
    }

    .table-container table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin:15px;
    }

    .table-container table td,
    .table-container table th {
        border: 4px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .table-container table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-container table tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .table-container table tr:hover {
        background-color: #ddd;
    }

    .table-container table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(31, 106, 119);
        color: white;
        text-align: center;
    }

    .COMPLETED {
        background-color: #FFCCCC; /* Past appointments in red */
    }

    .upcoming {
        background-color: blue; /* Future appointments in green */
    }

    .card {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        margin:20px
    }

    form {
        margin: 0 auto;
    }

    .input-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .input-container label {
        flex: 1;
    }

    .input-container input {
        flex: 3;
        padding: 5px;
    }
    
    input[type=submit] {
        width: 70%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 40px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
    .button-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF; /* Choose your desired background color */
        color: #fff; /* Text color */
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button-link:hover {
        background-color: #0056b3; /* Color change on hover */
    }

</style>

<head>
    <!-- Your head content here -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="center-table">
    <div class="table-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conn = mysqli_connect("localhost", "root", "", "project");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $patient_name = $_POST['patient_name'];
            $patient_id = $_POST['patient_id'];
            $password = $_POST['password'];

            echo "<h1>Hello $patient_name</h1>";

            // Get patient details
            $patient_sql = "SELECT * FROM patients WHERE patient_id = '$patient_id' AND patient_name ='$patient_name' AND password = '$password'";
            $patient_result = mysqli_query($conn, $patient_sql);

            if (mysqli_num_rows($patient_result) > 0) {
                $row = mysqli_fetch_assoc($patient_result);
                echo "<h2>Your Details</h2>";
                echo "<table>";
                echo "<tr><th>Patient ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Aadhar</th><th>Phone</th></tr>";
                echo "<tr><td>" . $row["patient_id"] . "</td><td>" . $row["patient_name"] . "</td><td>" . $row["Age"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["aadhar_no"] . "</td><td>" . $row["phone_num"] . "</td></tr>";
                echo "</table>";
                echo "<br>";

                // Get past appointments
                $appointments_sql = "SELECT * FROM appointment WHERE patient_id = '$patient_id' ORDER BY time DESC";
                $appointments_result = mysqli_query($conn, $appointments_sql);
        ?></div></div>
                <div class="container">
                    <div class="table-container">
                        <?php
                        if (mysqli_num_rows($appointments_result) > 0) {
                            echo "<h2>Appointments</h2>";
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Doctor</th><th>problem</th><th>Status</th></tr>";
                            while ($row = mysqli_fetch_assoc($appointments_result)) {
                                $atime = strtotime($row["time"]);
                                $system_time = time();
                                $status = $atime < $system_time ? "COMPLETED" : date("Y-m-d H:i:s", $atime);
                                echo "<tr>";
                                echo "<td>" . $row["appointment_id"] . "</td>";
                                echo "<td>" . $row["doctor_name"] . "</td>";
                                echo "<td>" . $row["problem"] . "</td>";
                                if($status === "COMPLETED")
                                    echo "<td class=COMPLETED>" . $status . " - " . date("Y-m-d H:i:s", $atime) . "</td>";
                                else{
                                    $status="UPCOMING";
                                    echo "<td class=upcoming>" . $status . " - " . date("Y-m-d H:i:s", $atime) . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "<br>";
                        } else {
                            echo "<h2>No appointments found.</h2>";
                        }
                        ?>
                    </div>
                    <div class="table-container">
                        <?php
                        // Get prescriptions
                        $prescriptions_sql = "SELECT * FROM prescription WHERE patient_id = '$patient_id'";
                        $prescriptions_result = mysqli_query($conn, $prescriptions_sql);

                        if (mysqli_num_rows($prescriptions_result) > 0) {
                            echo "<h2>Prescriptions</h2>";
                            echo "<table>";
                            echo "<tr><th>Number</th><th>problem</th><th>tablet1</th><th>No. of (1) tablets</th><th>tablet2</th><th>No. of (2) tablets</th><th>total_amount</th></tr>";
                            while ($row = mysqli_fetch_assoc($prescriptions_result)) {
                                echo "<tr>";
                                echo "<td>" . $row["prescription_number"] . "</td>";
                                echo "<td>" . $row["problem"] . "</td>";
                                echo "<td>" . $row["tablet1"] . "</td>";
                                echo "<td> " . $row["1_no_of_tablets"] . "</td>";
                                echo "<td>" . $row["tablet2"] . "</td>";
                                echo "<td>" . $row["2_no_of_tablets"] . "</td>";
                                echo "<td>" . $row["total_amount"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<h2>No prescriptions found.</h2>";
                        }
                        ?>
                    </div>
                </div>
        <?php
            } else {
                echo "<h2>Invalid Details. Please Enter Correct Details</h2>";
                exit();
            }

            $conn->close();
        }
        ?>
        <br>
        <br>
        <div class="container">
            <div class="card">
            <h1>New Appointment</h1>
                <form action="insertappoi2.php" method="post">
                    <div class="input-container">
                            <label for="patient_id">Patient ID:</label>
                            <input type="number" name="patient_id" id="patient_id" required>
                    </div>
                    <div class="input-container">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name">
                    </div>
                    <div class="input-container">
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
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="card">
                <h2>If you want to change the password, fill in the details below:</h2>
                <form method="post" action="changepassword.php">
                    <div class="input-container">
                        <label for="patient_name">Name:</label>
                        <input type="text" id="patient_name" name="patient_name" required>
                    </div>
                    <div class="input-container">
                        <label for="patient_id">ID:</label>
                        <input type="number" id="patient_id" name="patient_id" required>
                    </div>
                    <div class="input-container">
                        <label for="old_password">Old Password:</label>
                        <input type="password" id="old_password" name="old_password" required>
                    </div>
                    <div class="input-container">
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                    </div>
                    <input type="submit" value="Submit">
                    <!-- <a href="changepassword.php" class="button-link">Change Password</a> -->

                </form>
            </div>
        </div>
    </table>
</body>
</html>
