
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient </title>
</head>
<style>
  body {
  background-image: url('images/search_pat.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
  input[type=text], select {
  width: 80%;
  padding: 2px 20px;
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
h1{
  margin-top:150px;
}
div {
 
  margin-top:90px;
  opacity: 0.85;
    width: 40%;
  border-radius: 55px;
  background-color: #f2f2f2;
  padding: 10px;
}
</style>
<body>
    <center>
        <h1>Search Patient by Name and Id </h1>
<div>
<form action="spat2.php" method="post">
    <p>
        <label for="patient_id_name">ID or Name of the patient:</label>
        <input type="text" name="patient_id_name" id="patient_id_name">
    </p>
    <input type="submit" value="Submit">
</form>

</div>
    </center>
</body>

</html>