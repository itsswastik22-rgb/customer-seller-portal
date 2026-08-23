<?php
session_start();
require 'DBcon.php';



$buyer = $_SESSION['bName'];

// Fetch user's orders
$query = "SELECT * FROM `orders` WHERE `BName` = '$buyer'";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="mb-4">Orders for: <span class="text-Secondary"><?php echo $_SESSION['bName']; ?></span></h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Amount (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['OID']; ?></td>
                        <td><?php echo $row['PName']; ?></td>
                        <td><?php echo $row['PQuant']; ?></td>
                        <td>₹<?php echo number_format($row['Amt'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No orders found for you.</div>
    <?php endif; ?>

</body>
</html>
