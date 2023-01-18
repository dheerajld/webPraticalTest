<?php
include './includes/config.php';
if (isset($_SESSION['id'])) {
	header("location:index.php");
}
?>
<?php
if (isset($_GET['upd'])) {
	$id = $_GET['upd'];
	$query = "SELECT * FROM products WHERE product_id = $id";
	$fire = $conn->query($query) or die("can not insert data to database" . mysqli_error($conn));
	$products = $fire->fetch_assoc();
}
// echo "<pre>";
// print_r($products);
?>

<?php
if (isset($_POST['update'])) {

	// print_r($_POST);
	// exit;
	$target_path = "./imges/";
	$target_path = $target_path . basename($_FILES['product_image']['name']);
	if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path)) {

		$product_image = basename($_FILES['product_image']['name']);
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$product_price = $_POST['product_price'];
		$product_status = $_POST['product_status'];







		$sql = "UPDATE products SET product_name=$product_name,product_description=$product_description,product_image=$product_image ,product_price=$product_price,status=$product_status WHERE `product_id`=$id";
		$res = $conn->query($sql);
		// print_r($res);
		// exit;

		if ($res == TRUE) {
			echo "<script type = \"text/javascript\">
               alert(\"Product Updated\");
               window.location = (\"administrator.php\")
               </script>";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>

<body>
	<div id="header">
		<div class="shell">

		</div>
	</div>
	</div>

	<div id="container">
		<div class="shell">

			<div class="small-nav">
				<a href="logout.php">Logout</a>
				<span>&gt;</span>
				Edit Product
			</div>

			<br />

			<div id="main">
				<div class="cl">&nbsp;</div>

				<div id="content">

					<div class="box">
						<div class="box-head">
							<h2>Add New Projects</h2>
						</div>

						<form action="" method="post" enctype="multipart/form-data">

							<div class="form">
								<p>
									<span class="req">max 20 symbols</span>
									<label>Product Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="product_name" value="<?php echo $products['product_name'] ?>" required />
								</p>
								<p>
									<span class="req">max 200 symbols</span>
									<label>Product Description <span>(Required Field)</span></label>
									<textarea type="text" class="field size1" name="product_description" value="<?php echo $products['product_description'] ?>" required>
									</textarea>
								</p>


								<p>
									<span class="req">Current Images</span>
									<label>Product Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="product_image" value="<?php echo $products['product_image'] ?>" required />
								</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label>Product Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="product_price" value="<?php echo $products['product_price'] ?>" required />
								</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label for="cars">Product Status</label>
									<select name="product_status" value="<?php echo $products['product_status'] ?>" id="cars">
										<option value="active">Active</option>
										<option value="inactive">InAcctive</option>

									</select>
								</p>



							</div>

							<div class="buttons">

								<input type="submit" class="button" value="update" name="update" />
							</div>

						</form>
					</div>

				</div>

				<div id="sidebar">

				</div>

				<div class="cl">&nbsp;</div>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="shell">
			<span class="left">&copy; <?php echo date("Y"); ?> - Dheeraj</span>
			<span class="right">
				Design by <a href="https://www.linkedin.com/in/dhiraj-dhas-a01a89190/">Dheeraj</a>
			</span>
		</div>
	</div>

</body>

</html>