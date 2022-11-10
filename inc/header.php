<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Roy Coffee</title>
	<link type="text/css" rel="stylesheet" href="../main1.css" />
</head>

<body>
	<div class = "centerbox">
		<h1>Welcome to Roy Coffee!</h1>
		<div class="btn-group">
			<form action ="./index.php" method = "get" id = "index">
				<button class ="button" type="submit" value="Submit">Trang chủ</button>
			</form>
   
			<form action ="../menu/index.php" method = "get" id = "menu">
				<button class ="button" type="submit" value="Submit">Menu</button>
			</form>
	   
			<form action ="../about/aboutForm.php" method = "get" id = "about">
				<button class ="button" type="submit" value="Submit">Thông tin shop</button>
			</form>
	  
			<form action ="../login/index.php" method = "get" id = "login">
				<button  class ="button" type="submit" value="Submit">Đăng Nhập</button>
			</form>
		</div>
	</div>