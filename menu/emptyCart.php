<?php
	include_once("../inc/header.php");

	//session_start();
	if(!empty($_SESSION["cart"]))
	{
		unset($_SESSION['cart']);
	}
?>
	<main>
		<?php if(empty($_SESSION["cart"])) { ?>
		<div class=centerbox> 
		<h1> Giỏ hàng của bạn đang trống! </h1>
		<h2>Cảm ơn bạn. Xin hãy đến một lần nữa!</h2>
		<?php } ?>
	</main>
	<div class=centerbox>
		<div class="btn-group">
			<form action ="index.php">
				<button class="button"type="submit" value="Submit">Tiếp tục mua sắm</button>
			</form>
		</div>
	</div>
		<?php require_once("../inc/footer.php"); ?>