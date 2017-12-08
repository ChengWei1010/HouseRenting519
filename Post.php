<?php
	session_start();
	
	$member_id = $_SESSION["userId"];
	$member_pw = $_SESSION["password"];
	$member_name = $_SESSION["mName"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>519租屋網</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</head>
<body onload=chgSelect()>
	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="#"></a>
				<a href="#" class="hamburger"></a>
				<nav>
					<ul>
						<li>Hi <?php echo $member_name ?>！</li>
						<li><a href="Browse.php">我要看房子</a></li>
						<li><a href="addHouse.php">新增房屋</a></li>
						<li><a href="update.php">會員中心</a></li>
					</ul>
					<a href="logout.php" class="login_btn">Logout</a>
				</nav>
			</div>
		</header><!--  end header section  -->

			<section class="caption">
				<h2 class="caption">Find Your Dream Home</h2>
				<h3 class="properties">一切都在519學生租屋</h3>
				<div class="whitebox">
					接下來請上傳一些房屋的照片！
			<?php
				$servername = "140.117.69.70";
				$username = "group7";
				$password = "sevenAdmin7";
				$dbname = "dbClass_group7";

				//header("Content-type: image/jpeg"); 

				//連接資料庫
				$conn = mysqli_connect($servername, $username, $password) or die('Error with MySQL connection!');
				//echo "Connect success!";

				//選擇資料庫
				mysqli_select_db($conn, $dbname) or die("無法選擇資料庫".mysqli_error());
				//echo "Success select database!";

				mysqli_query($conn, 'SET CHARACTER SET utf8');
				mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
				//echo "Hi~~";
				
				//if(isset($_POST['submit'])){

					$title = $_POST['title'];
					$rented = $_POST['rented'];
					$expire = $_POST['expire'];
					$type = $_POST['type'];
					$city = $_POST['city'];
					$district = $_POST['district'];
					$address = $_POST['address'];
					$space = $_POST['space'];
					$equipment = $_POST['equipment'];
					$price = $_POST['price'];
					$phone = $_POST['phone'];
					$name = $_POST['name'];
					$other = $_POST['other'];

					//取得上傳檔案資訊
					//$filename = $_FILES['upfile']['name'];
					//$tmpname = $_FILES['upfile']['tmp_name'];
					//$filesize = $_FILES['upfile']['size'];
					//$filetype = $_FILES['upfile']['type'];
					//$file = NULL;

					//if(isset($_FILES['upfile']['error'])){
						//if($_FILES['upfile']['error'] == 0){
							//$instr = fopen($tmpname,"rb" );
							//$file = addslashes(fread($instr,filesize($tmpname)));
						//}
					//}

					//開啟圖片檔
					//$file = fopen($_FILES["upfile"]["tmp_name"], "rb");
					//讀入圖片資料
					//$fileContents = fread($file, filesize($_FILES["upfile"]["tmp_name"]));
					//fclose($file);
					//圖片資料編號(確保圖片資料正確性)
					//$fileContents = base64_encode($fileContents);
					$sql_insert = "INSERT INTO House(hId, title, rented, expire, type, city, district, address, space, equipment, price, phone, name, other)
							       VALUES(NULL, '$title', '$rented', '$expire', '$type','$city','$district','$address','$space','$equipment','$price','$phone','$name','$other')";
					
					$result = mysqli_query($conn, $sql_insert) or die('Fail to insert.'.mysqli_error($conn));
					echo "Success Insert!";

					//$find_hId = "SELECT hId FROM House WHERE hId >= ALL(SELECT hId FROM House)";
					//$select_result = mysqli_query($conn, $find_hId) or die('Fail to find hId.'.mysqli_error($conn));
					//echo "Success find hId!";



					//$insert_pic = "INSERT INTO Picture(picId, pic, hId)
					//			   VALUES(NULL, '$file', '$find_hId')";
					//$pic_result = mysqli_query($conn, $insert_pic) or die('Fail to insert picture. '.mysqli_error($conn));
					//echo "Upload picture success!";
				//}
				//echo "Success!!";

				?>

					<form enctype='multipart/form-data' name='picform' method='post' action='UploadPic.php'>
			 			<label>房屋照片 :
			 			<input type='file' name='upfile'/><br><br>
			 			<input type='submit' value='確定' name='submit2'/>
			 		</form>

				</div>
			</section>
	</section><!--  end hero section  -->
	<section><div class="colorbg"></div></section>
	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li style="color:white";>學號辦帳，安全有保障</li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li style="color:white";>瀏覽清楚明瞭，搜尋方便</li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li style="color:white";>還有心得可以看</li>
					</ul>
				</li>

				<li class="about">
					<p>希望519租屋提供學生最棒的租屋選擇！<br>大家要多多使用哦！</p>
					<ul>
						<li><a href="http://facebook.com/pixelhint" class="facebook" target="_blank"></a></li>
						<li><a href="http://twitter.com/pixelhint" class="twitter" target="_blank"></a></li>
						<li><a href="http://plus.google.com/+Pixelhint" class="google" target="_blank"></a></li>
						<li><a href="#" class="skype"></a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="copyrights wrapper">
			Copyright © 2016. All Rights Reserved.
		</div>
	</footer><!--  end footer  -->
	
</body>
</html>
	
