<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Customer</title>
</head>

<body>
  <center>
    <h1>Customer Registration</h1>
  </center>
  <form method="POST" action="RegCust.php">
                  <div class="form-group">
                    <label for="exampleInputName">Full Name</label>
                    <input name="n1" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Full Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputDOB">Date Of Birth</label>
                    <input name="d1" type="date" class="form-control" id="exampleInputDOB">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input name="e1" type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="p1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><br>
                  <button href="MainPage.php" type="submit" class="btn btn-primary">Register</button>
               
              </div>
              
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
        $_POST['n1'],
       $_POST['d1'],
       $_POST['e1'],
       $_POST['p1']
       ))
    {
        $n=$_POST['n1'];
        $d=$_POST['d1'];
        $e=$_POST['e1'];
        $p=$_POST['p1'];
    $qur1="INSERT INTO `buyer` (`BName`,`BDOB`,`BEmail`,`BPassword`)VALUES ('$n','$d','$e','$p')";
    $exc1=mysqli_query($con,$qur1);
    if($exc1){
        echo "<script>
        alert('Registered Successfully');
         window.location.href='LogCust.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Registration Failed');
        </script>";
    }
}
}
?>