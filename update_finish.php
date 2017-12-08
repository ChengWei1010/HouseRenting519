<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update</title>
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
	
	
			if($mName!=NULL && $userId!=NULL && $password!=NULL && $password2!=NULL && $password==$password2){
				$sql="UPDATE Member SET password='$password' WHERE mId='$userId'";
				
				if(mysqli_query($conn, $sql)){
					
					$_SESSION["userId"]=$userId;
					$_SESSION["password"]=$password;
					$_SESSION["mName"]=$mName;
					
					echo "修改成功";
					echo '<meta http-equiv=REFRESH CONTENT=1;url=Browse.php>';
				}
				else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			else{
				echo '請重新填寫';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
			}

		?>
	</body>
</html>