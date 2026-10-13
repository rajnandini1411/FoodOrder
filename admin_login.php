<?php
session_start();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin123")
    {
        $_SESSION['admin'] = "admin";
        header("Location: admin.php");
    }
    else
    {
        $error = "Invalid Admin Login";
    }
}
?>

<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    background: url('images/loginbg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
</head>
<body>

<div class="header">Admin Login</div>

<div class="container">
<form method="POST" class="form-box">
    <h2>Admin Login</h2>

    <?php if(isset($error)) { ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php } ?>

    <input type="text" name="username" placeholder="Enter Admin Username" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit" name="login">Login</button>
</form>
</div>

</body>
</html>