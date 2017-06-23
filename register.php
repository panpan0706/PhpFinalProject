<!DOCTYPE html>
  <html>
	<head>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

    <body style='background: #EEEEEE;'>
		<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
        <form action="" method="post">
		<center>
		
		<h2 style='font-family: 微軟正黑體;'>註冊帳號</h2>
		<table border='0' style='text-align: center; background-color:#DDDDDD;'><td>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					姓名 <input type="text" name="name" size="6" required/>
			</div>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					性別 <input type="radio" name="gender" value="男" checked>男<input type="radio" name="gender" value="女">女
				</div>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					年齡 <input type="text" name="age" size="6" required/>
				</div>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					帳號 <input type="text" name="account" size="6" required/>
				</div>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					密碼 <input type="password" name="password" size="6" required/>
				</div>
				<div style='margin-top: 8px; margin-left: 8px; margin-right: 8px;'>
					確認密碼 <input type="password" name="passwordconfirm" size="6" required/>
				</div>
				<div style='text-align: center; margin-top: 8px; margin-bottom: 4px;'>
					<input type="submit"> <input type="reset">
				</div>
			</td></table>
			<center style='margin-top: 4px;'>
				<span id="button"><a href="index.php">回首頁</a></span>
				<span id="button"><a href="login.php">已有帳號</a></span>
			</center>
		</center>
		</div>
		
           

          <?php
			
          	  if(isset($_POST["name"])){
              $name=$_POST['name'];
              $gender=$_POST['gender'];
              $age=$_POST['age'];
              $account=$_POST['account'];
              $password=$_POST['password'];
              $passwordconfirm=$_POST["passwordconfirm"];

              require('include.php');
              $add="INSERT INTO users (name,gender,age,account,password,authority) VALUES ('$name','$gender','$age','$account','$password','普通用戶')";
              $check="SELECT * FROM users WHERE  account='$account'";
              $readresult=mysqli_query($link,$check);
              $result=mysqli_fetch_array($readresult);
              if ($result[4]==$account)
              {
              echo "帳號已被使用，跳轉至註冊頁面";
              header('refresh:1; url="register.php"');
              }
              else if($password!=$passwordconfirm)
              {
                echo "密碼不符，請重新輸入";
                header('refresh:1; url="register.php"');
              }
              else
              {
              	mysqli_query($link,$add);
              	echo "註冊完成，跳轉至登入頁面";
              	header('refresh:1; url="login.php"');
              }
          }
              
          ?>
            </form>
    </body>
  </html>
