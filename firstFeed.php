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
<body>
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
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="feedback">	
						<h3 style='color:#F73B56;'>Leave Your First Feedback</h3><br>
						<table>
							<tr>
								<td>我的姓名：<?php
										echo $member_name;
									?>
								</td>
								<td><input name="noName" type="checkbox" value="1">我要匿名</td>
							</tr>
							<tr>
								<td>房屋整體評價：
									<td>非常不滿&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="1"></td>
									<td>我不滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="2"></td>
									<td>覺得普通&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="3"></td>
									<td>我很滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="4"></td>
									<td>非常滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="5"></td>
								</td>
							</tr>
							<tr>
								<td>對房東的評價：
									<td>非常不滿&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fLandlordEva" value="1"></td>
									<td>我不滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fLandlordEva" value="2"></td>
									<td>覺得普通&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fLandlordEva" value="3"></td>
									<td>我很滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fLandlordEva" value="4"></td>
									<td>非常滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fLandlordEva" value="5"></td>
								</td>
							</tr>			
							<tr>
								<td>房屋狀況：</td>
								<td colspan="5"><textarea name="fhCondition" type="text" maxlength="1000" rows="2" cols="70"></textarea></td>
							</tr>
							<tr>
								<td rowspan="3">留言內容：</td>
								<td colspan="5"><textarea name="fContent" type="text" maxlength="1000" rows="2" cols="70"></textarea></td>
							</tr>
							<tr>
								<td colspan="5"><input id="submit" type="submit" name="submit" value="送出評價!" class="back-btn"></td>
								<td><input type="hidden" name="ftime"></td>
								<td><input type="hidden" name="fid"></td>
								<td><input type="hidden" name="hid"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>				
			<?php  
					//連接資料庫
						$conn=mysqli_connect('140.117.69.70','group7','sevenAdmin7')or die("Connection failed. " . mysql_error());
					   	mysqli_select_db($conn,"dbClass_group7");
						mysqli_query($conn, 'SET CHARACTER SET utf8');
						mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
					//選取最新一個hId
						$selectNewest = mysqli_query( $conn, "SELECT hId FROM House WHERE hId >= ALL(SELECT hId FROM House)");
						$thisHouse = mysqli_fetch_assoc($selectNewest);
						$thisHid = $thisHouse['hId'];
						echo $thisHid;
					//加入訊息
					    if(isset($_POST['submit'])){
							if(isset($_POST['noName'])){
								$boolName=$_POST['noName'];
							}
							else{
								$boolName=0;
							}
					    	$anonymous='匿名同學';
					    	$houseId=$thisHid;
					    	$name=$member_name;
					    	$totalEva=$_POST['fTotalEva'];
					    	$landlordEva=$_POST['fLandlordEva'];
					    	$hCondition=$_POST['fhCondition'];
					    	$content=$_POST['fContent'];
					    	date_default_timezone_set('Asia/Taipei');
							$tmptime=$_POST["fTime"]= date("Y-m-d H:i:s");
							if ($boolName==1) {
								$query1="INSERT INTO Feedback(hId, fName, fTotalEva, fLandlordEva, fhCondition, fContent, fTime) 
								VALUES ('$houseId','$anonymous','$totalEva','$landlordEva','$hCondition','$content','$tmptime') ";
							} else {
								$query1="INSERT INTO Feedback(hId, fName, fTotalEva, fLandlordEva, fhCondition, fContent, fTime) 
								VALUES ('$houseId','$name','$totalEva','$landlordEva','$hCondition','$content','$tmptime') ";
							}
							if(mysqli_query($conn,$query1)){
								echo "留言成功！";
								echo '<meta http-equiv=REFRESH CONTENT=1;url=h'.$houseId.'.php>';
								exit;
							}
							else {
								echo " <br>Error: " . $query1 . "<br>" . mysqli_error($conn);
							}
					    }
					//算平均
						$countAvgTotal = mysqli_query($conn,"SELECT AVG(fTotalEva) FROM House NATURAL JOIN Feedback GROUP BY hId HAVING hId=$thisHid");
						$countAvgLandlord = mysqli_query($conn,"SELECT AVG(fLandlordEva) FROM House NATURAL JOIN Feedback GROUP BY hId HAVING hId=$thisHid");

						$avg1=mysqli_fetch_assoc($countAvgTotal);
						$total=$avg1['AVG(fTotalEva)'];
						
						$avg2=mysqli_fetch_assoc($countAvgLandlord);
						$landlord=$avg2['AVG(fLandlordEva)'];

						mysqli_query($conn,"UPDATE House SET avgTotalEva=$total WHERE hId=$thisHid");
						mysqli_query($conn,"UPDATE House SET avgLandlordEva=$landlord WHERE hId=$houseId");					    	    
			?>	
		</section>
	</section>
</body>
</html>
	
