<!DOCTYPE HTML>


<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style='background: #EEEEEE;'>

<?php
	@session_start();
	if(!isset($_SESSION["uAcc"])){
		header('refresh:0; url="index.php"');
	}else{
		$id = $_SESSION["uAcc"];
		$mail_id = $_GET["id"];
		require('include.php');
		$query = "UPDATE mails SET read_status=1 WHERE id_to='$id' AND mail_id=$mail_id";
		$queryresult = mysqli_query($link, $query);
		require('header.php');
		$query = "SELECT * FROM mails WHERE id_to='$id' AND mail_id=$mail_id";
		$queryresult = mysqli_query($link, $query);
		$result = mysqli_fetch_array($queryresult);
		echo '<title>'.$result[3].'</title>';
		echo '<div style="background:#DDDDDD; margin-left:20px; margin-right:20px;">';
		echo '<div style="background: #CCCCCC">';
		echo '<h2 style="margin-left:1rem; margin-top:0.5em; margin-right:1rem;">';
		echo $result[3];
		echo '</h2>';
		echo '</div>';
		echo '<p style="margin-left:1rem; text-align:right; margin-top: -2.8rem; margin-right: 0.4rem;">';
		echo $result[5];
		echo '</p>';
		echo '<p style="margin-top: -8px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';
		echo "作者：".$result[1];
		echo '</p>';
		echo '<p style=" margin-left:1.5rem; margin-right:1.5rem; margin-bottom:1rem;">';
		echo str_replace("\n","</br>",$result[4]);
		echo "<div></br></div>";
		echo '</div>';
	}
?>
	<center style='margin-top: 4px;'>
		<span id="button"><a href="mail_list.php">回列表</a></span>
	</center>
</body>