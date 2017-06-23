<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>修改個人資料</title>
</head>

<?php
	@session_start();
	if(isset($_SESSION["uAcc"])){
		$uAcc=$_SESSION["uAcc"];
		require('include.php');

		$read="SELECT * FROM users WHERE account='".$uAcc."'"; 	//只是字串
		$readresult=mysqli_query($link,$read);
		$result=mysqli_fetch_array($readresult);
?>
	<body style='background: #EEEEEE;'>
	<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
	<center><h2 style='font-family: 微軟正黑體;'>使用者修改個人資料</h2></center>
	<table border='0' align="center" style='background: #DDDDDD';>
		<td>
<?php
echo "<form action='userupdate_apply.php' method='post'>";
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>編號 ".$result[0]."<br/></div>";
echo "<input type='hidden' name='no' value='".$result[0]."'>";
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>姓名 <input type='text' name='name' value='".$result[1]."' required/></div>";
if($result[2] == '男'){
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男' checked>男<input type='radio' name='gender' value='女' >女</div>";
}else if($result[2] == '女'){
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男'>男<input type='radio' name='gender' value='女' checked>女</div>";
}else{
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男'>男<input type='radio' name='gender' value='女' >女</div>";
}
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>年齡 <input type='text' name='age' size='3' value='".$result[3]."' required/></div>";
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>帳號 ".$result[4]."</div>";
echo "<input type='hidden' name='account' value='".$result[4]."'></input>";
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>密碼 <input type='password' name='password' value='".$result[5]."' required/></div>";
echo "<input type='hidden' name='authority' value='".$result[6]."'>";
echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>權限 ".$result[6];
echo "<div style='text-align: center;'>";
echo "<input type='submit'> ";
echo "<input type='reset' style='margin-top: 6px;' align='center'>";
echo "</div></form>";

mysqli_free_result($readresult);
mysqli_close($link);

?>
		</td>
	</table>
	<center style='margin-top: 4px;'>
		<span id="button"><a href="index.php">回首頁</a></span>
	</center>
	</div>
	</body>
<?php
	}else{
		header('refresh:0; url="index.php"');
	}
?>
