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
			
			if(isset($_POST["mName"])){
				$mName=$_POST["mName"];
			}
			if(isset($_POST["userId"])){
				$userId=$_POST["userId"];
			}
			if(isset($_POST["password"])){
				$password=$_POST["password"];
			}
			if(isset($_POST["password2"])){
				$password2=$_POST["password2"];
			}
			
			
			//學號第一個字英文大寫,後面9個數字
			if (preg_match("/[A-Z][0-9]{9}/",$userId)) {
				echo "條件符合";
				
				if($mName!=NULL && $userId!=NULL && $password!=NULL && $password2!=NULL && $password==$password2){
					$sql="INSERT INTO Member(mId,mName,password) VALUES('$userId','$mName','$password')";
					
					if(mysqli_query($conn, $sql)){
						
						$_SESSION["userId"]=$userId;
						$_SESSION["password"]=$password;
						$_SESSION["mName"]=$mName;
						
						echo "新增成功";
						echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
					}
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				else{
					echo '請重新填寫';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
				}
			}
			else {
				echo "條件不符合";
				echo '請重新填寫';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
			}

		?>

	</body>
</html>