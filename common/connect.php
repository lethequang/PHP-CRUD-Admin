<?php
$username = "root";
$password = "";
$servername = "localhost";
$dbname = 'books';

// Kết nối CSDL
$conn = mysqli_connect($servername,$username,$password,$dbname) or die("No connect to database");

// Đặt mã là UTF8
mysqli_query($conn,"SET NAMES 'UTF8'");
?>