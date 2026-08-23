<?php
$server_name='localhost';
$user_name='root';
$user_Pass='';
$dbName='sellerdb';

$con=mysqli_connect($server_name,$user_name,$user_Pass,$dbName);//connect our database with our scripting
//without dbname connectivity is done with phpmy admin not with your database
// if($con){
// echo "Connected<br>";
// }
// else{
//     echo "Not Connected<br>";
// }
?>