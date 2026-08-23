<?php
require 'DBcon.php';
session_start();

// Sample fallback (for testing without login page)
if (!isset($_SESSION['BName'])) {
    $_SESSION['BName'] = 'TestUser'; // replace this in production
}

// Step 1: Select Product
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['selectProduct'])) {
    $selectedProduct = $_POST['Pname'];
    $query = "SELECT * FROM `modprd` WHERE `prName` = '$selectedProduct'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['product'] = $row;
    }
}

// Step 2: Process Purchase
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['buyProduct'])) {
    $buyerName = $_SESSION['bName'];
    $buyQty = intval($_POST['buyQty']);
    $product = $_SESSION['product'];
    $pname = $product['prName'];
    $pprice = floatval($product['prPrice']);
    $availableQty = intval($product['prQuant']);
    $amount = $buyQty * $pprice;

    if ($buyQty <= 0 || $buyQty > $availableQty) {
        echo "<script>alert('Invalid quantity selected!');</script>";
    } else {
        // Update product stock
        $newQty = $availableQty - $buyQty;
        $updateQ = "UPDATE `modprd` SET `prQuant` = '$newQty' WHERE `prName` = '$pname'";
        $insertOrder = "INSERT INTO `orders` (`BName`, `PName`, `PQuant`, `Amt`) VALUES ('$buyerName', '$pname', '$buyQty', '$amount')";

        if (mysqli_query($con, $updateQ) && mysqli_query($con, $insertOrder)) {
            echo "<script>alert('Purchase successful!'); window.location.href='MyOrder.php';</script>";
            unset($_SESSION['product']);
        } else {
            echo "<script>alert('Something went wrong.');</script>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Buy Product</h2>
    <p><strong>Welcome:</strong> <?php require 'DBcon.php'; echo  $_SESSION['bName']; ?></p>

    <!-- Product Selection Form -->
    <form method="post" class="mb-4">
        <div class="form-group">
            <label for="Pname" >Select Product</label>
            <select name="Pname" id="Pname" class="form-control" required>
                <?php
                $query = "SELECT * FROM `modprd`";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['prName']}'>{$row['prName']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="selectProduct" class="btn btn-primary">Search</button>
    </form>

    <?php if (isset($_SESSION['product'])): 
    $prd = $_SESSION['product'];
?>
<form method="post">
    <div class="form-group">
        <label>Product</label>
        <input type="text" value="<?= $prd['prName'] ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Price per Unit</label>
        <input type="text" id="price" value="<?= $prd['prPrice'] ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Available Quantity</label>
        <input type="text" value="<?= $prd['prQuant'] ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label>Quantity to Buy</label>
        <input type="number" name="buyQty" id="qty" class="form-control" required min="1" max="<?= $prd['prQuant'] ?>">
    </div>
    
    <button type="button" onclick="document.getElementById('amount').value = document.getElementById('qty').value * document.getElementById('price').value" class="btn btn-info">Estimate Amount</button>
    <div class="form-group">
        <label>Total Amount</label>
        <input type="text" id="amount" class="form-control" readonly>
    </div>
    <button type="submit" name="buyProduct" class="btn btn-success">Buy</button>
</form>
<?php endif; ?>
</body>
</html>