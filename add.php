<html>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style='background: #EEEEEE;'>
<center>
	<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
	<h2 style='font-family: 微軟正黑體;'>管理者新增使用者資料</h2>
	<table border='0' style='background: #DDDDDD';><td>
	<form action="" method="post">
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			姓名 <input type="text" name="name">
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			性別 
				<input type="radio" name="gender" value="男">男
				<input type="radio" name="gender" value="女">女
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			年齡 <input type="text" name="age" size="3">
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			帳號 <input type="text" name="account">
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			密碼 <input type="password" name="password">
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			確認密碼 <input type="password" name="passwordconfirm">
		</div>
		<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
			權限 
			<select name="authority"> 
				<option>普通用戶</option>
				<option>管理者</option>
			</select>
		</div>
		<div style='margin-top: 8px; text-align: center;'>
			<input type="reset"> <input type="submit">
		</div>
	</form>
	</td></table>
	<center style='margin-top: 4px;'>
		<span id="button"><a href='index.php'>回首頁</a></span>
	</center>
	</div>
</center>
<?php
if(isset($_POST["name"])){
	$name=$_POST["name"];
	@$gender=$_POST["gender"];
	$age=$_POST["age"];
	$account=$_POST["account"];
	$password=$_POST["password"];
	$passwordconfirm=$_POST["passwordconfirm"];
	$authority=$_POST["authority"];
//新增資料

require('include.php');
$add="INSERT INTO users (name,gender,age,account,password,authority) VALUES('$name','$gender','$age','$account','$password','$authority')";
if($password == $passwordconfirm)
{
	mysqli_query($link,$add);
	echo "新增成功，跳轉至用戶頁。";
	header('refresh:3; url="usermanage.php"');
}
else
{
	echo "密碼不符，請重新輸入。";
	header('refresh:3; url="add.php"');
}



}
?>
</body>
</html>
