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
		session_destroy();
		echo '登出中......';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=home.html>';
	?>
		
	</body>
</html>