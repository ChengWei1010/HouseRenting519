<?php
	$servername = "140.117.69.70";
	$username = "group7";
	$password = "sevenAdmin7";
	$dbname = "dbClass_group7";

	//header("Content-type: image/jpeg"); 



	//連接資料庫
	$conn = mysqli_connect($servername, $username, $password) or die('Error with MySQL connection!');
	echo "Connect success!";

	//選擇資料庫
	mysqli_select_db($conn, $dbname) or die("無法選擇資料庫".mysqli_error());
	echo "Success select database!"."<br>";

	mysqli_query($conn, 'SET CHARACTER SET utf8');
	mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");

	//取得上傳檔案資訊
		$filename = $_FILES['upfile']['name'];
		$tmpname = $_FILES['upfile']['tmp_name'];
		$filesize = $_FILES['upfile']['size'];
		$filetype = $_FILES['upfile']['type'];
		$file = NULL;

		if(isset($_FILES['upfile']['error'])){
			if($_FILES['upfile']['error'] == 0){
				$instr = fopen($tmpname,"rb" );
				$file = addslashes(fread($instr,filesize($tmpname)));
			}
		}

		$find_hId = "SELECT hId FROM House WHERE hId >= ALL(SELECT hId FROM House)";
		$select_result = mysqli_query($conn, $find_hId) or die('Fail to find hId.'.mysqli_error($conn));
		$row=mysqli_fetch_object($select_result);   //取出找出的hId
		$hId=$row->hId;
		echo "Success find hId!"."<br>";
		//echo $select_result;


		$insert_pic = "INSERT INTO Picture(picId, pic, hId)
					   VALUES(NULL, '$file', '$hId')";
		$pic_result = mysqli_query($conn, $insert_pic) or die('Fail to insert picture. '.mysqli_error($conn));
		echo "Upload picture success!";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=firstFeed.php>';
?>