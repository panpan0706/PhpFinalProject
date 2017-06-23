<meta charset="utf-8">

<?php
$no=$_GET["no"];
require('include.php');

$del="DELETE FROM users WHERE no='$no'";	//如果是字串，要加單引號
mysqli_query($link,$del);
echo "刪除成功，跳轉回管理用戶頁";
header('refresh:3; url="usermanage.php"');

?>