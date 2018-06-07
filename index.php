<?php
$servername = "localhost";
$username = "root";
$password = "";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password);
// Kiểm tra kết nối
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Tạo database
$sql = "CREATE DATABASE books";
if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
} else {
	echo "Error creating database: " . $conn->error;
}
$dbname = "books";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE bookTable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR (50) NOT NULL,
author VARCHAR (50) NOT NULL,
year INT(50) NOT NULL,
price DECIMAL(10,2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
	echo "Table bookTable created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}
$adminURL = 'list.php';
header('Location: '.$adminURL);
?>
