<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style='background: #EEEEEE;'>
<?php
@session_start();
if(isset($_SESSION["authority"])){
	if($_SESSION["authority"]=="管理者"){
		$no=$_GET["no"];
		require('include.php');

		$read="SELECT * FROM users WHERE No=".$no; 	//只是字串
		$readresult=mysqli_query($link,$read);
		$result=mysqli_fetch_array($readresult);

		echo '<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">';
		echo "<center><h2 style='font-family: 微軟正黑體;'>管理者修改會員資料</h2></center>";


		echo "<table border='0' align='center' style='background: #DDDDDD;'>";
		echo "<td>";
				
		echo "<form action='update_apply.php' method='post'>";
		echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>編號 ".$result[0]."</div>";
		echo "<input type='hidden' name='no' value='".$result[0]."'>";
		echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>姓名 <input type='text' name='name' value='".$result[1]."' required/></div>";
if($result[2] == '男')
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男' checked>男<input type='radio' name='gender' value='女' >女</div>";
else if($result[2] == '女')
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男'>男<input type='radio' name='gender' value='女' checked>女</div>";
else 
	echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>性別 <input type='radio' name='gender' value='男'>男<input type='radio' name='gender' value='女' >女</div>";

		echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>年齡 <input type='text' name='age' size='3' value='".$result[3]."' required/></div>";
		echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>帳號 ".$result[4]."</div>";
		echo "<input type='hidden' name='account' value='".$result[4]."'></input>";
		echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>密碼 <input type='password' name='password' value='".$result[5]."' required/></div>";
		if($result[6]=='普通用戶')
		{
			echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>權限 <select name='authority'> 
			<option selected>".$result[6]."</option>
			<option>管理者</option>
			</select></div>";
		}
		else
		{
			echo "<div style='margin-left: 8px; margin-right: 8px; margin-top: 8px;'>權限 <select name='authority'> 
			<option selected>".$result[6]."</option>
			<option>普通用戶</option>
			</select></div>";
		}


		echo "<div style='text-align: center; margin-top: 4px;'><input type='reset'> ";
		echo "<input type='submit'></div>";
		echo "</form></table>";

		mysqli_free_result($readresult);
		mysqli_close($link);


?>

	<center style='margin-top: 4px;'>
		<span id="button"><a href="usermanage.php">回列表</a></span> 
		<span id="button"><a href="index.php">回首頁</a></span>
	</center>
	</div>
	
<?php
	}else{
		header('refresh:0; url="index.php"');
	}
}else{
	header('refresh:0; url="index.php"');
}	
?>
</body>
