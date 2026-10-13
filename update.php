<?php
include 'db.php';

$id = $_GET['id'];

mysqli_query($conn,"UPDATE orders SET status='Done' WHERE id='$id'");

header("Location: admin.php");
?>