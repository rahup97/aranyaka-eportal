<?php
	include 'dbconnect.php';
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM circularevent WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die("Failed to Delete!");
	}
?>
<script>
	location.assign("CircularDelete.php");
</script>