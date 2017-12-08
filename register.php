<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	</head>
	
	<body>

	</body>
</html>

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
<!-- 					<ul>
						<li>Hi <?php echo $member_name ?>！</li>
						<li><a href="addHouse.php">新增房屋</a></li>
						<li><a href="update.php">會員中心</a></li>
					</ul> -->
					<a href="home.html" class="login_btn">回首頁</a>
				</nav>
			</div>
		</header><!--  end header section  -->

			<section class="caption">
				<h2 class="caption">Find Your Dream Home</h2>
				<h3 class="properties">一切都在519學生租屋</h3>
				<div class="whitebox">
					<form method="post" action="register_finish.php">
						名字：<input type="text" name="mName" required="required"><br>
						帳號：<input type="text" name="userId" required="required"><br>
						密碼：<input type="text" name="password" required="required"><br>
						再一次輸入密碼：<input type="password " name="password2" required="required"><br>
						
						<input type="submit" name="button" value="確定註冊" />
					</form>
				</div>
			</section>
	</section><!--  end hero section  -->
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