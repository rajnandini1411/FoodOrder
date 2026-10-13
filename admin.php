<?php
session_start();
include 'db.php';

/* Admin login check */
if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
}

$result = mysqli_query($conn,"SELECT * FROM orders");
?>

<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="style.css">

<style>
table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
}

table, th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #ff6600;
    color: white;
}

.btn {
    padding: 6px 12px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
}

.update {
    background-color: green;
}

.delete {
    background-color: red;
}
</style>
</head>
<body>

<div class="header">
Admin Panel
<a href="logout.php" style="float:right; color:white; margin-right:20px;">Logout</a>
</div>

<table>
<tr>
<th>ID</th>
<th>Food</th>
<th>Quantity</th>
<th>User Email</th>
<th>Status</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php while($row = mysqli_fetch_array($result)) { ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['food_name']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['user_email']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a class="btn update" href="update.php?id=<?php echo $row['id']; ?>">
Done
</a>
</td>

<td>
<a class="btn delete" href="delete.php?id=<?php echo $row['id']; ?>">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>