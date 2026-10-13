<?php
include 'db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn,"INSERT INTO users(name,email,password)
    VALUES('$name','$email','$password')");

    echo "<script>alert('Registration Successful')</script>";
}
?>

<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    background: url('images/registerbg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

/* Center form */
.container {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
</head>
<body>

<div class="header">User Registration</div>

<div class="container">
<form method="POST" class="form-box">
    <h2>Register Here</h2>
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter Email" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit" name="register">Register</button>
    <p>Already have account? <a href="login.php">Login</a></p>
</form>
</div>

</body>
</html>