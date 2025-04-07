
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient </title>
</head>
<style>
    body {
  background-image: url('background_pat.jpg');
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
        <h1>New Patient </h1>
<div>
        <form action="insertpatient2.php" method="post">
        <p>
            <label for="patient_name">patient_name:</label>
            <input type="text" name="patient_name" id="patient_name">
        </p>
        <p>
            <label for="age">age:</label>
            <input type="number" name="age" id="age">
        </p>
        <p>
            <label for="DOB">DOB:</label>
            <input type="date" name="DOB" id="DOB">
        </p>
        <p>
            <label for="gender">gender:</label>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F">Female
            <input type="radio" name="gender" value="O">Other        
        </p>
        <p>
            <label for="phone_num">phone_num:</label>
            <input type="text" name="phone_num" id="phone_num">
        </p>
        <p>
            <label for="aadhar_no">aadhar_no:</label>
            <input type="text" name="aadhar_no" id="aadhar_no">
        </p>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>