
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Department </title>
</head>
<style>
  body {
  background-image: url('search_doc.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
  input[type=text], select {
  width: 80%;
  padding: 12px 20px;
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
h1{
  margin-top:140px;
}
div {
  margin-top:9px;
    width: 40%;
  border-radius: 50px;
  background-color: #f2f2f2;
  padding: 10px;
}
</style>
<body>
    <center>
        <h1>Search By Department Name</h1>
<div>
        <form action="sdept2.php" method="post">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project");
            $sql = "SELECT DISTINCT department FROM doctor";
            $dept_result = mysqli_query($conn, $sql);

            echo "<label for='department'>Name of the Department:</label>";
            echo "<select name='department' id='department'>";
            while($row = mysqli_fetch_assoc($dept_result)) {
                echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
            }
            echo "</select>";
            mysqli_close($conn);
            ?>
            <input type="submit" value="Submit">
        </form>
</div>
    </center>
</body>

</html>