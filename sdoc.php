
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor </title>
</head>
<style>
  body {
        background-image: url("background_doc.jpg");
        background-repeat: no-repeat;

        background-size: cover;
       
    }
  input[type=text], select {
  width: 50%;
  padding: 5px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 30px;
  box-sizing: border-box;
}
h1 {
        color: red;
    }
input[type=submit] {
  width: 20%;
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
h1{
  margin-top:150px;
}
div {
  opacity: 0.89;
  margin-top:90px;
  width: 40%;
  border-radius: 90px;
  background-color: #f2f2f2;
  padding: 10px;
}

</style>
<body>
    <center>
        <h1>Search Doctor By Name</h1>
<div>
        <form action="sdoc2.php" method="post">
        <p>
            <label for="doctor_name">Name of the Doctor:</label>
            <input type="text" name="doctor_name" id="doctor_name">
        </p>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>