<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

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
echo "修改成功，請重新登入";
if(isset($_SESSION["uAcc"])){
	unset($_SESSION["uAcc"]);
}
if(isset($_SESSION["authority"])){
	unset($_SESSION["authority"]);
}
header('refresh:3; url="index.php"');

?>
