<?php
require_once("common/connect.php");
// Lấy tham số id từ list.php qua phương thức GET
// Kiểm tra người dùng nhấn vào liên kết xóa hay chưa
$id = $_GET['id'];
if (isset($_GET['id'])) {
	// Câu lệnh sql xóa phần tử với id là $id gán ở trên
	$sql = "DELETE FROM booktable WHERE id = '$id'";
	// Thực thi truy vấn với biến $conn lấy từ connect.php
	mysqli_query($conn, $sql);
}
$adminURL = 'list.php';
header('Location: ' . $adminURL);
?>