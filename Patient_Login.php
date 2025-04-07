<!DOCTYPE html>
<html>
<head>
    <title>Patient Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            color: rgb(0,0,0);
            padding: 20px;
            text-align: center;
        }
        body{background-image: url('images/search_doc.jpg');background-size: cover;}
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
            background-color: rgba(0,255,255,0.2);
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
            box-shadow: 0 2px 10px rgba(0, 0, 255, 0.1);
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
        <h1>Patient Login</h1>
    </header>
    <div class="container">
        <div class="card">
            <h2>Login</h2>
            <form method="post" action="patappoi.php">
                <label for="patient_name">Name:</label>
                <input type="text" id="patient_name" name="patient_name" required><br><br>
                <label for="patient_id">ID:</label>
                <input type="number" id="patient_id" name="patient_id" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login"><br><br>
                
        </div>
    </div>
</body>
</html>


