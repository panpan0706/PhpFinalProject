<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
	@session_start();
	if(isset($_SESSION["uAcc"])){
		date_default_timezone_set("Asia/Shanghai");
		$account=$_SESSION["uAcc"];
		$title=$_POST["title"];
		$content=$_POST["content"];
		$date = date_create();
		$time = date_timestamp_get($date);

		require('include.php');

		$query = "INSERT INTO articles (account, title, content) VALUES('$account','$title','$content')";
		mysqli_query($link,$query);
		echo $account.'<br/>';
		echo $title.'<br/>';
		echo $content.'<br/>';
		echo $time.'<br/>';
	}else{
		echo "error";
	}
	header('refresh:0; url="index.php"');
?>