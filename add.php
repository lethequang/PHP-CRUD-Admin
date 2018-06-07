<?php
require("common/header.php");
require("common/sidebar.php");
?>
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
					// Hàm kiểm tra các giá trị từ submit form bằng phương thức POST
					if (isset($_POST["submit"])) {
						$title = $_POST["title"];
						$author = $_POST["author"];
						$year = $_POST["year"];
						$price = $_POST["price"];

					// Validate cho các input
						if ($title == "" || $author == "" || $year == "" || $price == "") {
							echo "Không được để trống";
						} elseif ($year < 1000 || $year > 2018) {
							echo "Năm phải từ 1000 đến 2018";
						} else {
							// Lấy tất cả các trường trong bảng booktable với title là $title
							$sql = "select * from booktable where title='$title'";
							// Thực thi truy vấn và gán vào biến $check
							$check = mysqli_query($conn, $sql);
							// Kiểm tra số dòng dữ liệu > 0
							if (mysqli_num_rows($check) > 0) {
								echo "Sách đã tồn tại";
							} else {
								// Thêm các giá trị lấy từ submit form vào database
								$sql = "INSERT INTO booktable (title,author,year,price)
											VALUES ('$title','$author','$year','$price')";
								// Thực thi $sql với biến $conn lấy từ connect.php
								mysqli_query($conn, $sql);
								echo "Thêm sách thành công";
							}
						}
					}
					?>
					<form method="post">
						<div class="form-group">
							<label for="title">Title:</label> <input type="text" class="form-control" id="title"
							value="" name="title">
						</div>
						<div class="form-group">
							<label for="author">Author:</label> <input type="text" class="form-control" id="author"
							value="" name="author">
						</div>
						<div class="form-group">
							<label for="year">Year:</label> <input type="number" class="form-control" id="year" value=""
							name="year">
						</div>
						<div class="form-group">
							<label for="price">Price:</label> <input type="number" class="form-control" id="price"
							value="" name="price">
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