<?php
	include './includes/config.php';
?>
<?php
if(isset($_GET['upd'])){
  $id = $_GET['upd'];
   $query = "SELECT * FROM products WHERE product_id = $id";
  $fire = mysqli_query($conn,$query) or die("can not insert data to database".mysqli_error($conn));
   $products = mysqli_fetch_assoc($fire);
} 
?>

<?php 
 if(isset($_POST['update'])){
  

   $target_path = "./imges/";
   $target_path = $target_path . basename ($_FILES['product_image']['name']);
   if(move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path)){
   
   $product_image = basename($_FILES['product_image']['name']);
   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $product_category = $_POST['product_category'];
   $product_price = $_POST['product_price'];
   $product_status = $_POST['product_status'];

   
   

   $qr = "UPDATE products SET product_name='$product_name',product_description='$product_description',product_category='$product_category',product_image='$product_name',product_price='$product_price',product_status='$product_status' WHERE product_id=$id"	;							
   $res = $conn->query($qr);

   if($res === TRUE){
       echo "<script type = \"text/javascript\">
               alert(\"Vehicle Succesfully Added\");
               window.location = (\"administrator.php\")
               </script>";
       }
   }

   if($fire) header("Location:index.php");
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
			<a href="index.php">Dashboard</a>
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
									<input  type="text" class="field size1" name="product_name" value="<?php echo $products['product_name']?>" required />
								</p>
								<p>
									<span class="req">max 200 symbols</span>
									<label>Product Description <span>(Required Field)</span></label>
									<textarea type="text" class="field size1" name="product_description" value="<?php echo $products['product_description']?>" required />
								</textarea>	</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label for="cars">Product Category:</label>
  <select name="product__category" value="<?php echo $products['product__category']?>"  id="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
								</p>

								<p>
									<span class="req">Current Images</span>
									<label>Product Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="product_image" value="<?php echo $products['product_image']?>" required />
								</p>
								
								<p>
									<span class="req">max 20 symbols</span>
									<label>Product Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="product_price" value="<?php echo $products['product_price']?>" required />
								</p>

								<p>
									<span class="req">max 20 symbols</span>
									<label for="cars">Product Status</label>
  <select name="product_status"  value="<?php echo $products['product_status']?>"  id="cars">
    <option value="active">Active</option>
    <option value="inactive">InAcctive</option>
 
  </select>
								</p>
								
								
							
						</div>
						
						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" name="update"  />
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
		<span class="left">&copy; <?php echo date("Y");?> - Dheeraj</span>
		<span class="right">
			Design by <a href="http://Dheeraj.in">Dheeraj</a>
		</span>
	</div>
</div>
	
</body>
</html>