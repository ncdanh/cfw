<?php
	include("../inc/header.php");
	session_start();

	//create variables to store the values
	$subtotal = 0.00;
	$taxRate = 0.06;
	$taxAmount = 0.00;
	$total = 0.00;

	$action = filter_input(INPUT_POST, 'action');

	//When the action in one of the forms is "Remove Item," the selected item will be removed from the cart.
	if($action == "Remove Item") 
	{
		$prodID = filter_input(INPUT_POST, 'prodID');

		foreach($_SESSION["cart"] as $key => $value)
		{
			if($key == $prodID) 
			{
				unset($_SESSION["cart"][$key]);
			}
		
		}
	}

	//When the action in one of the forms is "Pay the Full Amount" or "Empty Cart," 
	//this step assumes the user has paid the total amount in full,
	//and removes all the items in the cart and take the user to "emptyCart" page.
	if($action == "Pay the Full Amount" OR $action == "Empty Cart") 
	{
		include_once("emptyCart.php");
		exit;
	} 
?>

<div class="centerbox">
<!-- the body section -->
	<header><h1>Các mặt hàng hiện có trong giỏ hàng của bạn</h1></header>
	<main>
		<br>
		<?php if(empty($_SESSION["cart"])) { ?>
		 <h1> Giỏ của bạn trống trơn ! </h1>
		<?php } else { ?>
			
			<table>
				<tr>
					<th width="10%">Nước uống </th>
					<th width="10%">Mô tả</th>
					<th width="10%"> Kích thước </th>
					<th>Giá</th>
				</tr>
			
				<?php foreach ($_SESSION["cart"] as $key=>$item): ?>
			
				<tr>
					<form action = "viewCart.php" method="post">
						<td width="10%" > <?php echo $item["prodName"] ; ?> </td>
						<td width="12%"> <?php echo $item["prodType"];?> </td>
						<td width="10%"><?php echo $item["quantity"];?> </td>
						<td width="15%" style = "color:navy;"><b>$<?php echo number_format($item["itemTotalPrice"], 2);?> </b></td>
				
						<td><b>
							<input type="hidden" name = "prodID" value="<?php echo $key;?>">
							<input type="hidden" name = "prodName" value="<?php echo $item["prodName"];?>">
							<input type="hidden" name = "listPrice" value="<?php echo $item["prodUnitPrice"];?>">
							<input type="hidden" name = "quentity" value="<?php echo $item["quantity"] ;?>">
							<input type="submit" style = "border: none; font-weight: 900;" name = "action" value="Xóa mặt hàng"> </b>
						</td>
					</form>
				</tr>
			
				<?php 
					if($item["itemTotalPrice"] != 0)
					{
						$subtotal = $subtotal + $item["itemTotalPrice"];  
					}
					endforeach; 
				?>
			</table>
			
		<?php }
				  $taxAmount = $subtotal * $taxRate;
				  $total = $subtotal + $taxAmount;
		 ?>
			<p><b>Tổng phụ: $<?php echo number_format($subtotal, 2);?></b></p>
			<p><b>Thuế: $<?php echo number_format($taxAmount, 2);?></b></p>
			<p><b>Tổng cộng: $<?php echo number_format($total, 2);?></b></p>
			
			<div class=centerbox>
				<div class=btn-group>
					<form action = "viewCart.php" method="post">
						 <button><input type="submit" name = "action" value="Thanh toán toàn bộ số tiền">
					</form></button>
					
					<form action = "viewCart.php" method="post"> 
						<button><input type="submit" name = "action" value="Giỏ hàng rỗng"></button> 
					</form>
				</div>
			</div>
	</main>
</div>
		<?php require_once("../inc/footer.php"); ?>
