<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
	@session_start();
	if(isset($_SESSION["uAcc"])){
		date_default_timezone_set("Asia/Shanghai");
		$account=$_SESSION["uAcc"];
		$article_id=$_POST["article_id"];
		$content=$_POST["content"];
		$star=$_POST["star"];
		$date = date_create();
		$time = date_timestamp_get($date);

		require('include.php');

		$query = "INSERT INTO comments (account, article, content, star) VALUES('$account','$article_id','$content','$star')";
		mysqli_query($link,$query);
	}else{
		echo "error";
	}
	header('refresh:0; url="article.php?id='.$article_id.'"');
?>