<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>傳送訊息</title>
</head>

<script>
	function apply(){
		if(document.form1.title.value=="" || document.form1.content.value=="" || document.form1.to.value==""){
			alert('標題、內容或收件者不可為空!');
			return false;
		}else{
			if (confirm('確定送出?')) {
				return true;
			}else{
				return false;
			}
		}
	}
</script>

<body style='background: #EEEEEE;'>
<?php
@session_start();
if(isset($_SESSION["uAcc"])){
?>

	<center><h2 style='font-family: 微軟正黑體;'>傳送站內訊息</h2></center>
	<table border='0' align="center" style='background: #DDDDDD;'>
		<td>
		<form name="form1" action="mail_apply.php" method="POST" onsubmit="return apply();">
			<div style="margin-left: 8px; margin-right: 8px; margin-top: 16px;">
				<div>收信人帳號</div>
				<input name="to" type="text" style="margin-bottom: 8px; width:100%;" />
			</div>
			<div style="margin-left: 8px; margin-right: 8px;">
				<div>標題</div>
				<input name="title" type="text" style="margin-bottom: 8px; width:100%;" />
			</div>
			<div style="margin-left: 8px; margin-right: 8px;">
				<div>內容</div>
				<textarea name="content" style="margin-bottom: 8px; width: 600px; height: 400px;" /></textarea>
			</div>
			<div align="right" style="margin-right: 8px; margin-bottom: 8px;">
				<button type="submit" accesskey="s">寄出</button>
			</div>
		</form>
		</td>
	</table>
	<center style='margin-top: 4px;'>
		<span id="button"><a href="index.php">回首頁</a></span>
	</center>
	</div>
	
<?php
}else{
	header('refresh:0; url="index.php"');
}	
?>
</body>