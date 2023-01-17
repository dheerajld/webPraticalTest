<?php
	include './includes/config.php';
	$id = $_REQUEST['id'];
		$query = "DELETE FROM products WHERE product_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"project Successfully Send\");
					window.location = (\"administrator.php\")
				</script>";
	}
?>
