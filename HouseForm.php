<!DOCTYPE html>
 <html>
 	<head>
 		<meta charset='utf-8'>
 		<title>RoomForm</title>
 		<script type="text/javascript">
 			//var minNum = 0;
 			//var maxNum = 9;
 			//var n=5;

 			function chgSelect(){
 				var i;
 				var s1, s2;
 				s1 = document.thisform.s1;
 				s2 = document.thisform.s2;
 				for(i=s2.length; i>0; i--){  //初始化
 					s2.remove(i);
 				}

 				if(s1.value == "台南市"){  
 					var objOption = new Array(13);
 					objOption[0] = new Option("永康區", "永康區");
 					objOption[1] = new Option("東區", "東區");
 					objOption[2] = new Option("北區", "北區");
 					objOption[3] = new Option("安平區", "安平區");
 					objOption[4] = new Option("安南區", "安南區");
 					objOption[5] = new Option("南區", "南區");
 					objOption[6] = new Option("中西區", "中西區");
 					objOption[7] = new Option("仁德區", "仁德區");
 					objOption[8] = new Option("善化區", "善化區");
 					objOption[9] = new Option("新市區", "新市區");
 					objOption[10] = new Option("新化區", "新化區");
 					objOption[11] = new Option("歸仁區", "歸仁區");
 					objOption[12] = new Option("新營區", "新營區");
 				}
 				else if(s1.value == "高雄市"){
 					var objOption = new Array(20);
 					objOption[0] = new Option("三民區", "三民區");
 					objOption[1] = new Option("左營區", "左營區");
 					objOption[2] = new Option("鼓山區", "鼓山區");
 					objOption[3] = new Option("鳳山區", "鳳山區");
 					objOption[4] = new Option("苓雅區", "苓雅區");
 					objOption[5] = new Option("楠梓區", "楠梓區");
 					objOption[6] = new Option("前鎮區", "前鎮區");
 					objOption[7] = new Option("仁武區", "仁武區");
 					objOption[8] = new Option("小港區", "小港區");
 					objOption[9] = new Option("新興區", "新興區");
 					objOption[10] = new Option("鳥松區", "鳥松區");
 					objOption[11] = new Option("大寮區", "大寮區");
 					objOption[12] = new Option("前金區", "前金區");
 					objOption[13] = new Option("岡山區", "岡山區");
 					objOption[14] = new Option("大社區", "大社區");
 					objOption[15] = new Option("鹽埕區", "鹽埕區");
 					objOption[16] = new Option("旗津區", "旗津區");
 					objOption[17] = new Option("大樹區", "大樹區");
 					objOption[18] = new Option("燕巢區", "燕巢區");
 					objOption[19] = new Option("旗山區", "旗山區");
 				}
 				for(i=0; i<objOption.length; i++){
 					s2.add(objOption[i], i);
 				}
 			}

 		</script>
 	</head>

 	<body onload=chgSelect()>
 		<form name="thisform" method="post" action="Post.php">
 			<!--<label>房屋編號 : 
 			<br><br>-->

 			<label>標題 :
 			<input type="text" name="title" maxlength="25" required="required"><br><br>

 			<label>出租狀況 :
 			<input type="radio" name="rented" value="已出租" required>已出租
 			<input type="radio" name="rented" value="未出租" required>未出租<br><br>

 			<label>租約到期時間 :
 			<input type="date" name="expire"><br><br>

 			<label>類型 : 
 			<select name="type">
 				<option value="整層住家">整層住家</option>
 				<option value="獨立套房">獨立套房</option>
 				<option value="分租套房">分租套房</option>
 				<option value="雅房">雅房</option>
 			</select><br><br>

 			<label>住址 : 
 			<select id="s1" name="city" onChange=chgSelect()>
 				<option value="台南市">台南市</option>
 				<option value="高雄市">高雄市</option>
 			</select>
 			<select id="s2" name="district"></select>
 			<input id="address" type="text" name="address" maxlength="50" required="required"><br><br>

 			<lable>空間資訊 : 
 			<textarea name="space" placeholder="房/廳/衛/坪數"></textarea><br><br>

 			<label>房屋設備 : 
 			<textarea name="equipment" rows="6" cols="20"></textarea><br><br>

 			<lable>價錢(每月) :
 			<input type="number" name="price" min="0" required="required"><br><br>

 			<label>房東資訊 <br><br>
 			<label>房東姓名 : 
 			<input type="text" name="name" maxlength="25" required="required"><br><br>

 			<label>房東電話 : 
 			<input type="text" name="phone" required="required"><br><br>

 			<lavbel>其他資訊 : 
 			<textarea name="other" rows="5" cols="20"></textarea><br><br>

 			<input type="submit" value="下一步" name="submit">

 		</form>
 		<br><br>

 		

 	
 	</body>


 </html>

