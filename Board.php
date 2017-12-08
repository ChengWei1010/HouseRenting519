<?php
	session_start();
	
	$member_id = $_SESSION["userId"];
	$member_pw = $_SESSION["password"];
	$member_name = $_SESSION["mName"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Board</title>
</head>
<body>
	<div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table>
				<th>留下對此房屋的評價</th>
				<tr>
					<td><?php
							echo $member_name;
						?>
					</td>
					<td><input name="noName" type="checkbox" value="1">我要匿名</td>
				</tr>
				<tr>
					<td>整體評價：
						<td>非常不滿&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="1"></td>
						<td>我不滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="2"></td>
						<td>覺得普通&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="3"></td>
						<td>我很滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="4"></td>
						<td>非常滿意&nbsp;&nbsp;<br>&nbsp;&nbsp;<input type="radio" name="fTotalEva" value="5"></td>
					</td>
				</tr>
				<tr rowspan="2">
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
					<td colspan="2"><textarea name="fhCondition" type="text" maxlength="1000"></textarea></td>
				</tr>
				<tr>
					<td>留言內容：</td>
					<td colspan="2"><textarea name="fContent" type="text" maxlength="1000"></textarea></td>
				</tr>
				<tr>
					<td cspan="2"><input id="submit" type="submit" name="submit" value="送出評價!"></td>
					<td colspan="2"><input type="hidden" name="ftime"></td>
					<td colspan="2"><input type="hidden" name="fid"></td>
					<td colspan="2"><input type="hidden" name="hid"></td>
				</tr>
			</table>
		</form>
	<div id="board">
<!-- 留言部份 -->
	<?php  
	//連接資料庫
		$conn=mysqli_connect('140.117.69.70','group7','sevenAdmin7')or die("Connection failed. " . mysql_error());
	   	echo "Connected successfully";
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
	    	$houseId=4;
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
				echo '<meta http-equiv=REFRESH CONTENT=1;url=Board.php>';
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
	    $query="SELECT * FROM Feedback WHERE hId='4'";
	    $feed=mysqli_query($conn,$query);
	    while($aFeed = mysqli_fetch_array($feed)){
    		
			echo "<p>留言者：";
			echo $aFeed['fName'];
			echo "<br>總體評價：";
			echo $aFeed['fTotalEva'];
			echo "<br>房東評價：";
			echo $aFeed['fLandlordEva'];
			echo "<br>房屋狀況：";
			echo $aFeed['fhCondition'];
			echo "<br>留言內容：";
			echo $aFeed['fContent'];
			echo "</p>";
			echo $aFeed['fTime'];
			echo "</div>";
		}
		mysqli_free_result($feed);

	?>
</body>
</html>