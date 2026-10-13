<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM users 
    WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['user'] = $email;

        if($email == "admin@gmail.com")
        {
            header("Location: admin.php");
        }
        else
        {
            header("Location: order.php");
        }
    }
    else
    {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">Online Food Ordering System</div>

<div class="container">
    <form method="POST" class="form-box">
        <h2>Login Here</h2>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
        <p>New User? <a href="register.php">Register Here</a></p>
    </form>
</div>

</body>
</html>