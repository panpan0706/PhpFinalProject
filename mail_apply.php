<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
	@session_start();
	if(isset($_SESSION["uAcc"])){
		date_default_timezone_set("Asia/Shanghai");
		$id_from=$_SESSION["uAcc"];
		$id_to=$_POST["to"];
		$title=$_POST["title"];
		$content=$_POST["content"];
		$date = date_create();
		$time = date_timestamp_get($date);

		require('include.php');
		$query = "SELECT * FROM users WHERE account = '$id_to'";
		$queryresult = mysqli_query($link, $query);
		$s = 0;
		while($result = @mysqli_fetch_array($queryresult)){
			$query = "INSERT INTO mails (id_from, id_to, title, content) VALUES('$id_from','$id_to','$title','$content')";
			$queryresult = mysqli_query($link, $query);
			$s = 1;
		}
		if($s==0){
			echo "<script>alert('無此帳號!')</script>";
		}else{
			echo "<script>alert('已成功寄出!')</script>";
		}
	}
	header('refresh:0; url="index.php"');
?>