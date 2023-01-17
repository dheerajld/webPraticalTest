<?php
	include './includes/config.php';
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
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Add New Product
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
									<input  type="text" class="field size1" name="product_name" required />
								</p>
								<p>
									<span class="req">max 200 symbols</span>
									<label>Product Description <span>(Required Field)</span></label>
									<textarea type="text" class="field size1" name="product_description" required />
								</textarea>	</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label for="cars">Product Category:</label>
  <select name="product__category" id="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
								</p>

								<p>
									<span class="req">Current Images</span>
									<label>Product Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="product_image" required />
								</p>
								
								<p>
									<span class="req">max 20 symbols</span>
									<label>Product Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="product_price" required />
								</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label for="cars">Product Status</label>
  <select name="product_status" id="cars">
    <option value="active">Active</option>
    <option value="inactive">InAcctive</option>
 
  </select>
								</p>
								
								
							
						</div>
						
						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" name="send" />
						</div>
						
					</form>
					<?php
							if(isset($_POST['send'])){
								
								$target_path = "./imges/";
								$target_path = $target_path . basename ($_FILES['product_image']['name']);
								if(move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path)){
								
								$product_image = basename($_FILES['product_image']['name']);
								$product_name = $_POST['product_name'];
								$product_description = $_POST['product_description'];
								$product_category = $_POST['product_category'];
								$product_price = $_POST['product_price'];
								$product_status = $_POST['product_status'];

								
								

					            $qr = "INSERT INTO `products`( `product_name`, `product_description`, `product_category`, `product_image`, `product_price`, `status`) VALUES ('$product_name','$product_description','$product_category','$product_image','$product_price','$product_status')"	;							
								$res = $conn->query($qr);
							
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"administrator.php\")
											</script>";
									}
								}
								else 'Failed';
							}
						?>
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
		<span class="left">&copy; <?php echo date("Y");?> - Dheeraj</span>
		<span class="right">
			Design by <a href="http://Dheeraj.in">Dheeraj</a>
		</span>
	</div>
</div>
	
</body>
</html>