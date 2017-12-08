<?php
	session_start();
	
	$member_id = $_SESSION["userId"];
	$member_pw = $_SESSION["password"];
	$member_name = $_SESSION["mName"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	</head>
	
	<body>
		<?php
			include("connect.php");

			//此判斷為判定觀看此頁有沒有權限
			//說不定是路人或不相關的使用者
			//因此要給予排除
			/*if($_SESSION['user']!=NULL){
				
				$sql = "SELECT * FROM member_table";
				$result = mysql_query($sql);
				while($row = mysql_fetch_row($result)){
					echo "$row[0] - 名字(帳號)：$row[1], " . 
					"電話：$row[3], 地址：$row[4], 備註：$row[5]<br>";
				}
			}
			else{
				echo '您無權限觀看此頁面!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
			}*/
			echo $member_name;
			echo "您好!!!<br><br>";
			echo "<a href='HouseForm.html'>我要新增房屋嗚嗚</a><br><br>";
			echo "<a href='Board.php'>我要留言</a><br><br>";
		?>
		
		<a href="update.php">修改會員資料</a><br><br>
		<a href="logout.php">登出</a><br><br>
	</body>
</html>