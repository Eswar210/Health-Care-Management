<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor</title>
</head>
<style>
body {
    background-image: url('images/background_doc.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

input[type=text,number,radio], select {
    width: 80%;
    padding: 12px 20px;
    margin: 80px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}
h1{
  color:red;
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

div {
    width: 30%;
    border-radius: 5px;
    background-color: rgba(255,255,5,0.3);
    padding: 10px;
    margin: 0 auto;
    text-align: center; 
}

h1 {
    text-align: center; 
}
</style>
<body>
    <h1>New Doctor</h1>
    <div>
        <form action="insdoc.php" method="post">
            <p>
                <label for="doctor_name">Doctor Name:</label>
                <input type="text" name="doctor_name" id="doctor_name">
            </p>
            <p>
                <label for="age">Age:</label>
                <input type="number" name="age" id="age">
            </p>
            <p>
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
            </p>
            <p>
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" id="DOB">
            </p>
            <p>
                <label for="qualification">Qualification:</label>
                <input type="text" name="qualification" id="qualification">
            </p>
            <p>
                <label for="department">Department:</label>
                <input type="text" name="department" id="department">
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </p>
            <p>
                <label for="phone_num">Phone Number:</label>
                <input type="text" name="phone_num" id="phone_num">
            </p>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
