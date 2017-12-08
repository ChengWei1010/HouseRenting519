<?php
	session_start();	
	$member_id = $_SESSION["userId"];
	$member_pw = $_SESSION["password"];
	$member_name = $_SESSION["mName"];
	$thisHid= 1;
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
			</section>
	</section><!--  end hero section  -->
	<section class="listing">
		<div class="wrapper">
			<div class="housepage">
				<div class="mainHouse">
					<table class="housetable">
						<tr>
							<td class="housepart"><?php
									$servername = "140.117.69.70";
									$username = "group7";
									$password = "sevenAdmin7";
									$dbname = "dbClass_group7";

									//連接資料庫
									$conn = mysqli_connect($servername, $username, $password) or die('Error with MySQL connection!');
									//echo "Connect success!"."<br>";

									//選擇資料庫
									mysqli_select_db($conn, $dbname) or die("無法選擇資料庫".mysqli_error());
									//echo "Success select database!"."<br><br>";


									mysqli_query($conn, 'SET CHARACTER SET utf8');
									mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
									//mysqli_query($conn, "SET NAMES 'big5'");  

									$find_h1 = "SELECT * FROM Picture WHERE hId = $thisHid";
									$show=$conn->query($find_h1);
									if(($result=mysqli_fetch_assoc($show))>0){
										echo '<img src="data:image/jpeg;base64,'.base64_encode($result['pic']).'"/>';
									}
								?>
							</td>
							<td class="descpart">
							<input type="button" value="回上頁" onclick="history.back()" class="back-btn">
								<?php
									$servername = "140.117.69.70";
									$username = "group7";
									$password = "sevenAdmin7";
									$dbname = "dbClass_group7";
									//連接資料庫
									$conn = mysqli_connect($servername, $username, $password) or die('Error with MySQL connection!');
									//echo "Connect success!"."<br>";

									//選擇資料庫
									mysqli_select_db($conn, $dbname) or die("無法選擇資料庫".mysqli_error());
									//echo "Success select database!"."<br><br>";


									mysqli_query($conn, 'SET CHARACTER SET utf8');
									mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
									//mysqli_query($conn, "SET NAMES 'big5'");  

									// $find_h1 = "SELECT * FROM Picture WHERE hId = 1";
									// $result = mysqli_query($conn, $find_h1);

									// if($row = mysqli_fetch_assoc($result)){
									// 	header("Content-Type: image/jpeg");
									// 	echo $row['upfile'];
									// }
									
									$countAvgTotal = mysqli_query($conn,"SELECT AVG(fTotalEva) FROM House NATURAL JOIN Feedback GROUP BY hId HAVING hId=$thisHid");
									$countAvgLandlord = mysqli_query($conn,"SELECT AVG(fLandlordEva) FROM House NATURAL JOIN Feedback GROUP BY hId HAVING hId=$thisHid");

									$avg1=mysqli_fetch_assoc($countAvgTotal);
									$total=$avg1['AVG(fTotalEva)'];
									
									$avg2=mysqli_fetch_assoc($countAvgLandlord);
									$landlord=$avg2['AVG(fLandlordEva)'];

									mysqli_query($conn,"UPDATE House SET avgTotalEva=$total WHERE hId=$thisHid");
									mysqli_query($conn,"UPDATE House SET avgLandlordEva=$landlord WHERE hId=$thisHid");

									$find_house = "SELECT * FROM House WHERE hId = $thisHid";
									$result2 = mysqli_query($conn, $find_house);

									if($row2 = mysqli_fetch_assoc($result2)){
										
										echo "<h2>".$row2['title']."</h2>";
										echo "平均整體評價：";
										for ($j=0;$j<$row2['avgTotalEva'];$j++) {
											echo "<img src='img/star.png'>";
										}
										echo "<br>平均房東評價：";
										for ($j=0;$j<$row2['avgLandlordEva'];$j++) {
											echo "<img src='img/star.png'>";
										}									
										echo "<br>租金 : ".$row2['price']."元/月<br>";
										echo "出租情況 : ".$row2['rented']."<br>";
										echo "租約到期日 : ".$row2['expire']."<br>";
										echo "型態/現況 : ".$row2['type']."<br>";
										echo "地址 : ".$row2['city']; echo $row2['district']; echo$row2['address']."<br>";
										echo "空間資訊 : ".$row2['space']."<br>";
										echo "房屋設備 : ".$row2['equipment']."<br>";
										
										echo "其他資訊 : ".$row2['other']."<br><br>";
										echo "出租人 : ".$row2['name']."<br>";
										echo "連絡電話 : ".$row2['phone']."<br>";									
										//echo "其他資訊 : ".$row2['other']."<br>";
									}
									//header("Content-Type: $row[1]");
									//echo base64_decode($row[0]);
								?>

							</td>
						</tr>
						<tr class="morepicpart">
							<td class="morepic">更多照片</td>
							<td class="morepic">more pic</td>
						</tr>	
					</table>
				</div>
				<div class="feedback">
					<!-- Feedback php -->
						<div id="board">
							<?php  
							//連接資料庫
								$conn=mysqli_connect('140.117.69.70','group7','sevenAdmin7')or die("Connection failed. " . mysql_error());
							   	echo "<h2 style='color:#F73B56;'>Feedbacks:</h2>";
							   	mysqli_select_db($conn,"dbClass_group7");
								mysqli_query($conn, 'SET CHARACTER SET utf8');
								mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
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
										echo '<meta http-equiv=REFRESH CONTENT=1;url=h1.php>';
										exit;
									}
									else {
										echo " <br>Error: " . $query1 . "<br>" . mysqli_error($conn);
									}
							    }	    
								
							?>
							<!-- 顯示留言	 -->
							<?php  
							//選取訊息
							    $query="SELECT * FROM Feedback WHERE hId=$thisHid";
							    $feed=mysqli_query($conn,$query);
							    while($aFeed = mysqli_fetch_array($feed)){						    		
									echo "<table><tr><td>留言者：</td><td>".$aFeed['fName'];
									echo "</td></tr><tr><td>總體評價：</td><td width='180px;'>";
									for ($i=0;$i<$aFeed['fTotalEva'];$i++) {
										echo "<img src='img/star.png'>";
									}
									echo "</td><td>房東評價：<td>";
									for ($i=0;$i<$aFeed['fLandlordEva'];$i++) {
										echo "<img src='img/star.png'>";
									}									
									echo "</td></tr><tr><td>房屋狀況：<td>".$aFeed['fhCondition'];
									echo "</td></tr><tr><td>留言內容：</td><td>".$aFeed['fContent'];
									echo "</td></tr><tr><td style='color:#A7C0D0;'>";
									echo $aFeed['fTime'];
									echo "</td></table><hr>";
								}
								mysqli_free_result($feed);

							?>
						</div>
					<!-- 留下回饋 -->
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<table>
								<th><h2 style='color:#F73B56;'>Leave Your Feedback</h2></th>
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
						</form>
				</div>
			</div>
	</section>
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