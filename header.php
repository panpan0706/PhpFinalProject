<div align="center">
	<a href="index.php"><img src="https://static.wixstatic.com/media/a4f5367577aa425aa87387f2f68b4c46.jpg/v1/fill/w_841,h_561,al_c,q_85,usm_0.66_1.00_0.01/a4f5367577aa425aa87387f2f68b4c46.webp" width="40%" height="40%"></a>
</div>

<!--wrapper-->
<div style="width:900px; height:1px; background:#EEEEEE; margin:0 auto; font-family:微軟正黑體;">

<div style="margin-top: 1rem;">

	<!--top-->
	<div id="h_buttons" style="margin-top: 1rem;">
		<ul style="margin-left: -20px; margin-top:0px;">
<?php @session_start();
	if(isset($_SESSION["uAcc"]) && isset($_SESSION["authority"])){
		echo '<li style="margin-top: 4px;">身分：';
		echo $_SESSION["uAcc"];
		echo "（".$_SESSION["authority"];
		echo "）</li>";
	}
?>
			<li><a href="index.php">文章列表</a></li>
<?php @session_start();
	if(!isset($_SESSION["uAcc"])){
?>
			<li><a href="login.php">登入</a></li>
			<li><a href="register.php">註冊</a></li>
<?php
	}else{
?>
			<li><a href="post.php">發表文章</a></li>
			<li><a href="mail_list.php">收信
<?php
			require('include.php');
			$ac = $_SESSION["uAcc"];
			$total = 0;
			$query = "SELECT * FROM mails WHERE id_to='$ac' AND read_status=0";
			$queryresult = mysqli_query($link, $query);
			while($querydata = mysqli_fetch_array($queryresult)){
				$total++;
			}
			if($total != 0){
				echo "(".$total.")";
			}
?>
			</a></li>
			<li><a href="mail.php">寄信</a></li>
			<li><a href="userupdate.php">修改個人資料</a></li>
<?php
		if(isset($_SESSION["authority"])){
			if($_SESSION["authority"]=="管理者"){
?>
				<li><a href="usermanage.php">管理會員資料</a></li>
				<li><a href="piechart.php">資料分析</a></li>
<?php
			}
		}
		echo '<li><a href="logout.php">登出</a></li>';
	}
?>

			<!--li><a href="https://facebook.com">測試連結1</a></li>-->
			<!--<li><a href="https://facebook.com">測試連結2</a></li>-->
	</div>
</body>