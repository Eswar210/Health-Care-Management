 <!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            color: rgb(255,0,255);
            padding: 20px;
            text-align: center;
        }
        body{background-image: url('b4.jpg');background-size: cover;}
        h1 {
            margin: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .card {
            background-color: rgba(0,255,255,0.1);
            border-radius: 25px;
            box-shadow: 0 2px 10px rgba(0, 255, 0, 0.3);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .card h2 {
            margin-top: 10;
        }
        .card input[type="text"],
        .card input[type="password"] {
            display: block;
            margin: 0 auto;
            align-items: center;
            margin-top: 5px;
            width: 65%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 255, 255, 0.1);
            font-size: 16px;
        }


        .card input[type="submit"] {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        .card input[type="submit"]:hover {
            background-color: #01f500;
        }
        .card p {
            margin-bottom: 0;
        }
        .card a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Login</h1>
    </header>
    <div class="container">
        <div class="card">
            <h2>Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $conn = new mysqli('localhost', 'root', '', 'project');
                    
            if ($conn->connect_error) {die('Connection failed: ' . $conn->connect_error);}
            $sql = "SELECT * FROM Staff WHERE Staff_name='$name' AND password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<script>alert("Login successful!");</script>';
                header("Location: choice.html?name=" . urlencode($name));
                exit();
            }
            else {echo '<script>alert("Invalid name or password!");</script>';}
            $conn->close();
        }
?>
</body>
</html>
