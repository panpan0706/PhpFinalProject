<meta charset="utf-8">

<?php
@session_start();
$no=$_POST["no"];
$name=$_POST["name"];
@$gender=$_POST["gender"];
$age=$_POST["age"];
$account=$_POST["account"];
$password=$_POST["password"];
$authority=$_POST["authority"];

require('include.php');

$update="UPDATE users SET name='$name',gender='$gender',age='$age',account='$account',password='$password',authority='$authority' WHERE No=".$no;
@mysqli_query($link,$update);

echo "修改成功，";

if(isset($_SESSION["uAcc"])){
	if($_SESSION["uAcc"]==$account){
		echo "並重新登入";
		unset($_SESSION["uAcc"]);
		if(isset($_SESSION["authority"])){
			unset($_SESSION["authority"]);
		}
		header('refresh:3; url="index.php"');
	}else{
		echo "跳轉回用戶管理頁";
		header('refresh:3; url="usermanage.php"');
	}
}

?>
