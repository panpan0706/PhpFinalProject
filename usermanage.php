<title>管理會員資料</title>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style='background: #EEEEEE;'>
<?php
require('include.php');
@session_start();

if($_SESSION["authority"]=="管理者"){
	$tmp=0;
	$read="SELECT * FROM users";
	$readresult=mysqli_query($link,$read);
		echo '<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">';
		echo "<center><h2 style='font-family: 微軟正黑體;'>會員資料列表</h2></center>";
		echo "<center><table border='0'>";
		echo "<tr id='list' style='background: #BBBBBB; text-align: center;'><td>　使用者編號　</td><td>　使用者姓名　</td><td>　使用者性別　</td><td>　使用者年齡　</td><td>　使用者帳號　</td><td>　使用者密碼　</td><td>　使用者權限　</td><td>　操作　</td></tr>";
	while($result=mysqli_fetch_array($readresult)){
		if($tmp%2==1){
			echo "<tr style='background: #CCCCCC'>";
		}else{
			echo "<tr style='background: #EEEEEE'>";
		}
		echo "<td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>".$result[5]."</td><td>".$result[6]."</td>";
		echo "<td style='background: #EEEEEE;'><span id='button''><a href='update.php?no=".$result[0]."'>更新資料</a></span> ";
		echo "<span id='button'><a href='del.php?no=".$result[0]."'>刪除資料</a></span></td>";
		echo "</tr>";
		$tmp++;
	}
	echo "</table>";
	echo "<div style='margin-top: 4px;'>";
	echo "<span id='button'><a href='add.php'>新增用戶</a></span> ";
	echo "<span id='button'><a href='index.php'>回首頁</a></span></center>";
	echo "</div></div>";
}else{
	header('refresh:0; url="index.php"');
}
?>
</body>