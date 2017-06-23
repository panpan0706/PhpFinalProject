<?php
	@session_start();
	require('include.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM comments WHERE comment_id='$id'";
	$queryresult = mysqli_query($link, $query);
	while($result = mysqli_fetch_array($queryresult)){
		if(isset($_SESSION['uAcc']) && isset($_SESSION['authority'])){
			if($result[1]==$_SESSION['uAcc'] || $_SESSION['authority']=="管理者"){
				$query2 = "DELETE FROM comments WHERE comment_id=$id";
				mysqli_query($link, $query2);
			}
		}
	}
	header('refresh:0; url="index.php"');
?>
