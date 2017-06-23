<!DOCTYPE HTML>


<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<script>
	function apply(){
		if(document.form1.content.value==""){
			alert('內容不可為空!');
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
	require('header.php');
	require('include.php');
	$id = $_GET["id"];
	$query = "SELECT * FROM articles WHERE article_id = $id";
	$queryresult = mysqli_query($link, $query);
	$comment = 0;
	@session_start();
	while($result = mysqli_fetch_array($queryresult)){
		$title = $result[2];
		echo '<div style="background:#DDDDDD; margin-left:20px; margin-right:20px;">';
		echo '<div style="background: #CCCCCC">';
		echo '<h2 style="margin-left:1rem; margin-top:0.5em; margin-right:1rem;">';
		echo $result[2];
		echo '</h2>';
		echo "<title>".$result[2]."</title>";
	
		
		echo '</div>';
		/*echo '<p style="margin-left:1rem; text-align:right; margin-top: -2.8rem; margin-right: 0.4rem;">';
		echo $result[4];
		echo '</p>';*/
		$s = "SELECT star FROM comments WHERE article=".$id;
		$s_result = mysqli_query($link,$s);
		$total=0;
		$count=0;
		while($rs = mysqli_fetch_array($s_result) )
		{
			$total+=$rs[0];
			$count++;
		}
		if($count==0)
		{
			echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';

			echo "作者：".$result[1]." | ";
			echo "尚無評價 | ";
			echo $result[4];
			echo '</p>';
			
		}
		else
		{
			$total= $total/$count;
			echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';
			echo "作者：".$result[1]." | ";
			echo "評價：".round($total,1)."★ | ";
			echo $result[4];
			echo '</p>';
		}
		
		echo '<p style=" margin-left:1.5rem; margin-right:1.5rem; margin-bottom:1rem;">';
		echo str_replace("\n","</br>",$result[3]);
		echo "<div></br>";
		if(isset($_SESSION['authority'])){
			if($_SESSION['authority']=="管理者" || $result[1]==$_SESSION['uAcc']){
				echo "<div style='text-align: right;'><span id='button' style='margin-right: 8px;'><a href='del_article.php?id=".$id."'>刪除本串</a></span></div>";
			}
		}
		echo "</div>";
		echo '</div>';
		$comment = 1;
	}
	$query = "SELECT * FROM comments WHERE article = $id";
	$queryresult = mysqli_query($link, $query);
	while($result = mysqli_fetch_array($queryresult)){
		echo '<div style="background:#DDDDDD; margin-left:20px; margin-right:20px;">';
		echo '<div style="background: #CCCCCC">';
		echo '<h2 style="margin-left:1rem; margin-top:0.5em; margin-right:1rem;">';
		echo "RE: ".$title;
		echo '</h2>';
		echo '</div>';
		/*echo '<p style="margin-left:1rem; text-align:right; margin-top: -2.8rem; margin-right: 0.4rem;">';
		echo $result[4];
		echo '</p>';*/
		echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';
		echo  "作者：".$result[1]." | 評價：".$result[5]."★ | ".$result[4];
		echo '</p>';
		echo '<p style=" margin-left:1.5rem; margin-right:1.5rem; margin-bottom:1rem;">';
		echo str_replace("\n","</br>",$result[3]);
		echo "<div></br>";
		if(isset($_SESSION['authority'])){
			if($_SESSION['authority']=="管理者" || $result[1]==$_SESSION['uAcc']){
				echo "<div style='text-align: right;'><span id='button' style='margin-right: 8px;'><a href='del_comment.php?id=".$result[0]."'>刪除回應</a></span></div>";
			}
		}
		echo "</div>";
		echo '</div>';
	}
		if($comment==1 && isset($_SESSION["uAcc"])){
?>
			<center><h2 style='font-family: 微軟正黑體;'>回應文章</h2></center>
			<div border='0' align="center" style='margin-left:20px; margin-right:20px; background: #DDDDDD;'>
				<td>
				<form name="form1" action="comment_apply.php" method="POST" onsubmit="return apply();">
<?php
					echo "<input name='article_id' type='hidden' value='".$id."'/>"
?>
					<div style="margin-left: 8px; margin-right: 8px;">
						<textarea name="content" style="width:90%; margin-top: 8px; margin-bottom: 8px; height: 400px;" /></textarea>
					</div>
					<div>
  <label>
    給餐廳的評價:<input type="radio" class="option-input radio" name="star" value='1'/>
    1★
  </label>
  <label>
    <input type="radio" class="option-input radio" name="star" value='2'/>
   2★
  </label>
  <label>
    <input type="radio" class="option-input radio" name="star" value='3'/>
    3★
  </label>
  <label>
    <input type="radio" class="option-input radio" name="star" value='4'/>
    4★
  </label>
  <label>
    <input type="radio" class="option-input radio" name="star" value='5' checked/>
    5★
  </label>
</div>
					<div align="right" style="margin-right: 8px; margin-bottom: 4px;">
						<button type="submit" accesskey="s">回應文章</button>
					</div>
					<div align="right" style="height:4px;"></div>
				</form>
				</td>
			</div>
			
			</div>
<?php
		}
?>
		<center style='margin-top: 4px;'>
			<span id="button"><a href="index.php">回首頁</a></span>
		</center>
</body>
