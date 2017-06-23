<!DOCTYPE HTML>

<title>查看信件</title>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>查看訊息</title>
</head>

<body style='background: #EEEEEE;'>

<?php
	require("header.php");
	require('include.php');
	echo '<div style="width: 100%; background:#EEEEEE; float:left;">';
	$ac = $_SESSION["uAcc"];
	$query = "SELECT * FROM mails WHERE id_to='$ac' order by mail_id desc";
	$queryresult = mysqli_query($link, $query);
	while($result = mysqli_fetch_array($queryresult)){
		if($result[6]==0){
			echo '<div style="background:#DDDDEE; margin-left:20px; margin-right:20px;">';
			echo '<div style="background: #CCCCDD">';
			echo '<h2 style="margin-left:1rem; margin-top:0.5em;">';
			echo $result[3];
			echo '</h2>';
			echo '</div>';
		}else{
			echo '<div style="background:#DDDDDD; margin-left:20px; margin-right:20px;">';
			echo '<div style="background: #CCCCCC">';
			echo '<h3 style="margin-left:1rem; margin-top:0.5em;">';
			echo $result[3];
			echo '</h3>';
			echo '</div>';
		}
		/*echo '<p style="margin-left:1rem; text-align:right; margin-top: -2.8rem; margin-right: 0.4rem;">';
		echo $result[5];
		echo '</p>';*/
		echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';
		echo $result[5]." | ";
		echo "作者：".$result[1];
		echo '</p>';
		echo '<p style=" margin-left:1.5rem; margin-right:1.5rem; margin-bottom:1rem;">';
		echo mb_substr($result[4], 0, 80, "utf-8");
		echo '……</p>';
		echo '<div style="text-align: right;">';
		echo '<span id="button" style="margin-right: 8px; margin-bottom: 8px;"><a href="mail_read.php?id='.$result[0].'">閱讀全文…</a></span>';
		echo '</div>';
		echo '</div>';
	}
?>
	</div>
	<center style='margin-top: 4px;'>
		<span id="button"><a href="index.php">回首頁</a></span>
	</center>
</div>

</body>
