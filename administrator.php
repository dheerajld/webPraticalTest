<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id) {
			if (confirm("Are you sure you want to delete this product?")) {
				window.location.href = 'delete_products.php?id=' + id;
			}
		}
	</script>
</head>

<body>
	<!-- Header -->
	<div id="header">
		<div class="shell">

		</div>
		<!-- End Main Nav -->
	</div>
	</div>

	<div id="container">
		<div class="shell">

			<div class="small-nav">
				<a href="logout.php">Logout</a>
				<span>&gt;</span>
				Product Management
			</div>

			<br />

			<div id="main">
				<div class="cl">&nbsp;</div>

				<div id="content">

					<div class="box">
						<!-- Box Head -->
						<div class="box-head">
							<h2 class="left">Our Product</h2>
							<div class="right">
								<label>search Producr</label>
								<input type="text" class="field small-field" />
								<input type="submit" class="button" value="search" />
							</div>
						</div>

						<div class="table">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th width="13"><input type="checkbox" class="checkbox" /></th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Product Price</th>
									<th width="110" class="ac">Content Control</th>
								</tr>
								<?php
								include './includes/config.php';
								if (isset($_SESSION['id'])) {
									header("location:index.php");
								}

								$select = "SELECT * FROM products";
								$result = $conn->query($select);
								while ($row = $result->fetch_assoc()) {
								?>
									<tr>
										<td><input type="checkbox" class="checkbox" /></td>
										<td>
											<h3><a href="#"><?php echo $row['product_name'] ?></a></h3>
										</td>
										<td><?php echo $row['product_description'] ?></td>
										<td><a href="#"><?php echo $row['product_price'] ?></a></td>
										<td><a href="javascript:sureToApprove(<?php echo $row['product_id']; ?>)" class="ico del">Delete</a><a href="edit_products.php?upd=<?php echo $row['product_id'] ?>" class="ico edit">Edit</a></td>
									</tr>
								<?php
								}
								?>
							</table>

							<!-- Pagging -->

							<!-- End Pagging -->

						</div>
						<h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>

					</div>
					<!-- End Box -->

				</div>
				<!-- End Content -->

				<!-- Sidebar -->
				<div id="sidebar">

					<!-- Box -->
					<div class="box">

						<!-- Box Head -->
						<div class="box-head">
							<h2>Management</h2>
						</div>
						<!-- End Box Head-->

						<div class="box-content">
							<a href="add_products.php" class="add-button"><span>Add new Products</span></a>
							<div class="cl">&nbsp;</div>



							<!-- Sort -->

							<!-- End Sort -->

						</div>
					</div>
					<!-- End Box -->
				</div>
				<!-- End Sidebar -->

				<div class="cl">&nbsp;</div>
			</div>
			<!-- Main -->
		</div>
	</div>
	<!-- End Container -->

	<!-- Footer -->
	<div id="footer">
		<div class="shell">
			<span class="left">&copy; <?php echo date("Y"); ?> - Dheeraj</span>
			<span class="right">
				Design by <a href="https://www.linkedin.com/in/dhiraj-dhas-a01a89190/">Dheeraj</a>
			</span>
		</div>
	</div>
	<!-- End Footer -->

</body>

</html>