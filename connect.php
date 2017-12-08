<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	</head>
	
	<body>
		<?php
			$servername="140.117.69.70";
			$username="group7";
			$password="sevenAdmin7";
			$dbname="dbClass_group7";
			
			$conn=mysqli_connect($servername,$username,$password);
			
			mysqli_query($conn, 'SET CHARACTER SET utf8');
			mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
			
			if(!$conn){
				die("Fail" .mysqli_connect_error());
			}
			//echo"Success to connect<br>";
			
			mysqli_select_db($conn,$dbname) or die ("Fail" .mysqli_connect_error());
			//echo"Success to select database<br>";
		?>
	</body>
</html>