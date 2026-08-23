<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Update product</title>
</head>

<body>
  <h1>Update Product Quantity</h1>
    <form method="post" action="UpPrd.php">
        <div class="form-group">
            <label for="exampleInputName">Product Id</label>

            <select name="prId">
                <?php
                require "DBcon.php";
                $qur2 = "SELECT * FROM `modprd`";
                $exc2 = mysqli_query($con, $qur2);
                while ($rows = mysqli_fetch_assoc($exc2)) {
                    echo "'<option value='" . $rows['prId'] . "'>" . $rows['prId'] . "</option>";
                };


                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Product Quantity</label>
            <input name="pq" type="number" class="form-control" id="exampleInputEmail">

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
require "DBcon.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset(
        $_POST['prId'],
        $_POST['pq']
    )) {
        $PI = $_POST['prId'];
        $PQ = $_POST['pq'];
        $qurfetch = "SELECT * FROM `modprd` where `prId`='$PI'";
        $exc = mysqli_query($con, $qurfetch);
        $rowdata = mysqli_fetch_assoc($exc);
        $total = $rowdata['prQuant'];
        $qtytotal = $total + $PQ;
        $qur = "UPDATE `modprd` SET `prQuant`='$qtytotal' 
                WHERE `prId`='$PI'";
        $exc = mysqli_query($con, $qur);
        if ($exc) {
            echo "
                    <script>
                        alert('Product Stock updated Successful.');
                        window.location.href='SellerPort.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Product is not Reg Yet!!');
                        window.location.href='SellerPort.php';
                    </script>
                ";
        }
    }
}
?>