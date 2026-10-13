<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}

if(isset($_POST['order']))
{
    $food = $_POST['food'];
    $qty = $_POST['qty'];
    $email = $_SESSION['user'];

    mysqli_query($conn,"INSERT INTO orders(food_name,quantity,user_email,status)
    VALUES('$food','$qty','$email','Pending')");

    $success = "Order Placed Successfully!";
}
?>

<html>
<head>
<title>Order Food</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    Order Food
    <a href="logout.php" style="float:right; color:white; margin-right:20px;">Logout</a>
</div>

<div class="container">
<form method="POST" class="form-box">

<h3>Welcome <?php echo $_SESSION['user']; ?></h3>

<?php if(isset($success)) { ?>
    <div class="success-msg"><?php echo $success; ?></div>
<?php } ?>

<div class="food-grid">

<label class="food-card">
<input type="radio" name="food" value="Pizza" required>
<img src="images/pizza.jpg">
<p>Pizza</p>
</label>

<label class="food-card">
<input type="radio" name="food" value="Burger">
<img src="images/burger.jpg">
<p>Burger</p>
</label>

<label class="food-card">
<input type="radio" name="food" value="Pasta">
<img src="images/pasta.jpg">
<p>Pasta</p>
</label>

<label class="food-card">
<input type="radio" name="food" value="Sandwich">
<img src="images/sandwich.jpg">
<p>Sandwich</p>
</label>

</div>

<input type="number" name="qty" placeholder="Enter Quantity" required>
<button type="submit" name="order">Place Order</button>

</form>
</div>

</body>
</html>