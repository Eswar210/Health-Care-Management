
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Staff </title>
</head>
<style>
    body {
  background-image: url('background_staff.jpg');
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
        <h1>New Staff</h1>
<div>
        <form action="insertuser2.php" method="post">
            <p>
                <label for="staff_name">staff_name:</label>
                <input type="text" name="staff_name" id="staff_name">
            </p>
            <p>
                <label for="phonenumber">phonenumber:</label>
                <input type="text" name="phonenumber" id="phonenumber">
            </p>
            <p>
                <label for="email">email:</label>
                <input type="text" name="email" id="email">
            </p>
            <p>
                <label for="password">password:</label>
                <input type="password" name="password" id="password">
            </p>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>