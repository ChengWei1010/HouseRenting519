<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<?php
			include("connect.php");
			
			if(isset($_POST["userId"])){
				$userId=$_POST["userId"];
			}
			if(isset($_POST["password"])){
				$password=$_POST["password"];
			}
			
			$sql="SELECT * FROM Manager WHERE manager_Id = '$userId' AND manager_pw = '$password'";
			$result = mysqli_query($conn, $sql);
			$row =mysqli_fetch_row($result);
			
			$sql2="SELECT * FROM Member WHERE mId = '$userId' AND password = '$password'";
			$result2 = mysqli_query($conn, $sql2);
			$row2=mysqli_fetch_row($result2);
			
			if($userId!=NULL && $password!=NULL && preg_match("/^[A-Z][0-9]{9}$/",$userId)){
				//管理者登入
				if($row[0]==$userId && $row[1]==$password){

					$_SESSION["userId"]=$userId;
					$_SESSION["password"]=$password;
					$_SESSION["mName"]=$row[2];
					
					echo '管理者登入成功!';
					echo '<meta http-equiv=REFRESH CONTENT=1;url=Manager.php>';
				}
				//一般用戶登入
				else if($row[0]!=$userId && $row[1]!=$password){
					
					if($row2[0]==$userId && $row2[2]==$password){
						$_SESSION["userId"]=$userId;
						$_SESSION["password"]=$password;
						$_SESSION["mName"]=$row2[1];
					
						echo '登入成功!';
						echo '<meta http-equiv=REFRESH CONTENT=1;url=Browse.php>';
					}
					
				}
				else
				{
					echo '登入失敗!';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=home.html>';
				}
			}
			else{
				echo "<script>alert('帳號格式錯誤(第一個為英文大寫)')</script>";
				
				echo '<meta http-equiv=REFRESH CONTENT=0;url=home.html>';
			}
			
		?>
	</body>
</html>