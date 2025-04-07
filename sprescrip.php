
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
  width: 50%;
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 40px;
  box-sizing: border-box;
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
h1{margin-top:210px}
div {
  opacity: 0.9;
    width: 40%;
  border-radius: 50px;
  background-color: #f2f2f2;
  margin-top:50px;
  padding: 10px;
}
</style>
<body>
    <center>
        <h1>Search By Prescription Id</h1>
<div>
        <form action="sprescrip2.php" method="post">
        <p>
            <label for="prescription_number">ID of the Prescription:</label>
            <input type="number" name="prescription_number" id="prescription_number">
        </p>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>