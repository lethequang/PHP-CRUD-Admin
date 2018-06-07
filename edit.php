<?php
require("common/header.php");
require("common/sidebar.php");
?>
<!--	Dùng phương thức $_GET để lấy biến id của người dùng truyền qua từ bên trang list.php, sau đó thực hiện việc gọi vào cơ sở dữ liệu, thông qua biến id để truy vấn toàn bộ thông tin của sách trong database, đồng thời tiến hành cập nhật khi quản trị viên chỉnh sửa một thông tin nào đó-->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">ADD BOOK</h3>
				</div>
				<div class="box-body">
					<?php
					require_once("common/connect.php");
					// Kiểm tra các giá trị đã nhập từ form rồi lưu vào database
					if (isset($_POST["submit"])) {
						$title = $_POST["title"];
						$author = $_POST["author"];
						$year = $_POST["year"];
						$price = $_POST["price"];

						$id = $_POST['id'];
						// Update các giá trị nhập từ form lưu vào database
						$sql = "UPDATE booktable SET title='$title', author='$author', year='$year', price='$price' WHERE id='$id'";
						// Thực thi $sql với biến $conn lấy từ connect.php
						mysqli_query($conn, $sql);
						$adminURL = 'list.php';
						header('Location: ' . $adminURL);
					}
					// Khi lấy được tham số id từ list.php thì chúng ta sẽ query và lấy dữ liệu theo id này từ database
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					} else {
						die('No id');
					}
					// Lấy tất cả các trường trong bảng booktable với id là $id
					$sql = "SELECT * from booktable WHERE id = '$id'";
					// Thực thi truy vấn và gán vào biến $result
					$result = mysqli_query($conn, $sql);
					if (!$result) {
						die('Query error: [' . $conn->error . ']');
					}
					// Lấy kết quả theo mảng trả về biến $row
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					?>
<!--					Lấy dữ liệu từ query trên và gán vào form hiển thị-->
					<form method="post" action="edit.php">
						<div class="form-group">
<!--							Tạo một input hidden cho id để sử dụng ở trên-->
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<!--							echo từng giá trị của các trường trong CSDL-->
							<label for="title">Title:</label> <input type="text" class="form-control" id="title"
							value="<?php echo $row['title']; ?>" name="title">
						</div>
						<div class="form-group">
							<label for="author">Author:</label> <input type="text" class="form-control" id="author"
							value="<?php echo $row['author']; ?>" name="author">
						</div>
						<div class="form-group">
							<label for="year">Year:</label> <input type="number" class="form-control" id="year"
							value="<?php echo $row['year']; ?>" name="year">
						</div>
						<div class="form-group">
							<label for="price">Price:</label> <input type="number" class="form-control" id="price"
							value="<?php echo $row['price']; ?>" name="price">
						</div>
						<input type="submit" class="btn btn-default" name="submit" value="Submit">
					</form>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div><!-- /.content-wrapper -->
<?php
require("common/footer.php");
?>