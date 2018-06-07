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
					<h3 class="box-title">BOOK LIST</h3>
				</div>
				<div class="box-body">
					<?php
					require_once("common/connect.php");
					// Lấy tất cả các trường trong bảng booktable sắp xếp theo id
					$sql = "SELECT * from `booktable` order by id asc";
					// Thực thi truy vấn với biến $conn lấy từ connect.php và gán vào biến $result
					$result = mysqli_query($conn, $sql);
					?>
					<table class="table table-hover" id="list">
						<thead>
						<tr>
							<th>ID</th>
							<th>TITLE</th>
							<th>AUTHOR</th>
							<th>YEAR</th>
							<th>PRICE</th>
							<th>OPTION</th>
						</tr>
						</thead>
						<tbody>
<!--						Lặp kết quả trả về mảng-->
						<?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :
						?>
						<tr>
<!--							echo từng giá trị của các trường trong CSDL-->
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['title'] ?></td>
							<td><?php echo $row['author'] ?></td>
							<td><?php echo $row['year'] ?></td>
							<td><?php echo $row['price'] ?></td>
							<td>
<!--								Truyền id thông qua URL qua file edit.php và delete.php-->
								<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> <a
								href="delete.php?id=<?php echo $row['id']; ?>"
								onclick="return confirm('Are you sure ?');">Delete</a>
							</td>
						</tr>
						<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div><!-- /.content-wrapper -->
<?php
require("common/footer.php");
?>